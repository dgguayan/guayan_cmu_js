<?php
    class PublicView extends CI_Controller{

        public function index()
        {            
                $data['title'] = 'Public Home';
        
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('publicView/index', $data);
                $this->load->view('templates/footer', $data);
        }

    }
