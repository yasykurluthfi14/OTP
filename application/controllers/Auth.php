<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

	private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('auth/login');
        }
    }
	
	public function index()
    {
        // $this->_has_login();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('Auth/login');
        } else {
            $input = $this->input->post(null, true);
            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username > 0) {
                $password = $this->auth->get_password($input['username']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['role'] == 'employee') {
                        $userdata = [
                            'id_user'  => $user_db['id_user'],
                            'username' => $user_db['username'],
                            'name' => $user_db['name'],
                            'role'  => $user_db['role'],
                            'status' => $user_db['status'],
                            'status_fitur' => $user_db['status_fitur']
                        ];

                        $data = array(
                            'id_user'  => $user_db['id_user'],
                            'username' => $user_db['username'],
                            'role'  => $user_db['role']
                        );
                        $this->session->set_userdata('login_session','employee');
                        $this->session->set_userdata($data);
						$this->session->set_flashdata('userdata', $userdata);
                        redirect('Validate');
                     }else if ($user_db['role'] == 'administrator') {
                        $userdata = array(
                            'user'  => $user_db['id_user'],
                            'username' => $user_db['username'],
                            'role'  => $user_db['role']
                        );
                        $this->session->set_userdata('login_session', 'administrator');
						$this->session->set_userdata($userdata);
                        redirect('Admin');
                     }
                        
                }else {
                    set_pesan('password salah', false);
                    redirect('Auth');
                }
            } else {
                set_pesan('username belum terdaftar', false);
                redirect('Auth');
            }
        }
    }
	
	public function logout()
    {
        $this->session->unset_userdata('login_session');
        $this->session->sess_destroy();
        set_pesan('Anda telah berhasil logout');
        redirect('auth');
    }

	public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim');
        if ($this->form_validation->run() == false) {
			$this->load->view('auth/register.php');
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role']          = 'employee';
            $input['status']  		= 0;
            $query = $this->auth->insert($input);
            if ($query) {
                set_pesan('Your account has created succesfully.');
                redirect('auth');
            } else {
                set_pesan('Invalid Registration', false);
                redirect('auth/register');
            }
        }
        
    }
}
?>
