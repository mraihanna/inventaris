<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function kondisi()
  {
    $data['title'] = 'Kondisi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['kondisi'] = $this->db->get('kondisi')->result_array();

    $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('setup/kondisi', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->set('kondisi', $this->input->post('kondisi'));
      $this->db->insert('kondisi');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New kondisi added!</div>');
      redirect('setup/kondisi');
    }
  }

  public function editkondisi($id)
  {
    $this->db->where('id', $id);
    $this->db->set('kondisi', $this->input->post('kondisi'));
    $this->db->update('kondisi');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New kondisi has been changed!</div>');
    redirect('setup/kondisi');
  }

  public function deletekondisi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kondisi');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kondisi has been deleted!</div>');
    redirect('setup/kondisi');
  }

  public function kategori()
  {
    $data['title'] = 'Kategori';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['kategori'] = $this->db->get('kategori')->result_array();

    $this->form_validation->set_rules('kategori', 'kategori', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('setup/kategori', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->set('kategori', $this->input->post('kategori'));
      $this->db->insert('kategori');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New kategori added!</div>');
      redirect('setup/kategori');
    }
  }

  public function editkategori($id)
  {
    $this->db->where('id', $id);
    $this->db->set('kategori', $this->input->post('kategori'));
    $this->db->update('kategori');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New kategori changed!</div>');
    redirect('setup/kategori');
  }

  public function deletekategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori has been deleted.</div>');
    redirect('setup/kategori');
  }
  public function ruangan()
  {
    $data['title'] = 'Ruangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['ruangan'] = $this->db->get('ruangan')->result_array();

    $this->form_validation->set_rules('ruangan', 'ruangan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('setup/ruangan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->set('ruangan', $this->input->post('ruangan'));
      $this->db->insert('ruangan');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New ruangan added!</div>');
      redirect('setup/ruangan');
    }
  }

  public function editruangan($id)
  {
    $this->db->where('id', $id);
    $this->db->set('ruangan', $this->input->post('ruangan'));
    $this->db->update('ruangan');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New ruangan changed!</div>');
    redirect('setup/ruangan');
  }

  public function deleteruangan($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('ruangan');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan has been deleted.</div>');
    redirect('setup/ruangan');
  }

  public function sumber_barang()
  {
    $data['title'] = 'Sumber Barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['sumber_barang'] = $this->db->get('sumber_barang')->result_array();

    $this->form_validation->set_rules('sumber_barang', 'Sumber Barang', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('setup/sumber_barang', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->set('sumber_barang', $this->input->post('sumber_barang'));
      $this->db->insert('sumber_barang');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sumber Barang added!</div>');
      redirect('setup/sumber_barang');
    }
  }

  public function editsumberbarang($id)
  {
    $this->db->where('id', $id);
    $this->db->set('sumber_barang', $this->input->post('sumber_barang'));
    $this->db->update('sumber_barang');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sumber Barang changed!</div>');
    redirect('setup/sumber_barang');
  }

  public function deletesumberbarang($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('sumber_barang');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sumber Barang has been deleted!</div>');
    redirect('setup/sumber_barang');
  }
}
