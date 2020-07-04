<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pendaftar_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pendaftar"] = $this->pendaftar_model->getAll();
        $this->load->view("admin/pendaftar/list", $data);
    }

    public function add()
    {
        $pendaftar = $this->pendaftar_model;
        $validation = $this->form_validation;
        $validation->set_rules($pendaftar->rules());

        if ($validation->run()) {
            $pendaftar->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pendaftar/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pendaftar');

        $pendaftar = $this->pendaftar_model;
        $validation = $this->form_validation;
        $validation->set_rules($pendaftar->rules());

        if ($validation->run()) {
            $pendaftar->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pendaftar"] = $pendaftar->getById($id);
        if (!$data["pendaftar"]) show_404();

        $this->load->view("admin/pendaftar/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->pendaftar_model->delete($id)) {
            redirect(site_url('admin/pendaftar'));
        }
    }
}
