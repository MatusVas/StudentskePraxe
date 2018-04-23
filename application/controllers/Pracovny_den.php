<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 23.4.2018
 * Time: 10:07
 */

class Pracovny_den extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Pracovny_den_model');
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
        $config["base_url"] = base_url() . "index.php/pracovny_den/index";
        $config["total_rows"] = $this->Pracovny_den_model->record_count();
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;
        //$config['use_page_numbers'] = TRUE;
        //$config['num_links'] = $this->Temperatures_model->record_count();
        $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
            $page = 0;
        }
        $data["pracovny_den"] = $this->Pracovny_den_model->fetch_data($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $data['pracovny_den'] = $this->Pracovny_den_model->getRows();
        $this->load->view('pracovny_den/index', $data);
    }

    public function view($id)
    {
        $data = array();
        if (!empty($id)) {
            $data['pracovny_den'] = $this->Pracovny_den_model->getRows($id);
            $this->load->view('pracovny_den/view', $data);
        } else {
            redirect('pracovny_den');
        }
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Den', 'Deň výkonu práce', 'required');
            $this->form_validation->set_rules('Hodinova_sadzba', 'Hodinová sadzba', 'required');
            $this->form_validation->set_rules('Pocet_hodin', 'Počet odrobených hodín', 'required');

            $postData = array(
                'Den' => $this->input->post('Den'),
                'Hodinova_sadzba' => $this->input->post('Hodinova_sadzba'),
                'Pocet_hodin' => $this->input->post('Pocet_hodin'),
                'idPraxStudenta' => , //bude sem vstupovat ID, danej praxe studenta, ktore posielam do getrows
            );

            if ($this->form_validation->run() == true) {
                $insert = $this->Pracovny_den_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Nový záznam bol úspešne pridaný.');
                    redirect('pracovny_den');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['post'] = $postData;
        $data['action'] = 'Pridat';
        $this->load->view('pracovny_den/add_edit', $data);
    }

    public function edit($id)
    {
        $data = array();
        $postData = $this->Pracovny_den_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Nazov', 'Názov školy', 'required');
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
                $update = $this->Pracovny_den_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('pracovny_den');
                } else {
                    $data['error_msg'] = 'Vyskytol sa problém, skúste to znovu prosím.';
                }
            }
        }
        $data['post'] = $postData;
        $data['action'] = 'Edit';
        $this->load->view('pracovny_den/add_edit', $data);
    }

    public function delete($id)
    {
        if ($id) {
            $delete = $this->Pracovny_den_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne vymazaný');
            } else {
                $this->session->set_userdata('error_msg', 'Vyskytol sa problém, skúste to znovu prosím.');
            }
        }
        redirect('pracovny_den');
    }

}