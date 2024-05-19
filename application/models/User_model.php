<?php

    class User_model extends CI_Model
    {
        public function __contruct()
        {
            $this->load->database();

        }

        public function get_users($userid = FALSE)
        {
            if($userid === FALSE)
            {
                $query = $this->db->get('users');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('users', array('userid' => $userid));
            return $query->row_array();
        }

        //login
        public function login($email, $pword)
        {
            $this->db->where('email', $email);
            $this->db->where('pword', $pword);

            $result = $this->db->get('users');

            if($result->num_rows() == 1)
            {
                return $result->row(0)->userid;
            } else {
                return false;
            }
        }

        //get roleid
        public function get_roleid($userid)
        {
            $query = $this->db->get_where('users', array('userid' => $userid));
            $user = $query->row_array();
            return isset($user['roleid']) ? $user['roleid'] : null;
        }
        
        public function get_user_info_firstname($userid) {
            $query = $this->db->get_where('users', array('userid' => $userid));
            $user = $query->row_array();
            return isset($user['firstname']) ? $user['firstname'] : null;
        }

        public function get_user_info_lastname($userid) {
            $query = $this->db->get_where('users', array('userid' => $userid));
            $user = $query->row_array();
            return isset($user['lastname']) ? $user['lastname'] : null;
        }

    }