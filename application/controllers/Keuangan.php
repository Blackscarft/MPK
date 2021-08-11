<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('area_model');
        $this->load->model('pelanggan_model');
        $this->load->model('mpk_model');
        $this->load->model('keuangan_model');
    }

    public function mpk()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpks'] = $this->keuangan_model->get();

        $data['notifs'] = $this->keuangan_model->getNotif();
        $data['count'] = $this->db->get_where('mpk', ['status' => 1])->num_rows();
        $data['urlNotif'] = $data['urlSubmit'] = '/keuangan/detail';


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('keuangan/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('keuangan/script');
        $this->load->view('script/modalUraian');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Konfirmasi MPK';
        $data['urlSubmit'] = 'keuangan/detail/' . $id;
        $data['areas'] = $this->area_model->get();
        $data['pelanggans'] = $this->pelanggan_model->get();
        $data['mpks'] = $this->mpk_model->getById($id);

        $this->form_validation->set_rules('area', 'area', 'required|trim', ['required' => 'Area Harus diisi !']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('keuangan/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->keuangan_model->konfirmasi($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk di konfirmasi</div>');
            redirect('keuangan/mpk');
        }
    }

    public function notif()
    {
        $output = '';

        $data = $this->keuangan_model->getNotif();


        if ($data->num_rows() > 0) {
            $mpk = $data->result_array();
            foreach ($mpk as $row) {
                $output .= '
                        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
                            <div class="toast-header">
                                <i class="fas fa-file-alt text-dark mr-3"></i>
                                <strong class="mr-auto">Mpk Baru</strong>
                                <small>11 mins ago</small>
                                <button type="button" class="ml-2 mb-1 close updateNotif" data-dismiss="toast" aria-label="Close" id="" data-id=' . $row['id'] . '>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                            <span style="cursor:pointer" class="text-dark updateNotifLink" data-id=' . $row['id'] . ' >Area : ' . $row["area"] . ', Tgl mulai : ' . $row["mulai"] . '</span>
                            </div>
                        </div>
                        
                    ';
            }

            $output .= '
            <script>
            $(".updateNotif").on("click", function() {
                let id = $(this).data("id");
                $.ajax({
                    url: "' . base_url('keuangan/updateNotif/') . '" + id,
                    method: "POST",
                    data: {
                        "notif": id
                    }
                });
            });
            $(".updateNotifLink").on("click", function() {
                let id = $(this).data("id");
                $.ajax({
                    url: "' . base_url('keuangan/updateNotif/') . '" + id,
                    method: "POST",
                    data: {
                        "notif": id
                    }
                });
                document.location.href = "' . base_url('keuangan/detail/') . '" + id;
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
        $this->keuangan_model->notifUpdate($id);
    }
}
