<?php

    class Evaluate extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $data['title'] = 'List of Pending Articles';

            $data['authors'] = $this->article_model->join_author();

            $data['articles'] = $this->article_model->get_articles();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('evaluate/index', $data);
            $this->load->view('templates/footer', $data);
        }

        public function evaluate_article_detail($articleid = NULL)
        {
            $data['title'] = 'Article Detail';

            $data['authors'] = $this->article_model->get_author_by_article();
            $data['authors'] = $this->article_model->join_author();

            $data['articles'] = $this->article_model->get_articles($articleid);

            if (empty($data['articles']))
            {
                    show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenuandsidebar', $data);
            $this->load->view('articles/article_detail', $data);
            $this->load->view('templates/footer', $data);
        }

        public function approve_article($articleid)
        {
            $this->load->model('article_model');
            $this->article_model->approve_article($articleid);
            redirect('evaluate_articles');
        }

    }