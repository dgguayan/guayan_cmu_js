<?php

    class Author_model extends CI_Model
    {
        public function __contruct()
        {
            $this->load->database();

        }

        public function get_authors($auid = FALSE)
        {
            if($auid === FALSE)
            {
                $query = $this->db->get('authors');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('authors', array('auid' => $auid));
            return $query->row_array();
        }

        public function get_authors_by_userid()
        {
            $this->db->select('users.*, authors.*');
            $this->db->from('authors');
            $this->db->join('users', 'users.userid = authors.userid');
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return []; 
            }
        }

    }