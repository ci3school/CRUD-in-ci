<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function getAllUsers($limit = null, $start= null) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('users');
        return $query->result();
    }
    
    public function getUserById($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }
    
    
    public function getTotalUsers() {
        $query = $this->db->get('users');
        return $query->num_rows();
    }
    
    public function add($data) {
        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}
