<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
		parent::__construct();
        cek_login();
        if($this->session->userdata('login_session') !=TRUE){
            $url=base_url('Auth');
            redirect($url);
        };
        $this->load->helper('url');
		$this->load->model('user_model');
	}

	public function index()
	{

        $this->load->view('user/header_user.php');
		$this->load->view('user/dashboard_user.php');
        $this->load->view('user/footer_user.php');
	}

    public function control_access()
	{
		$this->load->view('user/control_access.php');
	}

    public function request_ca()
	{
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '1'
        );  
        $where = array(
            'id_user' => $id_user
        );
        $this->user_model->request_access($where,$data,'user');
		redirect('User/request_waiting');
	}

    public function request_fitur()
	{
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status_fitur' => 1
        );  
        $where = array(
            'id_user' => $id_user
        );
        $this->user_model->request_access_fitur($where,$data,'user');
		redirect('User/request_waiting_fitur');
	}

    public function request_waiting()
	{
        $this->load->view('user/ca_waiting.php');
	}

    public function request_waiting_fitur()
	{
        $this->load->view('user/header_user.php');
        $this->load->view('user/ca_waiting_fitur.php');
        $this->load->view('user/footer_user.php');
	}



    public function data_employees()
	{
        $id_user = $this->session->userdata('id_user');
        $name = $this->session->userdata('name');
        $data['user'] = $this->user_model->get_user($id_user);
        $status = $this->user_model->get_status($id_user);

        foreach ($status as $fitur) {
            if ($fitur['status_fitur'] == 2) {
          
                redirect('User/view_employees');
            }else {
                redirect('User/view_nocontent');
            }
        }
	}

    public function data_company()
	{
        $id_user = $this->session->userdata('id_user');
        $name = $this->session->userdata('name');
        $data['user'] = $this->user_model->get_user($id_user);
        $status = $this->user_model->get_status($id_user);

        foreach ($status as $fitur) {
            if ($fitur['status_fitur'] == 2) {
          
                redirect('User/view_company');
            }else {
                redirect('User/view_nocontent');
            }
        }
	}

    public function data_salary()
	{
        $id_user = $this->session->userdata('id_user');
        $name = $this->session->userdata('name');
        $data['user'] = $this->user_model->get_user($id_user);
        $status = $this->user_model->get_status($id_user);

        foreach ($status as $fitur) {
            if ($fitur['status_fitur'] == 2) {
          
                redirect('User/view_salary');
            }else {
                redirect('User/view_nocontent');
            }
        }
	}
    

    public function view_employees()
	{
        $id_user = $this->session->userdata('id_user');
        $name = $this->session->userdata('name');
        $data['user'] = $this->user_model->get_user($id_user);
        $status = $this->user_model->get_status($id_user);
        $data['employees'] = $this->user_model->get_employee();

        $this->load->view('user/header_user.php');
        $this->load->view('user/dataemployee_user.php',$data);
        $this->load->view('user/footer_user.php');
	}

    public function view_nocontent()
	{
        
        $this->load->view('user/header_user.php');
        $this->load->view('user/no_content.php');
        $this->load->view('user/footer_user.php');
	}

    public function view_company()
	{
        $data['company'] = $this->user_model->get_company();
        $this->load->view('user/header_user.php');
		$this->load->view('user/datacompany_user.php',$data);
        $this->load->view('user/footer_user.php');
	}

    public function view_salary()
	{
        $data['salary'] = $this->user_model->get_salary();
        $this->load->view('user/header_user.php');
		$this->load->view('user/datasalary_user.php',$data);
        $this->load->view('user/footer_user.php');
	}

    public function add_employee()
	{
        $id_employee = $this->input->post('id_employee');
        $name = $this->input->post('name');
        $position = $this->input->post('position');
        $office = $this->input->post('office');
        $division = $this->input->post('division');
        $age = $this->input->post('age');
        $date = $this->input->post('start_date');
        $status = $this->input->post('status');
        $cuti = $this->input->post('cuti');

        $data = array(
            'id_employee' => $id_employee, 
            'name' => $name,
            'position' => $position,
            'office' => $office,
            'division' => $division,
            'age' => $age,
            'start_date' => $date,
            'status' => $status,
            'cuti' => $cuti
        );

        $this->user_model->insert_employee($data);
        redirect('User/data_employees');
       
	}

	public function logout()
    {
        $id_user = $this->session->userdata('id_user');

        $status = $this->user_model->get_status($id_user);

        foreach ($status as $fitur) {
            if ($fitur['status_fitur'] == 1) {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('id_user');
                set_pesan('Anda telah berhasil logout');
                redirect('Auth');
            }else {
                $data = array(
                    'status_fitur' => 0
                );  
                $where = array(
                    'id_user' => $id_user
                );
                $this->user_model->request_access_fitur($where,$data,'user');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('id_user');
                set_pesan('Anda telah berhasil logout');
                redirect('Auth');
            }
        }
        
     
       
    }



}