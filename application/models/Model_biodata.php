<?php

class Model_biodata extends CI_Model
{
    public function getAllBiodata()
    {
        $this->db->select('*');
        $this->db->from('biodata');
        $this->db->join('dojo', 'dojo.id_dojo = biodata.dojo');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBioDojoById($id)
    {
        $this->db->select('*');
        $this->db->from('biodata');
        $this->db->join('dojo', 'dojo.id_dojo = biodata.dojo');
        $this->db->where('id_biodata', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getBiodataByStatus()
    {
        return $this->db->get_where('biodata', ['status_karateka' => 0])->result_array();
    }

    public function getBiodataById($id)
    {
        return $this->db->get_where('biodata', ['id_biodata' => $id])->row_array();
    }

    public function tambahDataBiodata($data)
    {
        $this->db->insert('biodata', $data);
    }

    public function ubahDataBiodata($data, $id)
    {
        $this->db->where('id_biodata', $id);
        $this->db->update('biodata', $data);
    }

    public function ubahDataBioForStatus($dt, $id)
    {
        $this->db->where('id_biodata', $id);
        $this->db->update('biodata', $dt);
    }
}
