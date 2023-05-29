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
}