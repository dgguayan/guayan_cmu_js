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
                $data['roles'] = $this->adduser_model->get_role();
        
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

        public function view_general($userid = NULL)
        {
                $data['users'] = $this->user_model->get_users($userid);
                $data['roles'] = $this->adduser_model->get_role();
        
                if (empty($data['users']))
                {
                        show_404();
                }
            
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenuandsidebar', $data);
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

        public function add_user_author()
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
                $this->load->view('users/add_author', $data);
                $this->load->view('templates/footer', $data);   
                } else
                {
                $enc_password = md5($this->input->post('password'));

                $this->adduser_model->add_user($enc_password);

                redirect('authors');
                }
                
        }

        public function add_user_evaluator()
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
                $this->load->view('users/add_evaluator', $data);
                $this->load->view('templates/footer', $data);   
                } else
                {
                $enc_password = md5($this->input->post('password'));

                $this->adduser_model->add_user($enc_password);

                redirect('proofreaders');
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

        public function update_author(){
                $this->updateuser_model->update_user();
                redirect('authors');
        }

        // public function update_detailview()
        // {
        //         $data['roles'] = $this->adduser_model->get_role();
        //         $userid = $this->input->post('userid'); 
        //         $this->updateuser_model->update_detailview($userid); 
        //         redirect('user_detail/' . $userid); 
        // }

        public function update_detailview()
        {
        // Load necessary models and libraries
        $this->load->model('updateuser_model');

        // Get the user id from the form
        $userid = $this->input->post('userid');

        // Handle the image upload
        $config['upload_path'] = './assets/upload/uploaded_images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (! $this->upload->do_upload('profile_pic'))
        {
                $errors = array('error' => $this->upload->display_errors());
                $filename = 'default.jpg'; // Default filename if upload fails
        } else {
                $data = array('upload_data' => $this->upload->data());
                // Update the filename to the formatted filename
                $filename = $data['upload_data']['file_name'];
        }

        // Prepare the data to be updated
        $update_data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'profile_pic' => $filename // Save the image path in the database
                // Add more fields as needed
        );

        // Update the user details in the database
        $this->updateuser_model->update_detailview($userid, $update_data);

        // Redirect to the user detail page
        redirect('user_detail/' . $userid);
        }



        public function delete($userid){
                $this->deleteuser_model->delete_user($userid);
                redirect('users');
        }

        public function edit_author($userid)
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
                $this->load->view('users/edit_author', $data);
                $this->load->view('templates/footer');   

               
        }
    }
