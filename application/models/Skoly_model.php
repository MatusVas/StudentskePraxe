<?php

class Skoly_model extends CI_Model{

    public function __construct()
    {
    }

    function getRows($id = "")
    {
        if (!empty($id)) {
            $query = $this->db->
            get_where('skoly', array('idSkoly' => $id));
            return $query->row_array();
        } else {
            $query = $this->db->get('skoly');
            return $query->result_array();
        }
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('skoly', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('skoly', $data, array('idSkoly' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('skoly', array('idSkoly' => $id));
        return $delete ? true : false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("skoly");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("skoly");
    }

}