<?php
class Roles extends CI_Controller {

    public function index() {
        $data['title'] = 'Table of Roles';
        $data['roles'] = $this->role_model->get_roles();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topmenu', $data);
        $this->load->view('templates/sidemenu', $data);
        $this->load->view('roles/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_roles() {
        $data['title'] = 'Add Roles';

        $this->form_validation->set_rules('rolename', 'Rolename', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu', $data);
            $this->load->view('templates/sidemenu', $data);
            $this->load->view('roles/add_roles');
            $this->load->view('templates/footer', $data);   
        } else {
            $this->role_model->add_role();
            redirect('roles');
        }
    }

    public function edit_roles($roleid) {
        $data['roles'] = $this->role_model->get_roles($roleid);

        if (empty($data['roles'])) {
            show_404();
        }

        $data['title'] = 'Edit Role';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topmenu', $data);
        $this->load->view('templates/sidemenu', $data);
        $this->load->view('roles/edit_roles', $data);
        $this->load->view('templates/footer', $data);   
    }

    public function update_role() {
        $roleid = $this->input->post('roleid');

        if ($roleid) {
            $this->role_model->update_role($roleid);
        }

        redirect('roles');
    }

    // public function update_role()
    // {
    //     $this->role_model->update_role($roleid);
    //     redirect('roles');
    // }
}

