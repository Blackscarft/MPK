<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_model extends CI_Model
{
    public function get()
    {

        $query = "SELECT pelanggan.nama AS pelanggan,area.nama AS area, mpk.mulai, mpk.selesai, mpk.uraian, mpk.status,mpk.id
                    FROM area,pelanggan,mpk 
                    WHERE pelanggan.id = mpk.pelanggan 
                    AND area.id = mpk.area
                    AND mpk.status >= 3 
                    AND (area.id = 1)
                    ORDER BY mpk.id DESC
                ";

        return $this->db->query($query)->result_array();
    }
    public function konfirmasi($id)
    {
        $data = [
            'status' => 5
        ];
        $this->db->where('id', $id);
        $this->db->update('mpk', $data);
    }
}
