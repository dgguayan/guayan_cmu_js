<?php

    class Authors extends CI_Controller{

        public function index()
        {

            $data['title'] = 'List of Authors';

            $data['authors'] = $this->author_model->get_authors();
            $data['users'] = $this->user_model->get_users();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('authors/index', $data);
            $this->load->view('templates/footer', $data);
        }

        public function view($auid = NULL)
        {
                $data['authors'] = $this->author_model->get_authors($auid);
                $data['users'] = $this->user_model->get_users();

                $data['users'] = $this->article_model->get_user_by_author_userid($data['authors']['userid']);
        
                if (empty($data['authors']))
                {
                        show_404();
                }
            
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('authors/author_detail', $data);
                $this->load->view('templates/footer');
        }

        public function delete($userid){
            $this->deleteuser_model->delete_user($userid);
            redirect('authors');
    }
    }