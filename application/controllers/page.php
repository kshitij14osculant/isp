<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      echo $this->session->set_flashdata('msg','Username or Password is Wrong');
      redirect('Welcome/login');
    }
  }
 
  function index(){
 
  }
public function myacc()
  {
    
          return $this->load->view('Recharge/myacc');
     
  }
 
 
  
}
?>