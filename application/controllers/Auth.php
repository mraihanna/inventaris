<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login(); //kita buat method baru yang bernamalogin; sandhika galih kalau methodnya private suka dibedakan menjadi ada garis bawah di depanya
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya active
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                    redirect('user'); //inin nanti muncul di path, jadi lebih bagus kalau kecil
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('name', 'Name', 'required|trim'); //trim untuk menghilangkan spasi di sebelum dan sesudah pengisian namanya
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]); // baca dokumentasinya
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont Match!',
            'min_length' => 'Password too short!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) { //if disini jiklau user menekan button submit akan dikirim kembali ke tampilan awal
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)), //true itu untuk htmchair
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), //password_deault itu akan dicarikan yg terbaik oleh phpnya
                'role_id' => 2, //dua karena member
                'is_active' => 0, //1 karena active, 0 ga aktif
                'date_created' => time(),
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32)); //sebuah bilangan random yang hanya di ketahui oleh mesin untuk dikirimkan ke email
            $user_token = [
                'email' => $this->input->post('email', true),
                'token' => $token,
                'date_created' => time(), //kalau mau membuat si tokennya expired
            ];
            $this->db->insert('user', $data); //input data dalam database pake CI, kalau mau nyoba ngirim email lebih baik di matikan terlebih dahulu
            $this->db->insert('user_token', $user_token); //kirim email
            $this->_sendEmail($token, 'verify'); //fiturnya buat apa ada buat aktivasi sama forogto pasword

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please Activate Your Account</div>');
            redirect('auth'); // di kirimkan ke login kalau berhasil
        }
    }

    private function _sendEmail($token, $type) //parameter token karena ingin mengirim ke email ada tokenya | yang type itu type nya apa verify atau forgot password
    {
        //cari aja dokumentasi ada di doc ci
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'inventarisbarangsmpn2kjr@gmail.com',
            'smtp_pass' => 'zpwunpdicywysyme',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('inventarisbarangsmpn2kjr@gmail.com', 'Admin Inventaris SMPN 2 Kajoran'); // asmin sipma itu nama pengirimnya
        $this->email->to($this->input->post('email'));
        //kalau mau nambah send email disni 
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            // $this->email->message('Hello ' . $name . ' Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Active</a> '); //bisa di rapihkan menggunakan tag html
            $user = $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array();
            $name = $user['name'];
            $message = '    
            <center>
            <table>
                <tr>
                    <th>
                        <div  style="font-weight: 700; margin-bottom: 20px; font-size: 30px; text-align: center;">Aplikasi Inventaris SMPN 2 Kajoran</div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <div  style="margin-bottom: 20px; font-weight: 100;text-align: center;">
                            Welcome <b>' . $name . '</b> to APEM
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div  style="margin-bottom: 40px; text-align: center; line-height: 30px; ">
                            Please click link below to verify your email address. <br>
                            Your password is <a style="color: blue;">123</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="button">
                            <center>
                            <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color: #328BD5; color: white; padding: 15px; border: none; border-radius: 10px; font-family:\'Montserrat\', \'Arial Narrow\', Arial, sans-serif; text-decoration: none; text-align: center;">Verify Email</a>
                            </center>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div  style="margin-top: 50px; text-align: center;">
                            After Login, please change your password!.
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div  style="margin-top: 40px;text-align: center;">
                            The link is valid for 24 hours.
                            <hr>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div  style="font-size: 10px; font-weight: 100;text-align: center;">
                            © Aplikasi Inventaris SMPN 2 Kajoran
                        </div>
                    </td>
                </tr>
            </table>
            </center>';

            $this->email->message($message);
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Reset Password</a> '); //bisa di rapihkan menggunakan tag html
        }
        if ($this->email->send()) {
            return true;  //kalau berhasil di kirim emailnya maka akan return true boolean
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        //yang akan melakukan verifikasi dari link yang tadi dipencet apakah bener ga tokenya, kalau iya bisa di ganti jadi aktifnya 1 tidak 0
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) { //unutk expired
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please Login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token Expired.</div>');
                    redirect('auth');
                }
            } else {
                // echo $token;
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Invalid token</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Not identify email</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email'); //hapus session
        $this->session->unset_userdata('role_id'); //hapus session

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        } else {
            // jika ada role_id yg lain maka tambahkan disini
        }
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user  = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated</div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) { //unutk expired
                    $this->session->set_userdata('reset_email', $email); //session ini hanya untuk mereset email saja, kalau udah beres hapus sessionnya $email
                    //halaman ini akan muncul ketika reset pasword
                    $this->changePassword();
                } else {
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Token Expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth/');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth/');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Passsword', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Passsword', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email    = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            //hapus user tokennya
            $this->db->delete('user_token', ['email' => $email]);

            //hapus sessionnya
            $this->session->unset_userdata('reset_email');

            //kirim message ke auth(halaman login)
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed. Please login.</div>');
            redirect('auth/');
        }
    }

    public function nyoba()
    {
        //cari aja dokumentasi ada di doc ci
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'inventarisbarangsmpn2kjr@gmail.com',
            'smtp_pass' => 'zpwunpdicywysyme',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",

        ];
        $message = '    <center>
        <table>
            <tr>
                <th>
                        <div  style="font-weight: 700; margin-bottom: 20px; font-size: 30px; text-align: center;">Aplikasi Inventaris SMPN 2 Kajoran</div>
                </th>
            </tr>
            <tr>
                <td>
                    <div  style="margin-bottom: 20px; font-weight: 100;text-align: center;">
                        Welcome <b>PIC</b> to APEM
                    </div>
                </td>
            </tr>
            <tr><td><div  style="margin-bottom: 40px; text-align: center; line-height: 30px; ">
                Please click link below to verify your email address. <br>
                Your password is <a style="color: blue;">123</a>
            </div></td></tr>
            <tr><td><div class="button">
                <center>
                    <a href="#" style="background-color: #328BD5; color: white; padding: 15px; border: none; border-radius: 10px; font-family:\'Montserrat\', \'Arial Narrow\', Arial, sans-serif; text-decoration: none; text-align: center;">Verify Email</a>
                </center>
            </div></td></tr>
            <tr><td><div  style="margin-top: 50px; text-align: center;">
                After Login, please change your password!.
            </div></td></tr>
            <tr><td><div  style="margin-top: 40px;text-align: center;">
                The link is valid for 24 hours.
                <hr>
            </div></td></tr>
            <tr><td><div  style="font-size: 10px; font-weight: 100;text-align: center;">
                © Aplikasi Inventaris SMPN 2 Kajoran
            </div></td></tr>
    </table>
    </center>';

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('inventarisbarangsmpn2kjr@gmail.com', 'Admin Inventaris SMPN 2 Kajoran');
        $this->email->to('mraihanna.18@gmail.com');

        $this->email->subject('Mencoba');
        $this->email->message($message);


        if ($this->email->send()) {
            $this->load->view('nyoba/index');
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
