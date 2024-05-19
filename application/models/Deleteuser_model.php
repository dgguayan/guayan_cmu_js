<?php

    class Deleteuser_model extends CI_Model
    {
        public function delete_user($userid)
        {
            $this->db->where('userid', $userid);
            $this->db->delete('users');

            $this->db->where('userid', $userid);
            $this->db->delete('authors');
            
            return true;
        }
    }