<?php

    class Article_model extends CI_Model
    {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_articles($articleid = FALSE)
        {
            if($articleid === FALSE)
            {
            
                $query = $this->db->get('articles');

                return $query->result_array();
            }

            $query = $this->db->get_where('articles', array('articleid' => $articleid));
            return $query->row_array();
        }

        public function join_author()
        {
            $this->db->select('*');
            $this->db->from('authors');
            $this->db->join('article_author', 'authors.auid = article_author.auid');
            $query = $this->db->get();
            return $query->result_array();
        }


        public function add_article($filename)
        {
            $articleid = url_title($this->input->post('title'));

            $data = array(
                'articleid' => $articleid,
                'title' => $this->input->post('title'),
                'abstract' => $this->input->post('abstract'),
                'volumeid' => $this->input->post('volumeid'),
                'doi' => $this->input->post('doi'),
                'userid' => $this->session->userdata('userid'),
                'filename' => $filename,
            );
            
            $this->db->insert('articles', $data);

            
            $articleid = $this->db->insert_id();

            $selected_authors = $this->input->post('authors');

            if (!empty($selected_authors)) {
                foreach ($selected_authors as $author_id) {
                    $data2 = array(
                        'articleid' => $articleid,
                        'auid' => $author_id,
                    );
                    $this->db->insert('article_author', $data2);
                }
            }

            return true;
        }

        public function get_volume()
        {
            $this->db->order_by('vol_name');
            $query = $this->db->get('volume');
            return $query->result_array();
        }

        public function get_article_by_volume($volumeid)
        {
            $this->db->order_by('articles.articleid', 'ASC');
            $this->db->join('volume', 'volume.volumeid = articles.volumeid');
            $this->db->where('articles.volumeid', $volumeid);
            $query = $this->db->get('articles');
            return $query->result_array();
        }

        //multiple authors for display
        public function get_author_by_article()
        {

            $this->db->select('*');
            $this->db->from('authors');
            $this->db->join('article_author', 'article_author.auid = authors.userid');
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return []; 
            }
        }

        //get specific articles by that specific author
        // public function get_article_by_author($userid)
        // {
        //     $this->db->order_by('articles.title', 'ASC');
        //     $this->db->join('users', 'users.userid = articles.userid');
        //     $this->db->where('articles.userid', $userid);
        //     $query = $this->db->get('articles');
        //     return $query->result_array();
        // }
        public function get_article_by_author($userid) {
            $this->db->select('articles.*');
            $this->db->from('articles');
            $this->db->join('article_author', 'articles.articleid = article_author.articleid');
            $this->db->where('article_author.auid', $userid);
            $this->db->order_by('articles.title', 'ASC');
            $query = $this->db->get();
            
            return $query->result_array();
        }

        public function is_author_of_article($userid, $articleid)
        {
            $this->db->select('1');
            $this->db->from('article_author');
            $this->db->where('auid', $userid);
            $this->db->where('articleid', $articleid);
            $query = $this->db->get();

            return $query->num_rows() > 0;
        }

        

        //edit
        public function update_article()
        {
            $articleid = url_title($this->input->post('title'));

            $data = array(
                
                'title' => $this->input->post('title'),
                'abstract' => $this->input->post('abstract'),
                'volumeid' => $this->input->post('volumeid'),
                'doi' => $this->input->post('doi'),
                // 'filename' => $this->input->post('filename'),
            );
            
            $this->db->where('articleid', $this->input->post('articleid'));
            return $this->db->update('articles', $data);
        }

        //article id admin
        public function delete_article_admin($articleid)
        {
            $this->db->where('articleid', $articleid);
            $this->db->delete('articles');
            return true;
        }
        
        //article delete user
        public function delete_article_user($articleid)
        {
            $this->db->where('articleid', $articleid);
            $this->db->delete('articles');
            return true;
        }
    }