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
  }
}
