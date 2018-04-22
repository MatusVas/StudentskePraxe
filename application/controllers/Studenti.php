<?php

class Studenti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Studenti_model');
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
        $data['studenti'] = $this->Studenti_model->getRows();
        $this->load->view('studenti/index', $data);
    }

    public function view($id)
    {
        $data = array();
        if (!empty($id)) {
            $data['studenti'] = $this->Studenti_model->getRows($id);
            $this->load->view('studenti/view', $data);
        } else {
            redirect('studenti');
        }
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Meno', 'Meno', 'required');
            $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
            $this->form_validation->set_rules('Rok_narodenia', 'Rok narodenia', 'required');
            $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
            $this->form_validation->set_rules('Mesto', 'Mesto', 'required');
            $this->form_validation->set_rules('Telefon', 'Telefón', 'required');
            $this->form_validation->set_rules('Email', 'E-mail', 'required');
            $this->form_validation->set_rules('idSkoly', 'Názov školy', 'required');

            $postData = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Rok_narodenia' => $this->input->post('Rok_narodenia'),
                'Adresa' => $this->input->post('Adresa'),
                'Mesto' => $this->input->post('Mesto'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
                'idSkoly' => $this->input->post('idSkoly'),);

            if ($this->form_validation->run() == true) {
                $insert = $this->Studenti_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Nový záznam bol úspešne pridaný.');
                    redirect('studenti');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }

        $data['skoly'] = $this->Studenti_model->get_skoly_dropdown();
        $data['skola_selected'] = '';
        $data['post'] = $postData;
        $data['action'] = 'Pridat';
        $this->load->view('studenti/add_edit', $data);
    }

    public function edit($id)
    {
        $data = array();
        $postData = $this->Studenti_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Meno', 'Meno', 'required');
            $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
            $this->form_validation->set_rules('Rok_narodenia', 'Rok narodenia', 'required');
            $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
            $this->form_validation->set_rules('Mesto', 'Mesto', 'required');
            $this->form_validation->set_rules('Telefon', 'Telefón', 'required');
            $this->form_validation->set_rules('Email', 'E-mail', 'required');
            $this->form_validation->set_rules('idSkoly', 'Názov školy', 'required');

            $postData = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Rok_narodenia' => $this->input->post('Rok_narodenia'),
                'Adresa' => $this->input->post('Adresa'),
                'Mesto' => $this->input->post('Mesto'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
                'idSkoly' => $this->input->post('idSkoly'),);

            if ($this->form_validation->run() == true) {
                $update = $this->Studenti_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('studenti');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['skoly'] = $this->Studenti_model->get_skoly_dropdown();
        $data['skola_selected'] = $postData['Nazov'];
        $data['post'] = $postData;
        $data['action'] = 'Edit';
        $this->load->view('studenti/add_edit', $data);
    }

    public function delete($id)
    {
        if ($id) {
            $delete = $this->Studenti_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne vymazaný.');
            } else {
                $this->session->set_userdata('error_msg', 'Vyskytol sa problém, skúste to znovu prosím.');
            }
        }
        redirect('studenti');
    }

}