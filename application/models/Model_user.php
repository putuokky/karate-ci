<?php

class Model_user extends CI_Model
{
    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        $this->db->where_not_in('role_id', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserByMail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function getUsersById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function tambahDataUsers($data)
    {
        $this->db->insert('user', $data);
    }

    public function ubahDataUsers($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
