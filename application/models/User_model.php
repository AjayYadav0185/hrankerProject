<?php


class User_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function getUserByEmail($email) {
        return $this->db->get_where('users', ['email' => $email])->row();
    }
}