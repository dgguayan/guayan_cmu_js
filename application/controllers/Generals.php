<?php

    class Generals extends CI_Controller{

        public function index($articleid = NULL)
        {
            $data['users'] = $this->user_model->get_users();
            $data['title'] = 'Dashboard';

            // $data['authors'] = $this->article_model->get_author_by_article();
            $data['authors'] = $this->article_model->join_author();

            $data['articles'] = $this->article_model->get_articles();

            $this->load->view('templates/header', $data);
            // $this->load->view('templates/topmenu_only', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('general/index', $data);
            $this->load->view('templates/footer');

        }

        public function signup()
        {
            $data['title'] = 'Sign Up';

            $data['roles'] = $this->adduser_model->get_role_admin();
            $data['volumes'] = $this->article_model->get_volume();

            $this->form_validation->set_rules('firstname', 'Firstname','required');
            $this->form_validation->set_rules('lastname','Lastname','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('roleid','roleid','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
            
                $this->load->view('general/signup', $data);
            } else {
                //encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->adduser_model->add_user($enc_password);

                $this->session->set_flashdata('user_signedup', 'You are now registered and can now log in.');

                redirect('signin');
            }
            
        }

        //login / signin
        public function signin() {
            $data['title'] = 'Sign In';
            $data['roles'] = $this->adduser_model->get_role();
            $data['volumes'] = $this->article_model->get_volume();
            $data['users'] = $this->user_model->get_users();
        
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
        
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('general/signin', $data);
            } else {
                $email = $this->input->post('email');
                $pword = md5($this->input->post('password'));
        
                $userid = $this->user_model->login($email, $pword);
        
                if ($userid) {
                    $roleid = $this->user_model->get_roleid($userid);
                    $firstname = $this->user_model->get_user_info_firstname($userid);
                    $lastname = $this->user_model->get_user_info_lastname($userid);
                    $profile_pic = $this->user_model->get_user_info_profile_pic($userid);
                    $rolebranch = $this->user_model->get_rolebranch($userid);
        
                    $profile_pic = !empty($profile_pic) ? $profile_pic : 'default.jpg';
        
                    $user_data = array(
                        'userid' => $userid,
                        'email' => $email,
                        'signedin' => true,
                        'roleid' => $roleid,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'profile_pic' => $profile_pic,
                        'rolebranch' => $rolebranch,
                    );
        
                    $this->session->set_userdata($user_data);
        
                    if (in_array($roleid, ['1', '2']) || in_array($rolebranch, ['1', '2'])) {
                        redirect('generals');
                    } elseif ($roleid === '3' || $rolebranch === '3') {
                        redirect('home');
                    } else {
                        die("Error");
                    }
        
                    $this->session->set_flashdata('user_signedin', 'You are now signed in.');
                } else {
                    $this->session->set_flashdata('signedin_failed', 'Sign-in is invalid.');
                    redirect('generals/signin');
                }
            }
        }
        


        //log out
        public function signout()
        {
            $this->session->unset_userdata('signedin');
            $this->session->unset_userdata('userid');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('roleid');
            $this->session->unset_userdata('profile_pic');
            $this->session->unset_userdata('rolebranch');
            
            $this->session->set_flashdata('user_signedout', 'You are now signed out.');

            redirect('generals');
        }

        //general add
        public function add_article_general()
        {
            $data['title'] = 'Add Article';

            $data['volumes'] = $this->article_model->get_volume();
            $data['authors'] = $this->author_model->get_authors();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
            $this->form_validation->set_rules('volumeid', 'Volumeid', 'required');
            $this->form_validation->set_rules('doi', 'Doi', 'required');
            // $this->form_validation->set_rules('filename', 'Filename', 'required');
            $this->form_validation->set_rules('filename', 'Filename', 'callback_file_check');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenuandsidebar', $data);
                $this->load->view('general/add_article_general');
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
                
                redirect('articles_general');
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

        
    }