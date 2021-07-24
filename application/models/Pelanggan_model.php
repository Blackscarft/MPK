<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('pelanggan')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('pelanggan', ['id' => $id])->row_array();
    }

    public function add()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nmPelanggan', true))
        ];
        $this->db->insert('pelanggan', $data);
    }

    public function edit($id)
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nmPelanggan', true))
        ];
        $this->db->where('id', $id);
        $this->db->update('pelanggan', $data);
    }

    public function delete($id)
    {
        $this->db->delete('pelanggan', ['id' => $id]);
    }
}
