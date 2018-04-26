<?php

class Zodpovedne_osoby_model extends CI_Model
{
    public function __construct()
    {
    }

    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('zodpovedne_osoby.idZodpovedne_osoby,firmy.Nazov,zodpovedne_osoby.idFirmy,
            CONCAT(zodpovedne_osoby.Meno," ",zodpovedne_osoby.Priezvisko) as fullname, zodpovedne_osoby.Meno, 
            zodpovedne_osoby.Priezvisko, zodpovedne_osoby.Telefon, zodpovedne_osoby.Email')
                ->join('firmy','zodpovedne_osoby.idFirmy=firmy.idFirmy');
            $query = $this->db->get_where('zodpovedne_osoby', array('idZodpovedne_osoby' => $id));
            return $query->row_array();
        } else {
            $this->db->select('zodpovedne_osoby.idZodpovedne_osoby,firmy.Nazov,zodpovedne_osoby.idFirmy,
            CONCAT(zodpovedne_osoby.Meno," ",zodpovedne_osoby.Priezvisko) as fullname, zodpovedne_osoby.Meno, 
            zodpovedne_osoby.Priezvisko, zodpovedne_osoby.Telefon, zodpovedne_osoby.Email')
                ->join('firmy','zodpovedne_osoby.idFirmy=firmy.idFirmy');
            $query = $this->db->get('zodpovedne_osoby');
            return $query->result_array();
        }
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('zodpovedne_osoby', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('zodpovedne_osoby', $data, array('idZodpovedne_osoby' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('zodpovedne_osoby', array('idZodpovedne_osoby' => $id));
        return $delete ? true : false;
    }

    public function get_firma_dropdown($id = ""){
        $this->db->order_by('Nazov')
            ->select('idFirmy as id, Nazov')
            ->from('firmy');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->Nazov;
            }
            $dropdownlist[''] = 'Vyberte názov firmy.';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("zodpovedne_osoby");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("zodpovedne_osoby");
    }

    public function zodpovedne_osoby_count (){
        return $this->db->count_all("zodpovedne_osoby");
    }

}