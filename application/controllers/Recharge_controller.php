<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge_controller extends CI_Controller {

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

  // function __construct(){
  //   parent::__construct();
  //   if($this->session->userdata('logged_in') !== TRUE){
  //     $this->load->view('login.php');
  //   }
  // }


	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->view('Homepage/index.php');
		// $this->load->view('Admin/index.php');
		// $this->load->view('register.php');
    // $this->load->view('login.php');
    $this->load->view('Recharge/index');

	}

  public function welcomeback()
  {
    $this->load->view('Recharge/welcomeback');

  }


  public function newcust()
  {
    $this->load->view('Recharge/newcust');
  }


  public function newts()
  {
    $this->load->view('Recharge/newts');
  }

  public function login()
  {
    $this->load->view('Recharge/login');
  }

  public function register()
  {
    $this->load->view('Recharge/register');
  }

  public function myacc()
  {
    $this->load->view('Recharge/myacc');
  }

  function logout(){
      $this->session->sess_destroy();
      $this->load->view('login.php');
  }

}
?>
