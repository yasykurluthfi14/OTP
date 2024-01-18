<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
		parent::__construct();
        cek_login();
        if($this->session->userdata('login_session') !=TRUE){
            $url=base_url('Auth');
            redirect($url);
        };
        $this->load->helper('url');
		$this->load->model('Admin_model','admin_model');
	}

	public function index()
	{
        $this->load->view('admin/header_admin.php');
		$this->load->view('admin/dashboard_admin.php');
        $this->load->view('admin/footer_admin.php');
	}

    public function control_access()
	{
        $data['user'] = $this->admin_model->get_user();
        $this->load->view('admin/header_admin.php');
		$this->load->view('admin/control_access.php', $data);
        $this->load->view('admin/footer_admin.php');
	}

    public function data_admin()
	{
        $data['admin'] = $this->admin_model->get_admin();
        $this->load->view('admin/header_admin.php');
		$this->load->view('admin/data_admin.php',$data);
        $this->load->view('admin/footer_admin.php');
	}

    public function data_employees()
	{
        $data['employees'] = $this->admin_model->get_employee();
        $this->load->view('admin/header_admin.php');
		$this->load->view('admin/dataemployee_admin.php',$data);
        $this->load->view('admin/footer_admin.php');
	}

    public function data_company()
	{
        $data['company'] = $this->admin_model->get_company();
        $this->load->view('admin/header_admin.php');
		$this->load->view('admin/datacompany_admin.php',$data);
        $this->load->view('admin/footer_admin.php');
	}

    public function data_salary()
	{
        $data['salary'] = $this->admin_model->get_salary();
        $this->load->view('admin/header_admin.php');
		$this->load->view('admin/datasalary_admin.php',$data);
        $this->load->view('admin/footer_admin.php');
	}

    public function add_admin()
	{
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $password = $this->input->post('password');
        $role = 'administrator';
        $status = 0 ;
        $status_fitur = 0 ;

        $data = array(
            'id_user' => $id_user, 
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'role' => $role,
            'status' => $status,
            'status_fitur' => $status_fitur
        );

        $this->admin_model->insert_admin($data);
        redirect('Admin/data_admin');
       
	}

    function update_admin(){
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
     
        $data = array(
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
        );
     
        $this->admin_model->update_admin($id_user, $data);
        redirect('Admin/data_admin');
    }

    function delete_admin(){
        $id_user = $this->input->post('id_user');
		$this->admin_model->delete_admin($id_user);
		redirect('Admin/data_admin');
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

        $this->admin_model->insert_employee($data);
        redirect('Admin/data_employees');
       
	}

    function update_employee(){
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
            'name' => $name,
            'position' => $position,
            'office' => $office,
            'division' => $division,
            'age' => $age,
            'start_date' => $date,
            'status' => $status,
            'cuti' => $cuti
        );
     
        $this->admin_model->update_employee($id_employee, $data);
        redirect('Admin/data_employees');
    }

    function delete_employee(){
        $id_employee = $this->input->post('id_employee');
		$this->admin_model->delete_employee($id_employee);
		redirect('Admin/data_employees');
	}

    public function add_company()
	{
        $id_company = $this->input->post('id_company');
        $company_name = $this->input->post('company_name');
        $address = $this->input->post('address');
        $date = $this->input->post('start_date');

        $data = array(
            'id_company' => $id_company, 
            'company_name' => $company_name,
            'address' => $address,
            'start_date' => $date
        );

        $this->admin_model->insert_company($data);
        redirect('Admin/data_company');
       
	}

    function update_company(){
        $id_company = $this->input->post('id_company');
        $company_name = $this->input->post('company_name');
        $address = $this->input->post('address');
        $date = $this->input->post('start_date');

        $data = array( 
            'company_name' => $company_name,
            'address' => $address,
            'start_date' => $date
        );
     
        $this->admin_model->update_company($id_company,$data);
        redirect('Admin/data_company');
    }

    function delete_company(){
        $id_company = $this->input->post('id_company');
		$this->admin_model->delete_company($id_company);
		redirect('Admin/data_company');
	}
	public function logout()
    {
        $this->session->unset_userdata('login_session');
        set_pesan('Anda telah berhasil logout');
        redirect('Auth');
    }

    public function add_salary()
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
        $salary = $this->input->post('salary');

        $data = array(
            'id_employee' => $id_employee, 
            'name' => $name,
            'position' => $position,
            'office' => $office,
            'division' => $division,
            'age' => $age,
            'start_date' => $date,
            'status' => $status,
            'cuti' => $cuti,
            'salary' => $salary
        );

        $this->admin_model->insert_salary($data);
        redirect('Admin/data_salary');
       
	}

    function update_salary(){
        $id_employee = $this->input->post('id_employee');
        $name = $this->input->post('name');
        $position = $this->input->post('position');
        $office = $this->input->post('office');
        $division = $this->input->post('division');
        $age = $this->input->post('age');
        $date = $this->input->post('start_date');
        $status = $this->input->post('status');
        $cuti = $this->input->post('cuti');
        $salary = $this->input->post('salary');
     
        $data = array(
            'name' => $name,
            'position' => $position,
            'office' => $office,
            'division' => $division,
            'age' => $age,
            'start_date' => $date,
            'status' => $status,
            'cuti' => $cuti,
            'salary' => $salary
        );
     
        $this->admin_model->update_salary($id_employee,$data);
        redirect('Admin/data_salary');
    }

    function delete_salary(){
        $id_employee = $this->input->post('id_employee');
		$this->admin_model->delete_salary($id_employee);
		redirect('Admin/data_salary');
	}


    function update_status(){
        $id_user = $this->input->post('id_user');
        $data = array(
            'status' => '2'
            
        );
     
        $this->admin_model->update_status($id_user, $data);
        redirect('Admin/control_access');
    }

    function update_status_fitur(){
        $id_user = $this->input->post('id_user');
        $data = array(
            'status_fitur' => '2'
        );
     
        $this->admin_model->update_status_fitur($id_user, $data);
        redirect('Admin/control_access');
    }



}