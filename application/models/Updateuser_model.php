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
            $update_users = $this->db->update('users', $data);

            if ($update_users) {
                $data2 = array(
                    'author_firstname' => $this->input->post('firstname'),
                    'author_lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'status' => $this->input->post('status'),
                );

                $this->db->where('auid', $this->input->post('userid'));
                $update_authors = $this->db->update('authors', $data2);

                return $update_authors;
            } else {
                return false;
            }
        }


        // public function update_detailview($userid)
        // {
        //     $userid = url_title($this->input->post('firstname'));

        //     $data = array(
        //         'firstname' => $this->input->post('firstname'),
        //         'lastname' => $this->input->post('lastname'),
        //         'email' => $this->input->post('email'),
        //     );
        //     $this->db->where('userid', $this->input->post('userid'));
        //     return $this->db->update('users', $data);
        // }

        public function update_detailview($userid, $update_data)
        {
            // Update the user details in the database
            $this->db->where('userid', $userid);
            $this->db->update('users', $update_data);
        }



    }