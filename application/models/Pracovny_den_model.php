<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 23.4.2018
 * Time: 10:06
 */

class Pracovny_den_model extends CI_Model
{
    public function __construct()
    {
    }

    function getRows($id)
    {
        if (!empty($id)) {
            $query = $this->db->
            get_where('pracovny_den', array('idPracovny_den' => $id));
            return $query->row_array();
        }
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('pracovny_den', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('pracovny_den', $data, array('idPracovny_den' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('pracovny_den', array('idPracovny_den' => $id));
        return $delete ? true : false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("pracovny_den");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("pracovny_den");
    }

}