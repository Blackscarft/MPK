<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function getLaporan($mulai, $selesai, $pelanggan)
    {
        $query = "SELECT pelanggan.nama AS pelanggan,area.nama AS area, mpk.mulai, mpk.selesai, mpk.uraian, mpk.status,mpk.id 
        FROM area,pelanggan,mpk 
        WHERE pelanggan.id = mpk.pelanggan 
        AND area.id = mpk.area 
        AND (mpk.status = 4 OR mpk.status = 5) 
        AND pelanggan.id = $pelanggan
        AND (mpk.selesai BETWEEN '$mulai' AND '$selesai')
        ORDER BY mpk.id DESC";

        return $this->db->query($query)->result_array();
    }
}
