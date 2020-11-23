<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    // $this->load->view('Recharge/index');
    $this->load->view('Jetway/index');

	}


  public function about_services()
  {
     $this->load->view('Jetway/about-services');
  }

 
    //register function
	public function register()
	{
		// $this->load->view('register.php');
		$this->load->model('User_model');
    	$this->form_validation->set_rules('name','Name','required');
    	$this->form_validation->set_rules('email','Email','required|valid_email');

    	if($this->form_validation->run() == false){

    	 // $this->load->view('create');
    		$this->load->view('register.php');
    	}
    	else
    	{
            //save record to database
            $formArray = Array();
            $formArray['fullname']   = $this->input->post('name');
            $formArray['email']      = $this->input->post('email');
            $formArray['pincode']    = $this->input->post('pincode');
            $formArray['mobile']     = $this->input->post('mobile');
            $formArray['created_at'] = date('Y-m-d');

            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully');
            redirect(base_url().'index.php/Welcome/index');

    	}
	}


	public function login()
	{
		$this->load->view('login.php');
		
	}


	public function isvalid()
	{
		$this->load->model('User_model');

		$validate =$this->User_model->isvalid();
        // print_r($validate->num_rows());
        if($validate->num_rows() > 0){

        $data      = $validate->row_array();
        $user_id   = $data['id'];
        $name      = $data['fullname'];
        $email     = $data['email'];
        $mobile    = $data['mobile'];
        $pincode   = $data['pincode'];
        $level     = $data['user_level'];
        $user_type = $data['user_category'];
        $sesdata = array(
            'user_id'   => $user_id,
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'user_type' => $user_type,
            'logged_in' => TRUE
        );
        
        $this->session->set_userdata($sesdata);
        $this->switching();
        // echo $this->session->userdata('level');
        
      }
        else if($validate->num_rows() == 0){
           echo $this->session->set_flashdata('msg','Username or Password is Wrong');
           // redirect('login');
        }else{
           echo "Something went Wrong! Please try again";
       }
     }


    function switching(){

              // print_r($validate->num_rows());

             $level    = $this->session->userdata('level');
             $category = $this->session->userdata('user_type');

              if($level === '0' && $category === 'admin'){
              	
               $this->load->view('Admin/index.php');
              

              }
              else if($level === '1' && $category === 'user'){
               
                   print_r(json_encode(1));
                   // $data['userpackage'] = $this->User_model->userpackageplans();
                   // $this->load->view('Recharge/myacc.php',$data);

              }
              else{
                    echo $this->session->set_flashdata('msg','Username or Password is Wrong');
                     redirect('login');
                  }
        }



 function logout(){
      $this->session->sess_destroy();
      $this->load->view('login.php');
  }



}
?>
