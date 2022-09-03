<?php
//php tidak perlu ditutup kalau isinya hanya php saja

function is_logged_in()
{
    $ci = get_instance(); // karerna helper tidka masuk pada mvc ci sehingga tidak bis amemenaggil library dari objek this kalau mau menggunakan get_isntace
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); //buat mendapatkan nama url di path

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    //query di abwah untuk mengecek akses did atabase
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    //atau bisa juga seperti di bawah ini
    // $ci->db->get_where('user_access_menu', [
    //     'role_id' => $role_id,
    //     'menu_id' => $menu_id
    // ]);
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function role()
{
    $ci = get_instance();

    $result = $ci->db->get_where('user_role', ['id' => $ci->session->userdata('role_id')]);
}
