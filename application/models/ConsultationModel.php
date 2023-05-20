<?php
class ConsultationModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    // Category Model
    public function get_data_category()
    {
        return $this->db->get('categories')->result();
    }

    public function insert_category($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function get_category_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateCategory($data)
    {
        $name = $data['name'];
        $id = $data['id'];

        $data = array(
            'name' => $name,
        );

        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }
    // Category Model

    // Educatiol Model
    public function get_data_education()
    {
        return $this->db->get('educations')->result();
    }

    public function insert_education($data)
    {
        $this->db->insert('educations', $data);
        return $this->db->insert_id();
    }


    public function get_education_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('educations');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateEducation($data)
    {
        $state = $data['state'];
        $field = $data['field'];
        $university = $data['university'];
        $id = $data['id'];

        $data = array(
            'state' => $state,
            'field' => $field,
            'university' => $university
        );

        $this->db->where('id', $id);
        $this->db->update('educations', $data);
    }

    // Education Model


}