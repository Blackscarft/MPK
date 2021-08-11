<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('area_model');
        $this->load->model('pelanggan_model');
        $this->load->model('mpk_model');
    }

    public function data()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpks'] = $this->mpk_model->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('mpk/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('mpk/script');
        $this->load->view('script/modalUraian');
    }

    public function konfirm()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpks'] = $this->mpk_model->getKonfirmasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('mpk/konfirm', $data);
        $this->load->view('templates/footer');
        $this->load->view('script/modalUraian');
    }

    public function input()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Input MPK';
        $data['urlSubmit'] = 'mpk/input';
        $data['areas'] = $this->area_model->get();
        $data['pelanggans'] = $this->pelanggan_model->get();

        $this->form_validation->set_rules('kodeArea', 'Pelanggan', 'required|trim', ['required' => 'Area Harus diisi !']);
        $this->form_validation->set_rules('kodePelanggan', 'kodePelanggan', 'required|trim', ['required' => 'Pelanggan Harus diisi !']);
        $this->form_validation->set_rules('date', 'date', 'required|trim', ['required' => 'Tanggal Harus diisi !']);
        $this->form_validation->set_rules('uraian', 'uraian', 'required|trim', ['required' => 'Uraian Harus diisi !']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('mpk/input', $data);
            $this->load->view('templates/footer');
            $this->load->view('script/datePicker', $data);
        } else {
            $this->mpk_model->add();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk berhasil ditambahkan</div>');
            redirect('mpk/data');
        }
    }

    public function editMpk($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit MPK';
        $data['urlSubmit'] = 'mpk/editMpk/' . $id;
        $data['areas'] = $this->area_model->get();
        $data['pelanggans'] = $this->pelanggan_model->get();
        $data['mpks'] = $this->mpk_model->getById($id);

        $this->form_validation->set_rules('kodeArea', 'area', 'required|trim', ['required' => 'Area Harus diisi !']);
        $this->form_validation->set_rules('kodePelanggan', 'kodePelanggan', 'required|trim', ['required' => 'Pelanggan Harus diisi !']);
        $this->form_validation->set_rules('date', 'date', 'required|trim', ['required' => 'Tanggal Harus diisi !']);
        $this->form_validation->set_rules('uraian', 'uraian', 'required|trim', ['required' => 'Uraian Harus diisi !']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('mpk/input', $data);
            $this->load->view('templates/footer');
            $this->load->view('script/datePicker', $data);
        } else {
            $this->mpk_model->edit($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk berhasil diedit</div>');
            redirect('mpk/data');
        }
    }

    public function deleteMpk($id)
    {
        $this->mpk_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk berhasil dihapus</div>');
        redirect('mpk/data');
    }

    public function cetak($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpk'] = $this->mpk_model->getById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mpk/cetak', $data);
    }

    public function notif()
    {
        $output = '';

        $data = $this->mpk_model->getNotif();
        if ($data->num_rows() > 0) {
            $mpk = $data->result_array();
            foreach ($mpk as $row) {
                $output .= '
                        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
                            <div class="toast-header">
                                <i class="fas fa-file-alt text-dark mr-3"></i>
                                <strong class="mr-auto">Acc Mpk</strong>
                                <small></small>
                                <button type="button" class="ml-2 mb-1 close updateNotif" data-dismiss="toast" aria-label="Close" id="" data-id=' . $row['id'] . '>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                <span>Area : ' . $row["area"] . ', pelanggan : ' . $row["pelanggan"] . '</span>
                            </div>
                        </div>
                        
                    ';
            }

            $output .= '
                <script>
                    $(".updateNotif").on("click", function() {
                        let id = $(this).data("id");
                        $.ajax({
                            url: "' . base_url('/mpk/updateNotif/') . '" + id,
                            method: "POST",
                            data: {
                                "notif": id
                            }
                        });
                    });
                </script>
            ';
        } else {
            $output = '';
        }

        $notif = array(
            'notif' => $output
        );
        echo json_encode($notif);
    }

    public function updateNotif($id)
    {
        $this->mpk_model->notifUpdate($id);
    }
}
