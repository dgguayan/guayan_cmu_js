<?php

    class Volume_model extends CI_Model
    {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_volumes($volumeid = FALSE)
        {
            if($volumeid === FALSE)
            {
                $query = $this->db->get('volume');
                return $query->result_array();
            }

            $query = $this->db->get_where('volume', array('volumeid' => $volumeid));
            return $query->row_array();
        }

        public function add_volume()
        {
            $volumeid = url_title($this->input->post('vol_name'));

            $data = array(
                'volumeid' => $volumeid,
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description'),
            );
            return $this->db->insert('volume', $data);

        }

    }