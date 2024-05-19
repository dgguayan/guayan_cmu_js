<?php 

    class  Updateuser_model extends CI_Model
    {
        public function update_user()
        {
            $userid = url_title($this->input->post('firstname'));

            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'pword' => $this->input->post('pword'),
                'status' => $this->input->post('status'),
            );
            $this->db->where('userid', $this->input->post('userid'));
            return $this->db->update('users', $data);
        }

        public function update_detailview($userid)
        {
            $userid = url_title($this->input->post('firstname'));

            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
            );
            $this->db->where('userid', $this->input->post('userid'));
            return $this->db->update('users', $data);
        }


    }