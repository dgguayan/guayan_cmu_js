<?php

    class Volumes extends CI_Controller{

        public function index()
        {
            $data['title'] = 'List of Volumes';

            $data['volumes'] = $this->volume_model->get_volumes();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('volumes/index', $data);
            $this->load->view('templates/footer', $data);

        }

        public function add_volume()
        {
            $data['title'] = 'Add Volume';

            $this->form_validation->set_rules('vol_name', 'Vol_name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('templates/topmenu');
                $this->load->view('templates/sidemenu');
                $this->load->view('volumes/add_volume', $data);
                $this->load->view('templates/footer'); 
            } else {
                $this->volume_model->add_volume();
                redirect('volumes');
            }
        }

        //volume detail
        public function view($volumeid = NULL)
        {
            $data['title'] = 'Volume Details and Articles';

            $data['volume'] = $this->volume_model->get_volumes($volumeid);

            $data['articles'] = $this->article_model->get_article_by_volume($volumeid);

            $data['authors'] = $this->article_model->join_author();

            if(empty($data['volume']))
            {
                show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('volumes/volume_detail', $data);
            $this->load->view('templates/footer'); 
        }

        //new
        //get the articles related to the volume id
        // public function articles($id)
        // {
        //     $data['title'] = $this->volume_model->get_volumes($id);

        //     $data['articles'] = $this->article_model->get_article_by_volume($id);

        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/topmenu', $data);
        //     $this->load->view('templates/sidemenu', $data);
        //     $this->load->view('articles/index', $data);
        //     $this->load->view('templates/footer'); 

        // }

        public function index_general()
        {
            $data['title'] = 'Current Volumes';

            $data['volumes'] = $this->volume_model->get_volumes();
            

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('volumes/index_general', $data);
            $this->load->view('templates/footer'); 

        }

        public function view_general($volumeid = NULL)
        {
            $data['title'] = 'Volume Details and Articles';

            $data['volume'] = $this->volume_model->get_volumes($volumeid);

            $data['articles'] = $this->article_model->get_article_by_volume($volumeid);

            $data['authors'] = $this->article_model->join_author();

            $userid = $this->session->userdata('userid');

            

            if(empty($data['volume']))
            {
                show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('volumes/volume_detail', $data);
            $this->load->view('templates/footer'); 
        }
    }