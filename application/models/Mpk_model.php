<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpk_model extends CI_Model
{
    public function get()
    {
        $query = "SELECT pelanggan.nama AS pelanggan,area.nama AS area, mpk.mulai, mpk.selesai, mpk.uraian, mpk.status,mpk.id
                    FROM area,pelanggan,mpk 
                    WHERE pelanggan.id = mpk.pelanggan 
                    AND area.id = mpk.area
                    ORDER BY mpk.id DESC
                ";

        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        $query = "SELECT pelanggan.nama AS pelanggan,area.nama AS area, pelanggan.id AS pelangganId, area.id AS areaId ,mpk.mulai, mpk.selesai, mpk.uraian, mpk.status,mpk.id
                    FROM area,pelanggan,mpk 
                    WHERE pelanggan.id = mpk.pelanggan 
                    AND area.id = mpk.area
                    AND mpk.id = $id
                ";

        return $this->db->query($query)->row_array();
    }

    public function getKonfirmasi()
    {
        $query = "SELECT pelanggan.nama AS pelanggan,area.nama AS area, mpk.mulai, mpk.selesai, mpk.uraian, mpk.status,mpk.id
                    FROM area,pelanggan,mpk 
                    WHERE pelanggan.id = mpk.pelanggan 
                    AND area.id = mpk.area
                    AND (mpk.status = 4 OR mpk.status = 5)
                    ORDER BY mpk.id DESC
                ";

        return $this->db->query($query)->result_array();
    }

    public function add()
    {
        $data = [
            'area' => htmlspecialchars($this->input->post('kodeArea', true)),
            'pelanggan' => htmlspecialchars($this->input->post('kodePelanggan', true)),
            'mulai' => date('Y-m-d', strtotime($this->input->post('startDate'))),
            'selesai' => date('Y-m-d', strtotime($this->input->post('endDate'))),
            'uraian' => htmlspecialchars($this->input->post('uraian', true)),
            'status' => 1
        ];

        $this->db->insert('mpk', $data);
    }

    public function edit($id)
    {
        $data = [
            'area' => htmlspecialchars($this->input->post('kodeArea', true)),
            'pelanggan' => htmlspecialchars($this->input->post('kodePelanggan', true)),
            'mulai' => date('Y-m-d', strtotime($this->input->post('startDate'))),
            'selesai' => date('Y-m-d', strtotime($this->input->post('endDate'))),
            'uraian' => htmlspecialchars($this->input->post('uraian', true))
        ];

        $this->db->where('id', $id);
        $this->db->update('mpk', $data);
    }

    public function delete($id)
    {
        $this->db->delete('mpk', ['id' => $id]);
    }
}
