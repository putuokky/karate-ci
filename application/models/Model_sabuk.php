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

    public function getJumlahSabuk()
    {
        $this->db->select("b.*, COUNT(a.id_karateka) as jml");
        // $this->db->select("b.*");
        $this->db->from('karateka a');
        $this->db->join('sabuk b', 'b.id_sabuk = a.sabuk', 'right');
        $this->db->group_by("a.sabuk");
        $this->db->order_by("b.id_sabuk");

        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
