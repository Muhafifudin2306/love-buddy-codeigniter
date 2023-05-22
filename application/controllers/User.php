<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('ConsultationModel');
        $this->load->library('pagination');

        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        }
    }
    public function page()
    {
        $role_admin = 1;
        $role_instructor = 2;
        $role_member = 3;
        $this->load->view('admin/user/style');


        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'user_count' => $this->UserModel->count_all(),
            'course_count' => $this->CourseModel->count_all(),
            'admin_count' => $this->UserModel->get_users_role($role_admin),
            'instructor_count' => $this->UserModel->get_users_role($role_instructor),
            'member_count' => $this->UserModel->get_users_role($role_member)
        ];

        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('admin/user/script');
    }

    public function detail_course($id)
    {

        $data = [
            'id_role' => $this->session->userdata('id_role'),
            // 'course' => $this->CourseModel->get_course_by_id($id),
            // 'categories' => $this->PlaylistModel->get_data_playlist(),
            // 'detail' => $this->PlaylistModel->get_playlists_by_id($id),
            // 'videos' => $this->PlaylistModel->get_all_video()
        ];
        $data['course'] = $this->CourseModel->get_course_by_id_detail($id);
        $data['playlists'] = $this->CourseModel->get_playlists_by_course_id($id);

        foreach ($data['playlists'] as $playlist) {
            $playlist->videos = $this->CourseModel->get_videos_by_playlist_id($playlist->id);
            foreach ($playlist->videos as $video) {
                $video->detail = $this->CourseModel->get_video_by_id($video->id);
            }
        }

        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/detailedCourse');
        $this->load->view('admin/user/script');
    }

    public function savedClass($id)
    {

        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_course($id)
        ];


        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/savedClass');
        $this->load->view('admin/user/script');
    }
    public function setting()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'users' => $this->UserModel->get_all_user()
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/setting');
        $this->load->view('admin/user/script');
    }


    public function profile()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role')
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/profile');
        $this->load->view('admin/user/script');
    }

    function edit_user($id)
    {
        $where = array('id' => $id);
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'user' => $this->UserModel->get_role_by_id($id)
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/setting/form', $data);
        $this->load->view('admin/user/script');
    }

    public function delete_user($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('users');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete_user', 'Data berhasil diupdate');
        redirect('userBranch/user/setting');
    }

    public function update_user($id)
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
        $this->session->set_flashdata('success_update_user', 'Data berhasil diupdate');
        redirect('userBranch/user/setting');
    }

    public function delete_course()
    {
        $id_user = $this->input->post('id_user');
        $id_course = $this->input->post('id_course');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_course', $id_course);
        $this->db->delete('user_has_course_saved');
        // $insert_id = $this->UserModel->insert_data_saved_course($data);

        $this->session->set_flashdata('success_add', 'email atau Password salah');
        redirect('userBranch/user/listClass');
    }

    // Consultant
    public function consultation()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login'),
            'categories' => $this->ConsultationModel->get_data_category(),
            'talents' => $this->ConsultationModel->get_data_talent_relation()
        ];
        $this->load->view('admin/consultation/index', $data);
    }

    public function consultation_detail($id)
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login'),
            'categories' => $this->ConsultationModel->get_data_category(),
            'talents' => $this->ConsultationModel->get_data_talent_relation()
        ];
        $this->load->view('admin/consultation/detail', $data);
    }

}