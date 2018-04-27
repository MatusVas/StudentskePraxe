<?php
defined('BASEPATH') OR exit('No direct script access allowed');


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
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
        $config['cur_tag_close'] = '</a>';
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
        $this->load->view('pracovny_den/index', $data);
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Den', 'Pracovný deň', 'required');
            $this->form_validation->set_rules('Hodinova_sadzba', 'Hodinová sadzba', 'required');
            $this->form_validation->set_rules('Pocet_hodin', 'Počet odrobených hodín', 'required');

            $postData = array(
                'Den' => $this->input->post('Den'),
                'Hodinova_sadzba' => $this->input->post('Hodinova_sadzba'),
                'Pocet_hodin' => $this->input->post('Pocet_hodin'),
                //'idPraxStudenta' => , //bude sem vstupovat ID, danej praxe studenta, ktore posielam do getrows
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
            $this->form_validation->set_rules('Den', 'Pracovný deň', 'required');
            $this->form_validation->set_rules('Hodinova_sadzba', 'Hodinová sadzba', 'required');
            $this->form_validation->set_rules('Pocet_hodin', 'Počet odrobených hodín', 'required');

            $postData = array(
                'Den' => $this->input->post('Den'),
                'Hodinova_sadzba' => $this->input->post('Hodinova_sadzba'),
                'Pocet_hodin' => $this->input->post('Pocet_hodin'),
                //'idPraxStudenta' => , //bude sem vstupovat ID, danej praxe studenta, ktore posielam do getrows
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