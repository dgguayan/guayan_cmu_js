<?php
    class Pages extends CI_Controller{

        public function view($page = "home")
        {

                // if(!$this->session->userdata('signedin')){
                //     redirect('generals');
                // }
                // if($this->session->userdata('roleid' === 3)){
                //     redirect();
                // } else {
                //     redirect('generals');
                // }

                // Redirect if user is not signed in
                if(!$this->session->userdata('signedin'))
                {
                    redirect('generals');
                }

                // Get the user's roleid
                $roleid = $this->session->userdata('roleid');

                // Redirect if user's roleid is not 3
                if($roleid !== '3'){
                    redirect('generals');
                }
                    
                

                if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
                {
                    // Whoops, we don't have a page for that!
                    show_404();
                }
                
                $data['title'] = ucfirst($page);
        
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topmenu', $data);
                $this->load->view('templates/sidemenu', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);
        }
    }
