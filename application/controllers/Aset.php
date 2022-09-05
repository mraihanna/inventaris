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

  public function kib_b()
  {
    $data['title']          = 'KIB B';
    $data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kib_b']          = $this->db->get('kib_b')->result_array();
    $data['kondisi']        = $this->db->get('kondisi')->result_array();
    $data['kategori']       = $this->db->get('kategori')->result_array();
    $data['ruangan']        = $this->db->get('ruangan')->result_array();
    $data['sumber_barang']  = $this->db->get('sumber_barang')->result_array();

    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('merk', 'Type atau Merk', 'required');
    $this->form_validation->set_rules('bahan', 'Bahan', 'required');
    $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'required');
    $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
    $this->form_validation->set_rules('tgl', 'Tanggal Pengadaan', 'required');
    $this->form_validation->set_rules('umur_ekonomis', 'Umur Ekonomis', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    $this->form_validation->set_rules('semua_barang', 'Semua Barang', 'required');
    $this->form_validation->set_rules('bahan', 'Bahan ', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('aset/kib-b', $data);
      $this->load->view('templates/footer');
    } else {
      $jumlah = $this->input->post('jumlah');
      for ($i = 0; $i < $jumlah; $i++) {

        $tgl = strtotime($this->input->post('tgl'));
        $tahun =  date('Y', $tgl);

        $count      = $this->db->get('kib_b')->num_rows();
        $count      = $count + 1;
        $id         = str_pad($count, 5, "0", STR_PAD_LEFT);
        $nomor_aset = 'KIB/B/12.01.10.15.08.01/69/' . $this->input->post('kategori') . '/' . $this->input->post('ruangan') . '/' . $tahun . '/' . $id;

        $sumber_barang = $this->db->get_where('sumber_barang', ['id' => $this->input->post('semua_barang')])->row_array();

        if ($this->input->post('kondisi') == 1) {
          $status_barang = "Deadstock/Tidak Bisa diperbaiki";
        } elseif ($this->input->post('kondisi') == 2) {
          $status_barang = "Bisa Diperbaiki/Direnovasi";
        } else {
          $status_barang = "-";
        }
        $data = [
          'id_kondisi'          => $this->input->post('kondisi'),
          'id_kategori'         => $this->input->post('kategori'),
          'id_ruangan'          => $this->input->post('ruangan'),
          'id_sumber_barang'    => $this->input->post('semua_barang'),
          'nomor_aset'          => $nomor_aset,
          'nama_barang'         => $this->input->post('nama_barang'),
          'merk'                => $this->input->post('merk'),
          'bahan'               => $this->input->post('bahan'),
          'tanggal_pengadaan'   => $this->input->post('tgl'),
          'tahun'               => $tahun,
          'umur_ekonomis'       => $this->input->post('umur_ekonomis'),
          'jumlah'              => $this->input->post('jumlah'),
          'harga'               => $this->input->post('harga'),
          'kode_sumber_barang'  => $sumber_barang['sumber_barang'] . '/' . $tahun,
          'status_barang'       => $status_barang
        ];

        $this->db->insert('kib_b', $data);

        // Penyusutan insert
        $nilai_residu = intval($this->input->post('harga')) / intval($this->input->post('umur_ekonomis'));
        $penyusutan   = (intval($this->input->post('harga')) - intval($nilai_residu)) / intval($this->input->post('umur_ekonomis'));

        $tahunSekarang  = date('Y');
        $pemakaian  =  $tahunSekarang - $tahun;

        $dataPenyusutan = [
          'nomor_aset'  => $nomor_aset,
          'nama_aset'   => $this->input->post('nama_barang'),
          'penyusutan'  => $penyusutan,
          'pemakaian'   => $pemakaian,
          'residu'      => $nilai_residu,
          'aset'        => "B"
        ];

        $this->db->insert('penyusutan', $dataPenyusutan);
      }
      // die;
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kib B Has been added!</div>');
      redirect('aset/kib_b');
    }
  }

  public function editkib_b($id)
  {
    $kibb = $this->db->get_where('kib_b', ['id' => $id])->row_array();
    $nomor_aset = $kibb['nomor_aset'];
    $ruanganOld = '/' . $kibb['id_ruangan'] . '/';
    $ruanganNew = '/' . $this->input->post('ruangan') . '/';

    $nomor_aset = str_replace("$ruanganOld", "$ruanganNew", "$nomor_aset");

    if ($this->input->post('kondisi') == 1) {
      $status_barang = "Deadstock/Tidak Bisa diperbaiki";
    } elseif ($this->input->post('kondisi') == 2) {
      $status_barang = "Bisa Diperbaiki/Direnovasi";
    } else {
      $status_barang = "-";
    }

    $data = [
      'nomor_aset'        => $nomor_aset,
      'id_kondisi'        => $this->input->post('kondisi'),
      'id_ruangan'        => $this->input->post('ruangan'),
      'status_barang'     => $status_barang
    ];

    $this->db->where('id', $id);
    $this->db->update('kib_b', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">KIB A has been changed!</div>');
    redirect('aset/kib_b');
  }
  public function kib_c()
  {
    $data['title']          = 'KIB C';
    $data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kib_c']          = $this->db->get('kib_c')->result_array();
    $data['kondisi']        = $this->db->get('kondisi')->result_array();

    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
    $this->form_validation->set_rules('luas', 'Luas', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    $this->form_validation->set_rules('umur_ekonomis', 'Umur Ekonomis', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('aset/kib-c', $data);
      $this->load->view('templates/footer');
    } else {

      $count      = $this->db->get('kib_c')->num_rows();
      $count      = $count + 1;
      $id         = str_pad($count, 5, "0", STR_PAD_LEFT);
      $nomor_aset = 'KIB/C/12.01.10.15.08.01/69/' . $this->input->post('tahun') . '/'  . $id;

      if ($this->input->post('kondisi') == 1) {
        $status_barang = "Perlu Renovasi Besar";
      } elseif ($this->input->post('kondisi') == 2) {
        $status_barang = "Perlu Perbaikan Ringan";
      } else {
        $status_barang = "-";
      }
      $data = [
        'id_kondisi'          => $this->input->post('kondisi'),
        'nomor_aset'          => $nomor_aset,
        'nama_barang'         => $this->input->post('nama_barang'),
        'luas'                => $this->input->post('luas'),
        'lokasi'              => $this->input->post('lokasi'),
        'tahun'               => $this->input->post('tahun'),
        'harga'               => $this->input->post('harga'),
        'umur_ekonomis'       => $this->input->post('umur_ekonomis'),
        'status_barang'       => $status_barang
      ];

      $this->db->insert('kib_c', $data);

      $nilai_residu = intval($this->input->post('harga')) / intval($this->input->post('umur_ekonomis'));
      $penyusutan   = (intval($this->input->post('harga')) - intval($nilai_residu)) / intval($this->input->post('umur_ekonomis'));

      $tahunSekarang  = date('Y');
      $pemakaian  =  $tahunSekarang - $this->input->post('tahun');;

      $dataPenyusutan = [
        'nomor_aset'  => $nomor_aset,
        'nama_aset'   => $this->input->post('nama_barang'),
        'penyusutan'  => $penyusutan,
        'residu'      => $nilai_residu,
        'pemakaian'   => $pemakaian,
        'aset'        => "C"
      ];

      $this->db->insert('penyusutan', $dataPenyusutan);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">KIB C Has been added!</div>');
      redirect('aset/kib_c');
    }
  }

  public function editkib_c($id)
  {
    if ($this->input->post('kondisi') == 1) {
      $status_barang = "Perlu Renovasi Besar";
    } elseif ($this->input->post('kondisi') == 2) {
      $status_barang = "Perlu Perbaikan Ringan";
    } else {
      $status_barang = "-";
    }

    $kibC = $this->db->get_where('kib_c', ['id' => $id])->row_array();
    $nomorAsetOld = $kibC['nomor_aset'];
    $tahunOld = $kibC['tahun'];
    $tahunNew = $this->input->post('tahun');
    $nomor_aset = str_replace("$tahunOld", "$tahunNew", "$nomorAsetOld");

    $data = [
      'nomor_aset'        => $nomor_aset,
      'tahun'             => $this->input->post('tahun'),
      'id_kondisi'        => $this->input->post('kondisi'),
      'luas'              => $this->input->post('luas'),
      'harga'             => $this->input->post('harga'),
      'status_barang'     => $status_barang
    ];

    $this->db->where('id', $id);
    $this->db->update('kib_c', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">KIB B has been changed!</div>');
    redirect('aset/kib_c');
  }
}
