<?php

    class Proofreader_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_proofreaders()
        {
            $query = $this->db->get('users');
            return $query->result_array();
            return $query->row_array();
        }

    }

