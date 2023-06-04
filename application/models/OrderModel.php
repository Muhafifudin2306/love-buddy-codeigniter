<?php
class OrderModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_data_order()
    {
        $this->db->select('orders.*, talents.id AS id_talent, users.id AS id_user, talents.name AS talent_name, users.name AS user_name,payments.id AS id_payment, payments.name AS payment_name');
        $this->db->join('talents', 'orders.id_talent = talents.id');
        $this->db->join('users', 'orders.id_user = users.id');
        $this->db->join('payments', 'orders.id_payment = payments.id');
        $this->db->from('orders');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_data_by_user_id($id)
    {
        $this->db->select('orders.*, talents.id AS id_talent, users.id AS id_user, talents.name AS talent_name, users.name AS user_name,payments.id AS id_payment, payments.name AS payment_name, payments.number AS payment_number,features.service AS feature_service');
        $this->db->join('talents', 'orders.id_talent = talents.id');
        $this->db->join('features', 'orders.id_feature = features.id');
        $this->db->join('users', 'orders.id_user = users.id');
        $this->db->join('payments', 'orders.id_payment = payments.id');
        $this->db->where('id_user', $id);
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function insert_data_order($data)
    {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    public function get_order_by_id($id)
    {
        $this->db->select('orders.*, talents.id AS id_talent, users.id AS id_user, talents.name AS talent_name, users.name AS user_name,payments.id AS id_payment, payments.name AS payment_name, payments.number AS payment_number, payments.image AS payment_image, payments.admin AS payment_admin, features.service AS feature_service,features.duration AS feature_duration, features.session_count AS feature_session_count, features.price AS feature_price');
        $this->db->join('talents', 'orders.id_talent = talents.id');
        $this->db->join('features', 'orders.id_feature = features.id');
        $this->db->join('users', 'orders.id_user = users.id');
        $this->db->join('payments', 'orders.id_payment = payments.id');
        $this->db->where('orders.id', $id);
        $query = $this->db->get('orders');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }
    public function get_order_by_user_id($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('orders');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }


    public function updateOrder($id, $data)
    {
        $message = $data['message'];
        $order_status = $data['order_status'];
        $payment_status = $data['payment_status'];
        $id = $data['id'];
        $this->db->where('id', $id);
        $order = $this->db->get('orders')->row();
        $bukti_tf = $order->bukti_tf;


        $config['upload_path'] = './assets/img/tf';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        //konfigurasi upload
        if ($this->upload->do_upload('bukti_tf')) {
            $data = array(
                'message' => $message,
                'order_status' => $order_status,
                'payment_status' => $payment_status,
                'bukti_tf' => $this->upload->data('file_name')

            );
            $this->db->where('id', $id);
            $this->db->update('orders', $data);
        } else {
            $data = array(
                'message' => $message,
                'order_status' => $order_status,
                'payment_status' => $payment_status,
                'bukti_tf' => $bukti_tf
            );
            $this->db->where('id', $id);
            $this->db->update('orders', $data);
        }
    }
}
