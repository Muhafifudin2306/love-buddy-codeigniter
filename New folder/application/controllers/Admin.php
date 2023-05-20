<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('FeedbackModel');

        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('error', 'Sesi Anda Telah Berakhir');
            redirect('front');
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function feedback()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login'),
            'feedbacks' => $this->FeedbackModel->get_data_feedback()
        ];
        $this->load->view('admin/feedback/index', $data);
    }

    function detail_feedback($id)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'user' => $this->FeedbackModel->get_feedback_by_id($id)
        ];
        $this->load->view('admin/feedback/detail', $data);
    }
    public function delete_feedback($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('feedbacks');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Delete Berhasil');
        redirect('admin/feedback');
    }

    public function account()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login'),
            'users' => $this->UserModel->get_all_user()
        ];
        $this->load->view('admin/account/index', $data);
    }

    function edit_account($id)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'user' => $this->UserModel->get_role_by_id($id)
        ];
        $this->load->view('admin/account/edit', $data);
    }

    public function delete_account($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('users');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Delete Berhasil');
        redirect('admin/account');
    }

    public function update_account($id)
    {
        // Validasi form di sini
        // ...

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'id_role' => $this->input->post('id_role'),
            'id' => $id
        );
        $this->UserModel->updateUser($data);

        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Update Berhasil');
        redirect('admin/account');
    }



}