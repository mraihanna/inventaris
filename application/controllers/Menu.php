<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array(); // nuat looping data di menu/index

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            //                nama tabel, isian tabelnya apa => ngambil dari mana
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function editmenu($id)
    {
        $this->db->set('menu', $this->input->post('menu'));
        $this->db->where('id', $id);
        $this->db->update('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been changed!</div>');
        redirect('menu');
    }

    public function deletemenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been deleted!</div>');
        redirect('menu');
    }


    public function submenu()
    {

        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu'); //pemanggilan ini bisa di dalam method atau di construct juga bisa
        //menu model itu adalah nama modelnanyatinya dan menu adalah aliasnua sehingga di dalama this-> menu bukan this->model_menu
        // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array(); //berpengarugh pada modal value menu_id
        //form validation
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->insert('user_sub_menu', $data); //untuk insert data
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function editsubmenu($id)
    {
        $data = [
            'menu_id'       => $this->input->post('menu_id'),
            'title'         => $this->input->post('title'),
            'url'           => $this->input->post('url'),
            'icon'          => $this->input->post('icon'),
            'is_active'     => $this->input->post('is_active')
        ];

        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been changed!</div>');
        redirect('menu/submenu');
    }

    public function deletesubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been deleted!</div>');
        redirect('menu/submenu');
    }
}
