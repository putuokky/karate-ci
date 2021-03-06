<?php

class Model_karate extends CI_Model
{
    public function getAllKarate()
    {
        $this->db->select('*');
        $this->db->from('karateka');
        $this->db->join('biodata', 'biodata.id_biodata = karateka.biodata');
        $this->db->join('sabuk', 'sabuk.id_sabuk = karateka.sabuk');
        $this->db->join('dojo', 'dojo.id_dojo = biodata.dojo');
        $this->db->where('biodata.status_karateka', '1');
        $this->db->group_by('biodata.id_biodata');
        $this->db->order_by('id_karateka', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKarateByIdBio($where, $id)
    {
        $this->db->select('*');
        $this->db->from('karateka');
        $this->db->join('biodata', 'biodata.id_biodata = karateka.biodata');
        $this->db->join('sabuk', 'sabuk.id_sabuk = karateka.sabuk');
        $this->db->where($where, $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKarateByTglUjian()
    {
        $this->db->select('*');
        $this->db->from('karateka');
        $this->db->join('biodata', 'biodata.id_biodata = karateka.biodata');
        $this->db->join('sabuk', 'sabuk.id_sabuk = karateka.sabuk');
        $this->db->join('dojo', 'dojo.id_dojo = biodata.dojo');
        $this->db->where('tgl_ujian IS NOT null');
        $this->db->where('no_ijasah IS null');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKarateByIdKareteka($where, $id)
    {
        $this->db->select('*');
        $this->db->from('karateka');
        $this->db->join('biodata', 'biodata.id_biodata = karateka.biodata');
        $this->db->join('sabuk', 'sabuk.id_sabuk = karateka.sabuk');
        $this->db->where($where, $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getKarateById($id)
    {
        return $this->db->get_where('karateka', ['id_karateka' => $id])->row_array();
    }

    public function tambahDataKarate($data)
    {
        $this->db->insert('karateka', $data);
    }

    public function tambahDataKarateNewSabuk($dt)
    {
        $this->db->insert('karateka', $dt);
    }

    public function ubahDataKarate($data, $id)
    {
        $this->db->where('id_karateka', $id);
        $this->db->update('karateka', $data);
    }

    public function hapusDataKarateka($id)
    {
        $this->db->where('id_karateka', $id);
        $this->db->delete('karateka');
    }
}
