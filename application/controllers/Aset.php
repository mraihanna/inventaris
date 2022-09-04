<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function kib_a()
  {
    $data['title'] = 'KIB A';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kib_a'] = $this->db->get('kib_a')->result_array();

    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('luas', 'Luas', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[20]');
    $this->form_validation->set_rules('nomor_sertifikat', 'Nomor Sertifikat', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('aset/kib-a', $data);
      $this->load->view('templates/footer');
    } else {
      $count      = $this->db->get('kib_a')->num_rows();
      $count      = $count + 1;
      $id         = str_pad($count, 5, "0", STR_PAD_LEFT);
      $nomor_aset = 'KIB/A/12.01.10.15.08.01/69/' . $this->input->post('tahun') . '/' . $id;

      $data = [
        'nomor_aset'        => $nomor_aset,
        'nama_barang'       => $this->input->post('nama_barang'),
        'luas'              => $this->input->post('luas'),
        'tahun'             => $this->input->post('tahun'),
        'nomor_sertifikat'  => $this->input->post('nomor_sertifikat'),
        'harga'             => $this->input->post('harga'),
      ];

      $this->db->insert('kib_a', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kib A Has been added!</div>');
      redirect('aset/kib_a');
    }
  }

  public function editkib_a($id)
  {
    $kibA = $this->db->get_where('kib_a', ['id' => $id])->row_array();
    $nomorAsetOld = $kibA['nomor_aset'];
    $tahunOld = $kibA['tahun'];
    $tahunNew = $this->input->post('tahun');
    $nomor_aset = str_replace("$tahunOld", "$tahunNew", "$nomorAsetOld");

    $data = [
      'nomor_aset'        => $nomor_aset,
      'nama_barang'       => $this->input->post('nama_barang'),
      'luas'              => $this->input->post('luas'),
      'tahun'             => $this->input->post('tahun'),
      'nomor_sertifikat'  => $this->input->post('nomor_sertifikat'),
      'harga'             => $this->input->post('harga'),
    ];

    $this->db->where('id', $id);
    $this->db->update('kib_a', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">KIB A has been changed!</div>');
    redirect('aset/kib_a');
  }
}
