<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyusutan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = "Penyusutan";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['monitoring'] = $this->db->get('monitoring')->result_array();
    $queryKibB = "SELECT a.*, b.tahun, b.harga, b.umur_ekonomis FROM penyusutan a JOIN kib_b b ON a.nomor_aset = b.nomor_aset ";
    $data['kib_b'] = $this->db->query($queryKibB)->result_array();
    $queryKibC = "SELECT a.*, b.tahun, b.harga, b.umur_ekonomis FROM penyusutan a JOIN kib_c b ON a.nomor_aset = b.nomor_aset ";
    $data['kib_c'] = $this->db->query($queryKibC)->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('penyusutan/index', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['title'] = "Penyusutan";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['penyusutan'] = $this->db->get_where('penyusutan', ['id' => $id])->row_array();
    $queryKibB = "SELECT a.*, b.tahun, b.harga, b.umur_ekonomis FROM penyusutan a JOIN kib_b b ON a.nomor_aset = b.nomor_aset ";
    $data['kib_b'] = $this->db->query($queryKibB)->result_array();
    $queryKibC = "SELECT a.*, b.tahun, b.harga, b.umur_ekonomis FROM penyusutan a JOIN kib_c b ON a.nomor_aset = b.nomor_aset ";
    $data['kib_c'] = $this->db->query($queryKibC)->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('penyusutan/index', $data);
    $this->load->view('templates/footer');
  }
}
