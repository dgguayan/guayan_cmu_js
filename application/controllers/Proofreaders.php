<?php

    class Proofreaders extends CI_Controller{

        public function index()
        {
            $data['title'] = 'List of Proofreaders';

            $data['users'] = $this->proofreader_model->get_proofreaders();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('proofreaders/index', $data);
            $this->load->view('templates/footer', $data);

        }

        public function delete_proofreader($userid){
            $this->deleteuser_model->delete_user($userid);
            redirect('proofreaders');
        }

    }