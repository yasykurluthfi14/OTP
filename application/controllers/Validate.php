<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->helper('url');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
      
		$userdata = $this->session->userdata('id_user');
		$this->load->view('validate', $userdata);

    }
    public function to_user()
    {

		redirect('User');

    }
}
