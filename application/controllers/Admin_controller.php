<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


  function __construct(){
    parent::__construct();
    // if($this->session->userdata('logged_in') !== TRUE){
    //   $this->load->view('login.php');
    // }
     $this->load->model('User_model');
  }
	 

   public function plans()
   {
    
     $data['package'] = $this->User_model->getpackagedetails();
     $this->load->view('Admin/plans.php',$data);
   }

   public function addplans()
   {
     $this->load->view('Admin/addplans.php');
   }


   public function new_users()
   {
     $this->load->view('Admin/new_users.php');
   }


   public function insert_packagedetails()
	{ 

	    $this->load->model('User_model');
	    $this->User_model->insert_packagedetails();
	}


  public function addpaymentmethod()
   {
     $this->load->view('Admin/addpaymentmethod');
   }


   public function insert_paymentmethoddetails()
  { 

      $this->load->model('User_model');
      $this->User_model->insert_paymentmethoddetails();
  }

  public function paymentmethod()
   {
    
      $data['paymentmethodinfo'] = $this->User_model->paymentmethodinfo();
      $this->load->view('Admin/paymentmethod',$data);
   }

  public function paymentmethodmodalinfo()
  {
    $this->load->model('User_model');
    $this->User_model->paymentmethodmodalinfo();
  }


  public function update_paymentmethoddetails()
  { 

      $this->load->model('User_model');
      $this->User_model->update_paymentmethoddetails();
  }

   public function deletepaymentmethod()
  {
    # code...
    $this->load->model('User_model');
    $this->User_model->deletepaymentmethod();
  } 






}
?>
