<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = "Monitoring";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['monitoring'] = $this->db->get('monitoring')->result_array();
    $queryKibB = "SELECT * FROM `kib_b` WHERE status_barang != '-'";
    $data['kib_b'] = $this->db->query($queryKibB)->result_array();
    $queryKibC = "SELECT * FROM `kib_c` WHERE status_barang != '-'";
    $data['kib_c'] = $this->db->query($queryKibC)->result_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('monitoring/index', $data);
    $this->load->view('templates/footer');
  }
}
