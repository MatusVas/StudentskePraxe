<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Zodpovedne_osoby extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Zodpovedne_osoby_model');
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
        $config['base_url'] = base_url() . 'index.php/zodpovedne_osoby/index';
        $config['total_rows'] = $this->Zodpovedne_osoby_model->record_count();
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
        $data['zodpovedne_osoby'] = $this->Zodpovedne_osoby_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $this->load->view('zodpovedne_osoby/index', $data);
    }

    public function view($id)
    {
        $data = array();
        if (!empty($id)) {
            $data['zodpovedne_osoby'] = $this->Zodpovedne_osoby_model->getRows($id);
            $this->load->view('zodpovedne_osoby/view', $data);
        } else {
            redirect('zdopovedne_osoby');
        }
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Meno', 'Meno', 'required');
            $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
            $this->form_validation->set_rules('Telefon', 'Telefónne číslo', 'required');
            $this->form_validation->set_rules('Email', 'E-mail', 'required');
            $this->form_validation->set_rules('idFirmy', 'Názov firmy', 'required');

            $postData = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
                'idFirmy' => $this->input->post('idFirmy'),);

            if ($this->form_validation->run() == true) {
                $insert = $this->Zodpovedne_osoby_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Nový záznam bol úspešne pridaný.');
                    redirect('zodpovedne_osoby');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }

        $data['firmy'] = $this->Zodpovedne_osoby_model->get_firma_dropdown();
        $data['firma_selected'] = '';
        $data['post'] = $postData;
        $data['action'] = 'Pridat';
        $this->load->view('zodpovedne_osoby/add_edit', $data);
    }

    public function edit($id)
    {
        $data = array();
        $postData = $this->Zodpovedne_osoby_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Meno', 'Meno', 'required');
            $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
            $this->form_validation->set_rules('Telefon', 'Telefónne číslo', 'required');
            $this->form_validation->set_rules('Email', 'E-mail', 'required');
            $this->form_validation->set_rules('idFirmy', 'Názov firmy', 'required');

            $postData = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
                'idFirmy' => $this->input->post('idFirmy'),);

            if ($this->form_validation->run() == true) {
                $update = $this->Zodpovedne_osoby_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('zodpovedne_osoby');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['firmy'] = $this->Zodpovedne_osoby_model->get_firma_dropdown();
        $data['firma_selected'] = $postData['idFirmy'];
        $data['post'] = $postData;
        $data['action'] = 'Edit';
        $this->load->view('zodpovedne_osoby/add_edit', $data);
    }

    public function delete($id)
    {
        if ($id) {
            $delete = $this->Zodpovedne_osoby_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne vymazaný.');
            } else {
                $this->session->set_userdata('error_msg', 'Vyskytol sa problém, skúste to znovu prosím.');
            }
        }
        redirect('zodpovedne_osoby');
    }

}