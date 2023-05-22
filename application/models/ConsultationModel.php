<?php
class ConsultationModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    // talent Model
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


    // Service Model

    public function get_data_service()
    {
        return $this->db->get('services')->result();
    }

    public function insert_service($data)
    {
        $this->db->insert('services', $data);
        return $this->db->insert_id();
    }


    public function get_service_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('services');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateService($data)
    {
        $name = $data['name'];
        $media = $data['media'];
        $icon = $data['icon'];
        $id = $data['id'];

        $data = array(
            'name' => $name,
            'media' => $media,
            'icon' => $icon
        );

        $this->db->where('id', $id);
        $this->db->update('services', $data);
    }
    // Service Model


    // Talent Model
    public function get_data_talent()
    {
        return $this->db->get('talents')->result();
    }
    public function insert_talent($data)
    {
        $this->db->insert('talents', $data);
        return $this->db->insert_id();
    }

    public function save_category_relation($data)
    {
        $this->db->insert('talent_has_category', $data);
    }

    public function save_service_relation($data)
    {
        $this->db->insert('talent_has_service', $data);
    }


    public function save_education_relation($data)
    {
        $this->db->insert('talent_has_education', $data);
    }

    public function get_talent_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('talents');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function get_category_by_id_talent($id)
    {
        $this->db->select('talents.*, GROUP_CONCAT(talent_has_category.id_category) AS category_ids, GROUP_CONCAT(talent_has_category.id_talent) AS talent_ids');
        $this->db->from('talents');
        $this->db->join('talent_has_category', 'talents.id = talent_has_category.id_talent', 'left');
        $this->db->where('talents.id', $id);
        $this->db->group_by('talents.id');
        $query = $this->db->get();
        return $query->row();
    }
    public function get_education_by_id_talent($id)
    {
        $this->db->select('talents.*, GROUP_CONCAT(talent_has_education.id_education) AS education_ids, GROUP_CONCAT(talent_has_education.id_talent) AS talent_ids');
        $this->db->from('talents');
        $this->db->join('talent_has_education', 'talents.id = talent_has_education.id_talent', 'left');
        $this->db->where('talents.id', $id);
        $this->db->group_by('talents.id');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_service_by_id_talent($id)
    {
        $this->db->select('talents.*, GROUP_CONCAT(talent_has_service.id_service) AS service_ids, GROUP_CONCAT(talent_has_service.id_talent) AS talent_ids');
        $this->db->from('talents');
        $this->db->join('talent_has_service', 'talents.id = talent_has_service.id_talent', 'left');
        $this->db->where('talents.id', $id);
        $this->db->group_by('talents.id');
        $query = $this->db->get();
        return $query->row();
    }
    public function delete_category_relation($id)
    {
        $this->db->where('id_talent', $id);
        $this->db->delete('talent_has_category');
    }
    public function delete_service_relation($id)
    {
        $this->db->where('id_talent', $id);
        $this->db->delete('talent_has_service');
    }
    public function delete_education_relation($id)
    {
        $this->db->where('id_talent', $id);
        $this->db->delete('talent_has_education');
    }
    public function updateTalent($id, $data)
    {
        $name = $data['name'];
        $quote = $data['quote'];
        $summary = $data['summary'];
        $nip = $data['nip'];
        $experience = $data['experience'];
        $video = $data['video'];
        $id = $data['id'];
        $this->db->where('id', $id);
        $talent = $this->db->get('talents')->row();
        $cover = $talent->cover;

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        //konfigurasi upload
        if ($this->upload->do_upload('cover')) {
            $data = array(
                'name' => $name,
                'quote' => $quote,
                'summary' => $summary,
                'nip' => $nip,
                'experience' => $experience,
                'video' => $video,
                'cover' => $this->upload->data('file_name')

            );
            $this->db->where('id', $id);
            $this->db->update('talents', $data);
        }
        // } else {
        //     $data = array(
        //         'name' => $name,
        //         'nip' => $nip,
        //         'summary' => $summary,
        //         'video' => $video,
        //         'experience' => $experience,
        //         'quote' => $quote,
        //         'cover' => $cover

        //     );
        //     $this->db->where('id', $id);
        //     $this->db->update('talents', $data);
        // }
    }
    // Talent Model

}