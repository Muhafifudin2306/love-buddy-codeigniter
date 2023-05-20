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
        $this->load->model('ConsultationModel');

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

    // Setting Page
    public function setting()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login'),
            'categories' => $this->ConsultationModel->get_data_category(),
            'educations' => $this->ConsultationModel->get_data_education(),
            'services' => $this->ConsultationModel->get_data_service()
        ];
        $this->load->view('admin/setting/index', $data);
    }

    // Setting Education
    function education_add()
    {
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
        ];
        $this->load->view('admin/education/add', $data);
    }

    function education_save()
    {
        $state = $this->input->post('state');
        $field = $this->input->post('field');
        $university = $this->input->post('university');
        $data = array(
            'state' => $state,
            'university' => $university,
            'field' => $field,
            // dan seterusnya
        );
        $insert_id = $this->ConsultationModel->insert_education($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Pesan Terkirim');
            redirect('/admin/setting');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('/admin/setting');
        }
    }

    function edit_education($id)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'education' => $this->ConsultationModel->get_education_by_id($id)
        ];
        $this->load->view('admin/education/edit', $data);
    }

    public function update_education($id)
    {
        // Validasi form di sini
        // ...

        $data = array(
            'state' => $this->input->post('state'),
            'field' => $this->input->post('field'),
            'university' => $this->input->post('university'),
            'id' => $id
        );
        $this->ConsultationModel->updateEducation($data);

        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Update Berhasil');
        redirect('admin/setting');
    }

    public function delete_education($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('educations');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Delete Berhasil');
        redirect('admin/setting');
    }
    // Setting Education

    // Setting Category
    function category_add()
    {
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
        ];
        $this->load->view('admin/category/add', $data);
    }

    function category_save()
    {
        $name = $this->input->post('name');
        $data = array(
            'name' => $name
            // dan seterusnya
        );
        $insert_id = $this->ConsultationModel->insert_category($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Pesan Terkirim');
            redirect('/admin/setting');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('/admin/setting');
        }
    }


    function edit_category($id)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'category' => $this->ConsultationModel->get_category_by_id($id)
        ];
        $this->load->view('admin/category/edit', $data);
    }

    public function update_category($id)
    {
        // Validasi form di sini
        // ...

        $data = array(
            'name' => $this->input->post('name'),
            'id' => $id
        );
        $this->ConsultationModel->updateCategory($data);

        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Update Berhasil');
        redirect('admin/setting');
    }

    public function delete_category($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('categories');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Delete Berhasil');
        redirect('admin/setting');
    }
    // Setting Category


    // Service Category

    // Service Category
    function service_add()
    {
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
        ];
        $this->load->view('admin/service/add', $data);
    }

    function service_save()
    {
        $name = $this->input->post('name');
        $media = $this->input->post('media');
        $icon = $this->input->post('icon');
        $data = array(
            'name' => $name,
            'media' => $media,
            'icon' => $icon
            // dan seterusnya
        );
        $insert_id = $this->ConsultationModel->insert_service($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Pesan Terkirim');
            redirect('/admin/setting');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('/admin/setting');
        }
    }


    function edit_service($id)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'service' => $this->ConsultationModel->get_service_by_id($id)
        ];
        $this->load->view('admin/service/edit', $data);
    }

    public function update_service($id)
    {
        // Validasi form di sini
        // ...

        $data = array(
            'name' => $this->input->post('name'),
            'icon' => $this->input->post('icon'),
            'media' => $this->input->post('media'),
            'id' => $id
        );
        $this->ConsultationModel->updateService($data);

        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Update Berhasil');
        redirect('admin/setting');
    }

    public function delete_service($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('services');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success', 'Delete Berhasil');
        redirect('admin/setting');
    }
    // Setting Page

}