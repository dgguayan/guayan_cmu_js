<?php

    class Proofreaders extends CI_Controller{

        public function index()
        {
            $data['title'] = 'Table of Evaluator';

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

        public function edit_proofreader($userid)
        {
                $data['users'] = $this->user_model->get_users($userid);

                if(empty($data['users']))
                {
                        show_404();
                }

                $data['title'] = 'Edit User';

                $this->load->view('templates/header');
                $this->load->view('templates/topmenu');
                $this->load->view('templates/sidemenu');
                $this->load->view('users/edit_proofreader', $data);
                $this->load->view('templates/footer');   

               
        }

        public function update_proofreader()
        {
            $this->updateuser_model->update_user();
            redirect('proofreaders');
        }

    }