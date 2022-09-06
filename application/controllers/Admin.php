<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $role = $this->session->userdata('role_id');
    }
    public function index()
    {
        $data['title'] = 'SELAMAT DATANG DI APLIKASI INVENTARIS SMP NEGERI 2 KAJORAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('role', $this->input->post('role'));
            $this->db->insert('user_role');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been changed</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id) //ini akan di kirim ke view
    {
        //intinya didalam method in ikita memerlukan dua hal role idnya berapa sama nampilkan semua menu dalam check box

        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array(); //hal yang pertama

        $this->db->where('id !=', 1); // ini berearti select * from user_menu (yang dibawah) where id tidak sama dengan satu
        $data['menu'] = $this->db->get('user_menu')->result_array(); //hal yang kedua

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id // buat ngecheck tadi
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
        //tidak di redirect karena sudah oleh javascript
    }

    public function editrole($id)
    {
        $this->db->where('id', $id);
        $this->db->set('role', $this->input->post('role'));
        $this->db->update('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been changed</div>');
        redirect('admin/role');
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been deleted</div>');
        redirect('admin/role');
    }
}
