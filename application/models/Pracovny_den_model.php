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

    public function getJanuary($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthJanuary')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','1');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthJanuary = $row->totalMonthJanuary;
        }
        return $totalMonthJanuary;
    }

    public function getFebruary($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthFebruary')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','2');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthFebruary = $row->totalMonthFebruary;
        }
        return $totalMonthFebruary;
    }

    public function getMarch($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthMarch')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','3');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthMarch = $row->totalMonthMarch;
        }
        return $totalMonthMarch;
    }

    public function getApril($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthApril')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','4');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthApril = $row->totalMonthApril;
        }
        return $totalMonthApril;
    }

    public function getMay($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthMay')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','5');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthMay = $row->totalMonthMay;
        }
        return $totalMonthMay;
    }

    public function getJune($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthJune')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','6');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthJune = $row->totalMonthJune;
        }
        return $totalMonthJune;
    }

    public function getJuly($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthJuly')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','7');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthJuly = $row->totalMonthJuly;
        }
        return $totalMonthJuly;
    }

    public function getAugust($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthAugust')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','8');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthAugust = $row->totalMonthAugust;
        }
        return $totalMonthAugust;
    }

    public function getSeptember($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthSeptember')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','9');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthSeptember = $row->totalMonthSeptember;
        }
        return $totalMonthSeptember;
    }

    public function getOctober($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthOctober')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','10');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthOctober = $row->totalMonthOctober;
        }
        return $totalMonthOctober;
    }

    public function getNovember($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthNovember')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','11');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthNovember = $row->totalMonthNovember;
        }
        return $totalMonthNovember;
    }

    public function getDecember($idPraxStudenta){
        $this->db->select('SUM(Hodinova_sadzba*Pocet_hodin) AS totalMonthDecember')
            ->where('YEAR(Den)','2018')
            ->where('MONTH(Den)','12');
        $query = $this->db->get_where('pracovny_den', array('idPrax_studenta' => $idPraxStudenta));
        foreach ($query->result() as $row)
        {
            $totalMonthDecember = $row->totalMonthDecember;
        }
        return $totalMonthDecember;
    }

}