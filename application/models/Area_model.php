<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('area')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('area', ['id' => $id])->row_array();
    }

    public function add()
    {
        $data = [
            'kode' => htmlspecialchars($this->input->post('kodeArea', true)),
            'nama' => htmlspecialchars($this->input->post('namaArea', true)),
        ];
        $this->db->insert('area', $data);
    }

    public function edit($id)
    {
        $data = [
            'kode' => htmlspecialchars($this->input->post('kodeArea', true)),
            'nama' => htmlspecialchars($this->input->post('namaArea', true)),
        ];
        $this->db->where('id', $id);
        $this->db->update('area', $data);
    }

    public function delete($id)
    {
        $this->db->delete('area', ['id' => $id]);
    }
}
