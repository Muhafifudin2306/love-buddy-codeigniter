<?php
class PaymentModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_data_feature()
    {
        return $this->db->get('features')->result();
    }
    public function get_data_payment()
    {
        return $this->db->get('payments')->result();
    }
    public function insert_feature($data)
    {
        $this->db->insert('features', $data);
        return $this->db->insert_id();
    }

    public function get_feature_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('features');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateFeature($data)
    {
        $session_count = $data['session_count'];
        $price = $data['price'];
        $service = $data['service'];
        $duration = $data['duration'];
        $id = $data['id'];

        $data = array(
            'session_count' => $session_count,
            'price' => $price,
            'service' => $service,
            'duration' => $duration
        );

        $this->db->where('id', $id);
        $this->db->update('features', $data);
    }

    public function insert_payment($data)
    {
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }
    public function get_payment_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('payments');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }
    public function updatePayment($id, $data)
    {
        $name = $data['name'];
        $number = $data['number'];
        $admin = $data['admin'];
        $id = $data['id'];
        $this->db->where('id', $id);
        $payment = $this->db->get('payments')->row();
        $image = $payment->image;

        $config['upload_path'] = './assets/img/bank';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        //konfigurasi upload
        if ($this->upload->do_upload('image')) {
            $data = array(
                'name' => $name,
                'number' => $number,
                'admin' => $admin,
                'image' => $this->upload->data('file_name')

            );
            $this->db->where('id', $id);
            $this->db->update('payments', $data);

        } else {
            $data = array(
                'name' => $name,
                'number' => $number,
                'admin' => $admin,
                'image' => $image

            );
            $this->db->where('id', $id);
            $this->db->update('payments', $data);
        }
    }


}