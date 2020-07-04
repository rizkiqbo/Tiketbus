<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $nama;
    public $alamat;
    public $telp;
    public $tujuan;
    public $jumlah;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'telp',
                'label' => 'Telp',
                'rules' => 'required'
            ],

            [
                'field' => 'tujuan',
                'label' => 'Tujuan',
                'rules' => 'required'
            ],

            [
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'numeric'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pendaftar_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->pendaftar_id = uniqid();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->tujuan = $post["tujuan"];
        $this->jumlah = $post["jumlah"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->pendaftar_id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->tujuan = $post["tujuan"];
        $this->jumlah = $post["jumlah"];
        return $this->db->update($this->_table, $this, array('pendaftar_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("pendaftar_id" => $id));
    }
}
