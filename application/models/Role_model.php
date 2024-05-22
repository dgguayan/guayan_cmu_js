<?php
class Role_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_roles($roleid = FALSE) {
        if ($roleid === FALSE) {
            $query = $this->db->get('role');
            return $query->result_array();
        }

        $query = $this->db->get_where('role', array('roleid' => $roleid));
        return $query->row_array();
    }

    public function add_role() {
        $roleid = url_title($this->input->post('firstname'));

        $data = array(
            'roleid' => $roleid,
            'rolename' => $this->input->post('rolename'),
            'rolebranch' => $this->input->post('rolebranch'),
        );

        $this->db->insert('role', $data);
    }

    public function update_role($roleid) {
        $data = array(
            'rolename' => $this->input->post('rolename'),
            'rolebranch' => $this->input->post('rolebranch'),
            'status' => $this->input->post('status'), // Fixed typo
        );

        $this->db->where('roleid', $roleid);
        return $this->db->update('role', $data);
    }
}
?>
