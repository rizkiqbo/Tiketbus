<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "products";

    public $product_id;
    public $asal;
    public $tujuan;
    public $nomor;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            [
                'field' => 'asal',
                'label' => 'Asal',
                'rules' => 'required'
            ],

            [
                'field' => 'tujuan',
                'label' => 'Tujuan',
                'rules' => 'required'
            ],

            [
                'field' => 'nomor',
                'label' => 'Nomor',
                'rules' => 'numeric'
            ],

            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->asal = $post["asal"];
        $this->tujuan = $post["tujuan"];
        $this->nomor = $post["nomor"];
        $this->description = $post["description"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->asal = $post["asal"];
        $this->tujuan = $post["tujuan"];
        $this->nomor = $post["nomor"];
        $this->description = $post["description"];
        return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("product_id" => $id));
    }
}
