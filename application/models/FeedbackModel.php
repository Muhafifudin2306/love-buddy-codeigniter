<?php
class FeedbackModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_data_feedback()
    {
        return $this->db->get('feedbacks')->result();
    }

    public function insert_data_feedback($data)
    {
        $this->db->insert('feedbacks', $data);
        return $this->db->insert_id();
    }
    public function get_feedback_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('feedbacks');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

}