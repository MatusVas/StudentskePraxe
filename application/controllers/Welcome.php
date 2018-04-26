<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Firmy_model');
        $this->load->model('Zodpovedne_osoby_model');
        $this->load->model('Skoly_model');
        $this->load->model('Studenti_model');
    }

    public function index()
    {
        $data = array();
        $data['firmy_count'] = $this->Firmy_model->firmy_count();
        $data['zodpovedne_osoby_count'] = $this->Zodpovedne_osoby_model->zodpovedne_osoby_count();
        $data['skoly_count'] = $this->Skoly_model->skoly_count();
        $data['studenti_count'] = $this->Studenti_model->studenti_count();
        $this->load->view('index', $data);
    }

}