<?php

    class Adduser_model extends CI_Model
    {
        public function add_user($enc_password)
        {
            $userid = url_title($this->input->post('firstname'));

            $data = array(
                'userid' => $userid,
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'roleid' => $this->input->post('roleid'),
                'pword' => $enc_password,
                'profile_pic' => "default.jpg",
            );
            // return $this->db->insert('users', $data);

            $this->db->insert('users', $data);
    
            // Get the auto-incremented userid from the inserted user
            $userid = $this->db->insert_id();

            // Insert user data into the 'authors' table
            if ($this->input->post('roleid') == 1 )
            {
                $data2 = array(
                    'auid' => $userid,
                    'userid' => $userid,
                    'author_firstname' => $this->input->post('firstname'),
                    'author_lastname' => $this->input->post('lastname'),
                    // 'author_name' => $this->input->post('firstname') . $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'title' => $this->input->post('roleid'),
                );
                $this->db->insert('authors', $data2);
            }
            
            return true;
            
        }

        public function get_role()
        {
            $this->db->order_by('rolename');
            $query = $this->db->get('role');
            return $query->result_array();
        }

        public function get_role_admin()
        {
            $this->db->order_by('rolename');
            $query = $this->db->get('role');
            return $query->result_array();
        }
        
    }