<?php

class Model_dojo extends CI_Model
{
    public function getAllDojo()
    {
        $query = $this->db->get('dojo');
        return $query->result_array();
    }

    public function getDojoById($id)
    {
        return $this->db->get_where('dojo', ['id_dojo' => $id])->row_array();
    }

    public function tambahDataDojo($data)
    {
        $this->db->insert('dojo', $data);
    }

    public function ubahDataDojo($data, $id)
    {
        $this->db->where('id_dojo', $id);
        $this->db->update('dojo', $data);
    }
}
