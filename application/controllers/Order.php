<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('OrderModel');
        $this->load->model('PaymentModel');
        $this->load->model('ConsultationModel');
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
    public function my_order()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'is_login' => $this->session->userdata('is_login'),
            'orders' => $this->OrderModel->get_all_data_by_user_id($this->session->userdata('id'))
        ];
        $this->load->view('order/index', $data);
    }

    public function save_order()
    {
        $data_order = array(
            'id_feature' => $this->input->post('id_feature'),
            'id_payment' => $this->input->post('id_payment'),
            'date_order' => $this->input->post('date_order'),
            'time_order' => $this->input->post('time_order'),
            'email' => $this->input->post('email'),
            'desc' => $this->input->post('desc'),
            'id_user' => $this->input->post('id_user'),
            'id_talent' => $this->input->post('id_talent'),
            'solution' => $this->input->post('solution'),
            'name' => $this->input->post('name'),
            'education' => $this->input->post('education'),
            'job' => $this->input->post('job'),
            'number' => $this->input->post('number'),
            'birthday' => $this->input->post('birthday'),
            'status' => $this->input->post('status'),
            'sex' => $this->input->post('sex')
            // dan seterusnya
        );
        $insert_id = $this->OrderModel->insert_data_order($data_order);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Pesanan Terkirim');
            redirect('/front');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('/front');
        }
    }
    function edit_payment($id)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'order' => $this->OrderModel->get_order_by_id($id)
        ];
        $this->load->view('order/edit', $data);
    }
    function detail_payment($id, $id_con)
    {
        $where = array('id' => $id);
        $data = [
            'is_login' => $this->session->userdata('is_login'),
            'id_role' => $this->session->userdata('id_role'),
            'order' => $this->OrderModel->get_order_by_id($id),
            'talent_categories' => $this->ConsultationModel->talent_relation_category_by_id($id_con),
            'talent_services' => $this->ConsultationModel->talent_relation_service_by_id($id_con),
            'talent_educations' => $this->ConsultationModel->talent_relation_education_by_id($id_con),
            'talent' => $this->ConsultationModel->get_data_talent_by_id($id_con),
            'features' => $this->PaymentModel->get_data_feature(),
            'payments' => $this->PaymentModel->get_data_payment()
        ];
        $this->load->view('order/detail', $data);
    }

    function payment_save($id)
    {
        $this->load->library('upload');

        //konfigurasi upload
        $config['upload_path'] = './assets/img/tf';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        //inisialisasi upload
        $this->upload->initialize($config);
        $data = array(
            'order_status' => 'Pending',
            'payment_status' => 'Terkirim',
            'id' => $id

        );
        $this->OrderModel->updateOrder($id, $data);
        $this->session->set_flashdata('success', 'Update Berhasil');
        redirect('order/my_order');
    }
}
