<?php
    class Users extends CI_Controller{

        public function index()
        {            
                $data['title'] = 'List of Users';
        
                $data['users'] = $this->user_model->get_users();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('users/index', $data);
                $this->load->view('templates/footer', $data);
        }

        // public function user_detail()
        // {
        //     $data['title'] = 'List of Users';
        
        //     $data['users'] = $this->user_model->get_users();

        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/topmenu', $data);
        //     $this->load->view('templates/sidemenu', $data);
        //     $this->load->view('users/user_detail', $data);
        //     $this->load->view('templates/footer', $data);
        // }

        public function view($userid = NULL)
        {
                $data['users'] = $this->user_model->get_users($userid);
        
                if (empty($data['users']))
                {
                        show_404();
                }
            
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('users/user_detail', $data);
                $this->load->view('templates/footer');
        }

        public function add_user()
        {
                $data['roles'] = $this->adduser_model->get_role();

                $this->form_validation->set_rules('firstname', 'Firstname','required');
                $this->form_validation->set_rules('lastname','Lastname','required');
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('roleid','roleid','required');
                $this->form_validation->set_rules('password','Password','required');
                $this->form_validation->set_rules('password2','Confirm Password','matches[password]');
                
                if($this->form_validation->run() === FALSE)
                {
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('users/add_user', $data);
                $this->load->view('templates/footer', $data);   
                } else
                {
                $enc_password = md5($this->input->post('password'));

                $this->adduser_model->add_user($enc_password);

                redirect('users');
                }
                
        }

        public function edit_user($userid)
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
                $this->load->view('users/edit_user', $data);
                $this->load->view('templates/footer');   

               
        }

        public function update(){
                $this->updateuser_model->update_user();
                redirect('users');
        }

        public function update_detailview()
        {
                $userid = $this->input->post('userid'); 
                $this->updateuser_model->update_detailview($userid); 
                redirect('user_detail/' . $userid); 
        }

        public function delete($userid){
                $this->deleteuser_model->delete_user($userid);
                redirect('users');
        }
    }
