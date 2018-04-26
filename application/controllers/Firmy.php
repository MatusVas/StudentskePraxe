<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Firmy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Firmy_model');
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
        $config['base_url'] = base_url() . 'index.php/firmy/index';
        $config['total_rows'] = $this->Firmy_model->record_count();
        $config['per_page'] = 1;
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
        $data['firmy'] = $this->Firmy_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $this->load->view('firmy/index', $data);
    }

    public function view($id)
    {
        $data = array();
        if (!empty($id)) {
            $data['firmy'] = $this->Firmy_model->getRows($id);
            $this->load->view('firmy/view', $data);
        } else {
            redirect('firmy');
        }
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Nazov', 'Názov firmy', 'required');
            $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
            $this->form_validation->set_rules('Mesto', 'Mesto', 'required');
            $this->form_validation->set_rules('Telefon', 'Telefón', 'required');
            $this->form_validation->set_rules('Email', 'E-Mail', 'required');

            $postData = array(
                'Nazov' => $this->input->post('Nazov'),
                'Adresa' => $this->input->post('Adresa'),
                'Mesto' => $this->input->post('Mesto'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
                );

            if ($this->form_validation->run() == true) {
                $insert = $this->Firmy_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Nový záznam bol úspešne pridaný.');
                    redirect('firmy');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['post'] = $postData;
        $data['action'] = 'Pridat';
        $this->load->view('firmy/add_edit', $data);
    }

    public function edit($id)
    {
        $data = array();
        $postData = $this->Firmy_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Nazov', 'Názov firmy', 'required');
            $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
            $this->form_validation->set_rules('Mesto', 'Mesto', 'required');
            $this->form_validation->set_rules('Telefon', 'Telefón', 'required');
            $this->form_validation->set_rules('Email', 'E-Mail', 'required');

            $postData = array(
                'Nazov' => $this->input->post('Nazov'),
                'Adresa' => $this->input->post('Adresa'),
                'Mesto' => $this->input->post('Mesto'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
            );

            if ($this->form_validation->run() == true) {
                $update = $this->Firmy_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('firmy');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['post'] = $postData;
        $data['action'] = 'Edit';
        $this->load->view('firmy/add_edit', $data);
    }

    public function delete($id)
    {
        if ($id) {
            $delete = $this->Firmy_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne vymazaný');
            } else {
                $this->session->set_userdata('error_msg', 'Vyskytol sa problém, skúste to znovu prosím.');
            }
        }
        redirect('firmy');
    }

}