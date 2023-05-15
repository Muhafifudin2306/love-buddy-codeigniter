<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FeedbackModel');
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
    public function index()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login')
        ];
        $this->load->view('index', $data);
    }

    public function save_feedback()
    {
        $message = $this->input->post('message');
        $telephone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $data = array(
            'name' => $name,
            'message' => $message,
            'email' => $email,
            'telephone' => $telephone,
            // dan seterusnya
        );
        $insert_id = $this->FeedbackModel->insert_data_feedback($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Pesan Terkirim');
            redirect('/front');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('/front');
        }
    }
}