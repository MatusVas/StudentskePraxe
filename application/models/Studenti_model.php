<?php

class Studenti_model extends CI_Model
{
    public function __construct()
    {
    }

    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('studenti.idStudenti, skoly.Nazov,studenti.idSkoly,
            CONCAT(studenti.Meno," ",studenti.Priezvisko) as fullname, studenti.Meno, studenti.Priezvisko,
            studenti.Rok_narodenia, studenti.Adresa, studenti.Mesto, studenti.Telefon, studenti.Email')
                ->join('skoly','studenti.idSkoly=skoly.idSkoly');
            $query = $this->db->get_where('studenti', array('idStudenti' => $id));
            return $query->row_array();
        } else {
            $this->db->select('studenti.idStudenti, skoly.Nazov,studenti.idSkoly,
            CONCAT(studenti.Meno," ",studenti.Priezvisko) as fullname, studenti.Meno, studenti.Priezvisko,
            studenti.Rok_narodenia, studenti.Adresa, studenti.Mesto, studenti.Telefon, studenti.Email')
                ->join('skoly','studenti.idSkoly=skoly.idSkoly');
            $query = $this->db->get('studenti');
            return $query->result_array();
        }
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('studenti', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('studenti', $data, array('idStudenti' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('studenti', array('idStudenti' => $id));
        return $delete ? true : false;
    }

    public function get_skoly_dropdown($id = ""){
        $this->db->order_by('idSkoly')
            ->select('idSkoly as id, Nazov')
            ->from('skoly');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->Nazov;
            }
            $dropdownlist[''] = 'Vyberte názov školy.';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('studenti.idStudenti, skoly.Nazov,studenti.idSkoly,
            CONCAT(studenti.Meno," ",studenti.Priezvisko) as fullname, studenti.Meno, studenti.Priezvisko,
            studenti.Rok_narodenia, studenti.Adresa, studenti.Mesto, studenti.Telefon, studenti.Email')
            ->join('skoly','studenti.idSkoly=skoly.idSkoly');
        $query = $this->db->get('studenti');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("studenti");
    }

    public function studenti_count (){
        return $this->db->count_all("studenti");
    }

}