<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Prehlad_praxe extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Prehlad_praxe_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data = array();
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $config['base_url'] = base_url() . 'index.php/prehlad_praxe/index';
        $config['total_rows'] = $this->Prehlad_praxe_model->record_count();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3));
        }
        else{
            $page = 0;
        }
        $data['prehlad_praxe'] = $this->Prehlad_praxe_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $this->load->view('prehlad_praxe/index', $data);
    }

    public function view($id)
    {
        $data = array();
        if (!empty($id)) {
            $data['prehlad_praxe'] = $this->Prehlad_praxe_model->getRows($id);
            $this->load->view('prehlad_praxe/view', $data);
        } else {
            redirect('prehlad_praxe');
        }
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Druh', 'Druh praxe', 'required');
            $this->form_validation->set_rules('Zaciatok', 'Začiatok praxe', 'required');
            $this->form_validation->set_rules('Koniec', 'Koniec praxe', 'required');
            $this->form_validation->set_rules('idStudenti', 'Študent', 'required');
            $this->form_validation->set_rules('idZodpovedne_osoby', 'Zodpovedná osoba', 'required');

            $postData = array(
                'Druh' => $this->input->post('Druh'),
                'Zaciatok' => $this->input->post('Zaciatok'),
                'Koniec' => $this->input->post('Koniec'),
                'idStudenti' => $this->input->post('idStudenti'),
                'idZodpovedne_osoby' => $this->input->post('idZodpovedne_osoby'),);

            if ($this->form_validation->run() == true) {
                $insert = $this->Prehlad_praxe_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Nový záznam bol úspešne pridaný.');
                    redirect('prehlad_praxe');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }

        $data['studenti'] = $this->Prehlad_praxe_model->get_studenti_dropdown();
        $data['studenti_selected'] = '';
        $data['zodpovedne_osoby'] = $this->Prehlad_praxe_model->get_ZodpovedneOsoby_dropdown();
        $data['zodpovedne_osoby_selected'] = '';
        $data['post'] = $postData;
        $data['action'] = 'Pridat';
        $this->load->view('prehlad_praxe/add_edit', $data);
    }

    public function edit($id)
    {
        $data = array();
        $postData = $this->Prehlad_praxe_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Druh', 'Druh praxe', 'required');
            $this->form_validation->set_rules('Zaciatok', 'Začiatok praxe', 'required');
            $this->form_validation->set_rules('Koniec', 'Koniec praxe', 'required');
            $this->form_validation->set_rules('idStudenti', 'Študent', 'required');
            $this->form_validation->set_rules('idZodpovedne_osoby', 'Zodpovedná osoba', 'required');

            $postData = array(
                'Druh' => $this->input->post('Druh'),
                'Zaciatok' => $this->input->post('Zaciatok'),
                'Koniec' => $this->input->post('Koniec'),
                'idStudenti' => $this->input->post('idStudenti'),
                'idZodpovedne_osoby' => $this->input->post('idZodpovedne_osoby'),);

            if ($this->form_validation->run() == true) {
                $update = $this->Prehlad_praxe_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('prehlad_praxe');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['studenti'] = $this->Prehlad_praxe_model->get_studenti_dropdown();
        $data['studenti_selected'] = $postData['idStudenti'];
        $data['zodpovedne_osoby'] = $this->Prehlad_praxe_model->get_ZodpovedneOsoby_dropdown();
        $data['zodpovedne_osoby_selected'] = $postData['idZodpovedne_osoby'];
        $data['post'] = $postData;
        $data['action'] = 'Edit';
        $this->load->view('prehlad_praxe/add_edit', $data);
    }

    public function delete($id)
    {
        if ($id) {
            $delete = $this->Prehlad_praxe_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne vymazaný.');
            } else {
                $this->session->set_userdata('error_msg', 'Vyskytol sa problém, skúste to znovu prosím.');
            }
        }
        redirect('prehlad_praxe');
    }

}