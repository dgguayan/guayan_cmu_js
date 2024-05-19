<?php

    class Articles extends CI_Controller{

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        //admin index
        public function index()
        {
            $data['title'] = 'List of Articles';

            $data['authors'] = $this->article_model->join_author();

            $data['articles'] = $this->article_model->get_articles();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('articles/index', $data);
            $this->load->view('templates/footer', $data);
        }

        //general index

        public function index_general()
        {
            $data['title'] = 'List of Articles';

            $data['authors'] = $this->article_model->join_author();

            $data['articles'] = $this->article_model->get_articles();

            $userid = $this->session->userdata('userid');

            $data['articles'] = $this->article_model->get_article_by_author($userid);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('articles/index_general', $data);
            $this->load->view('templates/footer', $data);
        }

        //admin view
        public function view($articleid = NULL)
        {
            $data['title'] = 'Article Detail';

            $data['authors'] = $this->article_model->get_author_by_article();

            $data['articles'] = $this->article_model->get_articles($articleid);

            if (empty($data['articles']))
            {
                    show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('articles/article_detail', $data);
            $this->load->view('templates/footer', $data);
        }

        //general view
        public function view_general($articleid = NULL)
        {
            
            $data['title'] = 'Article Detail';

            $data['authors'] = $this->article_model->get_author_by_article();
            $data['authors'] = $this->article_model->join_author();

            $data['articles'] = $this->article_model->get_articles($articleid);

            if (empty($data['articles']))
            {
                    show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('articles/article_detail', $data);
            $this->load->view('templates/footer', $data);
        }

        //admin add
        public function add_article()
        {
            $data['title'] = 'Add Article';

            $data['volumes'] = $this->article_model->get_volume();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
            $this->form_validation->set_rules('volumeid', 'Volumeid', 'required');
            $this->form_validation->set_rules('doi', 'Doi', 'required');
            // $this->form_validation->set_rules('filename', 'Filename', 'required');
            $this->form_validation->set_rules('filename', 'Filename', 'callback_file_check');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('articles/add_article');
                $this->load->view('templates/footer');
            } else {
                
                $config['upload_path']          = './assets/upload/articles/';
                $config['allowed_types']        = 'gif|jpg|png|pdf';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                
                $this->load->library('upload', $config);

                if (! $this->upload->do_upload('filename'))
                {
                    $errors = array('error' => $this->upload->display_errors());
                    $filename = 'no_upload.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $filename = $_FILES['filename']['name'];
                }

                $this->article_model->add_article($filename);
                
                redirect('articles');

                // redirect('articles');
            }
            
        }

        public function file_check($str)
        {
            if (empty($_FILES['filename']['name'])) {
                $this->form_validation->set_message('file_check', 'The {field} field is required.');
                return FALSE;
            } else {
                return TRUE;
            }
        }

        //edit article admin
        public function edit_article($articleid)
        {
            $data['articles'] = $this->article_model->get_articles($articleid);

            $data['volumes'] = $this->article_model->get_volume();

                if(empty($data['articles']))
                {
                        show_404();
                }

                $data['title'] = 'Edit Article';

                $this->load->view('templates/header');
                $this->load->view('templates/topmenu');
                $this->load->view('templates/sidemenu');
                $this->load->view('articles/edit_article', $data);
                $this->load->view('templates/footer');

        }

        //edit article general
        public function edit_article_general($articleid)
        {
            $data['articles'] = $this->article_model->get_articles($articleid);

            $data['volumes'] = $this->article_model->get_volume();

                if(empty($data['articles']))
                {
                        show_404();
                }

                $data['title'] = 'Edit Article';

                $this->load->view('templates/header');
                $this->load->view('templates/topmenuandsidebar', $data);
                $this->load->view('articles/edit_article_general', $data);
                $this->load->view('templates/footer');
        }

        //admin redirect
        public function update_article(){
            $this->article_model->update_article();
            redirect('articles');
        }

        //general redirect
        public function update_article_general(){
            $this->article_model->update_article();
            redirect('articles_general');
        }

        //delete article admin
        public function delete_article_admin($articleid){
            $this->article_model->delete_article_admin($articleid);
            redirect('articles');
        }

        public function delete_article_user($articleid){
            $this->article_model->delete_article_user($articleid);
            redirect('articles_general');
        }
        

    }