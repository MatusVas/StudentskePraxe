<?php

class Prehlad_praxe_model extends CI_Model
{
    public function __construct()
    {
    }

    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('prax_studenta.idPrax_studenta,CONCAT(studenti.Meno," ",studenti.Priezvisko) as StudentName, 
            CONCAT(zodpovedne_osoby.Meno," ",zodpovedne_osoby.Priezvisko) as ZodpOsobaName,prax_studenta.Druh,prax_studenta.Zaciatok,
            prax_studenta.Koniec,prax_studenta.idStudenti,prax_studenta.idZodpovedne_osoby')
                ->join('studenti','prax_studenta.idStudenti=studenti.idStudenti')
                ->join('zodpovedne_osoby','prax_studenta.idZodpovedne_osoby=zodpovedne_osoby.idZodpovedne_osoby');
            $query = $this->db->get_where('prax_studenta', array('idPrax_studenta' => $id));
            return $query->row_array();
        } else {
            $this->db->select('prax_studenta.idPrax_studenta,CONCAT(studenti.Meno," ",studenti.Priezvisko) as StudentName, 
            CONCAT(zodpovedne_osoby.Meno," ",zodpovedne_osoby.Priezvisko) as ZodpOsobaName,prax_studenta.Druh,prax_studenta.Zaciatok,
            prax_studenta.Koniec,prax_studenta.idStudenti,prax_studenta.idZodpovedne_osoby')
                ->join('studenti','prax_studenta.idStudenti=studenti.idStudenti')
                ->join('zodpovedne_osoby','prax_studenta.idZodpovedne_osoby=zodpovedne_osoby.idZodpovedne_osoby');
            $query = $this->db->get('prax_studenta');
            return $query->result_array();
        }
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('prax_studenta', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('prax_studenta', $data, array('idPrax_studenta' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('prax_studenta', array('idPrax_studenta' => $id));
        return $delete ? true : false;
    }

    public function get_studenti_dropdown($id = ""){
        $this->db->order_by('Meno')
            ->select('idStudenti as id, CONCAT(Meno," ",Priezvisko) as FullnameStudent')
            ->from('studenti');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->FullnameStudent;
            }
            $dropdownlist[''] = 'Vyberte meno študenta.';
            return $dropdownlist;
        }
    }

    public function get_ZodpovedneOsoby_dropdown($id = ""){
        $this->db->order_by('Meno')
            ->select('idZodpovedne_osoby as id, CONCAT(Meno," ",Priezvisko) as FullnameOsoba')
            ->from('zodpovedne_osoby');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->FullnameOsoba;
            }
            $dropdownlist[''] = 'Vyberte meno zodpovednej osoby.';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('prax_studenta.idPrax_studenta,CONCAT(studenti.Meno," ",studenti.Priezvisko) as StudentName, 
            CONCAT(zodpovedne_osoby.Meno," ",zodpovedne_osoby.Priezvisko) as ZodpOsobaName,prax_studenta.Druh,prax_studenta.Zaciatok,
            prax_studenta.Koniec,prax_studenta.idStudenti,prax_studenta.idZodpovedne_osoby')
            ->join('studenti','prax_studenta.idStudenti=studenti.idStudenti')
            ->join('zodpovedne_osoby','prax_studenta.idZodpovedne_osoby=zodpovedne_osoby.idZodpovedne_osoby');
        $query = $this->db->get('prax_studenta');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("prax_studenta");
    }

}