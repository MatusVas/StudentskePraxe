<?php

class Pracovny_den_model extends CI_Model
{
    public function __construct()
    {
    }

    function getRows($id)
    {
        if (!empty($id)) {
            $this->db->select('idPracovny_den,idPrax_studenta,Den,Hodinova_sadzba,Pocet_hodin,
            (Pocet_hodin*Hodinova_sadzba) as total');
            $query = $this->db->get_where('pracovny_den', array('idPracovny_den' => $id));
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

    public function fetch_data($idPraxStudenta,$limit,$start) {
        $this->db->limit($limit,$start);

        if (!empty($idPraxStudenta)) {
            $this->db->select('idPracovny_den,idPrax_studenta,Den,Hodinova_sadzba,Pocet_hodin,
            (Pocet_hodin*Hodinova_sadzba) as total');
            $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
            $query->row_array();
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count ($idPraxStudenta){
        return $this->db->where('idPrax_studenta', $idPraxStudenta)->count_all_results('pracovny_den');
    }

}