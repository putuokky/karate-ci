<?php

class Model_sabuk extends CI_Model
{
    public function getAllSabuk()
    {
        $query = $this->db->get('sabuk');
        return $query->result_array();
    }

    public function getSabukById($id)
    {
        return $this->db->get_where('sabuk', ['id_sabuk' => $id])->row_array();
    }

    public function tambahDataSabuk($data)
    {
        $this->db->insert('sabuk', $data);
    }

    public function ubahDataSabuk($data, $id)
    {
        $this->db->where('id_sabuk', $id);
        $this->db->update('sabuk', $data);
    }

    public function hapusDataSabuk($id)
    {
        $this->db->where('id_sabuk', $id);
        $this->db->delete('sabuk');
    }
}
