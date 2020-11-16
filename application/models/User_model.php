<?php

  class User_model extends CI_model
  {

  
     function create($formArray)
     {
     	$this->db->insert('users',$formArray); //Insert into users (name,email) values (?,?);

     }



     function isvalid()
     {
     	$this->db->where('email',$this->input->post('email'));
     	$this->db->where('subscriber_id',$this->input->post('subscriber_id'));
     	$q = $this->db->get('users');

        // print_r($q->row_array());
     	return $q;
     }



     public function insert_packagedetails()
     {
          $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'package_name'        => $arr1['package_name'],
                 'package_price'       => $arr1['package_price'],
                 'speed'               => $arr1['speed'],
                 'month'               => $arr1['month'],
                 'data_per_day'        => $arr1['data_per_day'],
                 'installation_charge' => $arr1['installation_charge'],
                 'pincode'             => $arr1['pincode'],
                 'user_id'             => $this->session->userdata('user_id'),
                 'created_at'          => date('Y-m-d'),
          );
            $this->db->insert('package_details',$arr);

           $message_id = $this->db->insert_id();
  
            if(isset($_FILES["input_file"]["name"])){

        $config['upload_path'] = "./assets/";
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('input_file') ) {
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
        } else {
          $data = array('image_metadata' => $this->upload->data());
          $name=$data['image_metadata']["file_name"];
          $path= 'assets/'.$name;
          // print_r($data);
          $arrfile=array(
      
            'file_type'   => 'inbox_file',
            'file_name'   => $name,
            'file_path'   => base_url().$path,
            
          );
          $this->db->where('id',$message_id);
          $this->db->update('package_details',$arrfile);
          
          } 
       }

       // print_r(json_encode(1));    
       echo "successfully inserted";       

    }


    public function getpackagedetails()
    {
      $user_id=$this->session->userdata('user_id');
      $this->db->where('user_id',$user_id);
      $res = $this->db->get('package_details')->result_array();

      // print_r($res);

      return $res;
    }



    public function insert_paymentmethoddetails()
     {
          $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'payment_method' => $arr1['payment_method'],
                 'payment_no'     => $arr1['payment_method_no'],
                 'user_name'      => $arr1['user_name'],
                 'created_at'     => date('Y-m-d'),
                 'user_id'        => $this->session->userdata('user_id'),
                
          );
            $this->db->insert('payment_methodinfo',$arr);

           $message_id = $this->db->insert_id();
  
            if(isset($_FILES["input_file"]["name"])){

        $config['upload_path'] = "./assets/";
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('input_file') ) {
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
        } else {
          $data = array('image_metadata' => $this->upload->data());
          $name=$data['image_metadata']["file_name"];
          $path= 'assets/'.$name;
          // print_r($data);
          $arrfile=array(
      
            'file_type'   => 'inbox_file',
            'file_name'   => $name,
            'file_path'   => base_url().$path,
            
          );
          $this->db->where('id',$message_id);
          $this->db->update('payment_methodinfo',$arrfile);
          
          } 
       }

       // print_r(json_encode(1));    
       echo "successfully inserted";       

    }

    public function paymentmethodinfo()
    {
      $user_id=$this->session->userdata('user_id');
      $this->db->where('user_id',$user_id);
      $res = $this->db->get('payment_methodinfo')->result_array();

      // print_r($res);

      return $res;
    }

     public function paymentmethodmodalinfo()
    {
      $user_id=$this->session->userdata('user_id');
      $this->db->where('user_id',$user_id);

      $this->db->where('id',$this->input->post('val'));
      $res = $this->db->get('payment_methodinfo')->row_array();

      print_r(json_encode($res));
      // echo $res;

      // return json_encode($res);
    }


    public function update_paymentmethoddetails()
     {
          $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'payment_method' => $arr1['paymentmethodname'],
                 'payment_no'     => $arr1['payment_no'],
                 'user_name'      => $arr1['user_name'],
                 'created_at'     => date('Y-m-d'),
                 'user_id'        => $this->session->userdata('user_id'),
                
          );

            $this->db->where('id',$arr1['paymentid']);
            $this->db->update('payment_methodinfo',$arr);

           $message_id = $arr1['paymentid'];
  
            if(isset($_FILES["input_file"]["name"])){

        $config['upload_path'] = "./assets/";
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('input_file') ) {
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
        } else {
          $data = array('image_metadata' => $this->upload->data());
          $name=$data['image_metadata']["file_name"];
          $path= 'assets/'.$name;
          // print_r($data);
          $arrfile=array(
      
            'file_type'   => 'inbox_file',
            'file_name'   => $name,
            'file_path'   => base_url().$path,
            
          );
          $this->db->where('id',$message_id);
          $this->db->update('payment_methodinfo',$arrfile);
          
          } 
       }

       // print_r(json_encode(1));    
       echo "successfully updated";       

    }


      public function deletepaymentmethod()
     {
       # code...
      $this->db->where('id',$this->input->post('val'));
      $this->db->delete('payment_methodinfo');

      echo "successfully deleted";
     }


     public function userpackageplans()
    {
      $user_id=$this->session->userdata('user_id');
      $this->db->where('id',$user_id);
      $result = $this->db->get('users')->row_array();

      $this->db->where('pincode',$result['pincode']);
      $res = $this->db->get('package_details')->result_array();

      // print_r($res);

      return $res;
    }



    public function rechargeinfo()
    {
      $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'subscriber_id'  => $arr1['subscriber_id'],
                 'amount'         => $arr1['amount'],
                 'username'       => $this->session->userdata('username'),
                 'created_at'     => date('Y-m-d'),
                 'user_id'        => $this->session->userdata('user_id'),
                 'transaction_id' => $arr1['transaction_id'],
                
          );
            $this->db->insert('recharge_info',$arr);

            
    }


     public function paymentmethoddetails()
    {
      
      $res = $this->db->get('payment_methodinfo')->result_array();

      // print_r($res);

      return $res;
    }


    public function registeration()
    {
      $arr1=$this->input->post();
          // print_r($arr1);

      $this->db->where('mobile',$arr1['mobile']);
      $res = $this->db->get('users');
            
      if($res->num_rows() > 0)
      {
        print_r(json_encode(0));
      } 
      elseif ($res->num_rows() == 0) {
             # code...
        $arr = Array(
                 'subscriber_id'  => $arr1['subscriber_id'],
                 'fullname'       => $arr1['fullname'],
                 'email'          => $arr1['email'],
                 'mobile'         => $arr1['mobile'],
                 'pincode'        => $arr1['pincode'],
                 'user_level'     => '1',
                 'user_category'  => 'user',
                 'created_at'     => date('Y-m-d'),
          );
            $this->db->insert('users',$arr);
            print_r(json_encode(1));
           }     


            
    }



    public function getnewuserinfo()
    {
      
      $this->db->where('user_category','user');
      $res = $this->db->get('users')->result_array();

      // print_r($res);

      return $res;
    }


    public function userinfo()
    {
    

      $this->db->where('id',$this->input->post('val'));
      $res = $this->db->get('users')->row_array();

      print_r(json_encode($res));
      // echo $res;

      // return json_encode($res);
    }


    public function update_userinfo()
     {
          $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'subscriber_id'  => $arr1['subscriber_id'],
                 'fullname'       => $arr1['name'],
                 'email'          => $arr1['email'],
                 'mobile'         => $arr1['mobile'],
                 'pincode'        => $arr1['pincode'],
                
          );

            $this->db->where('id',$arr1['userid']);
            $this->db->update('users',$arr);

       echo "successfully updated";       

    }



    public function deleteuserinfo()
     {
       # code...
      $this->db->where('id',$this->input->post('val'));
      $this->db->delete('users');

      echo "successfully deleted";
     }



     public function getrechargeinfo()
    {
      
      $res = $this->db->get('recharge_info')->result_array();

      // print_r($res);

      return $res;
    }



    public function update_rechargeservice()
     {
          $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'status' => $arr1['status'],
                
          );

            $this->db->where('id',$arr1['rechargeuserid']);
            $this->db->update('recharge_info',$arr);

       echo "successfully updated";       

    }




    public function packagemodalinfo()
    {
      $user_id=$this->session->userdata('user_id');
      $this->db->where('user_id',$user_id);

      $this->db->where('id',$this->input->post('val'));
      $res = $this->db->get('package_details')->row_array();

      print_r(json_encode($res));
      // echo $res;

      // return json_encode($res);
    }




    public function update_packageinfo()
     {
          $arr1=$this->input->post();
          // print_r($arr1);
            
          $arr = Array(
                 'package_name'        => $arr1['package_name'],
                 'package_price'       => $arr1['package_price'],
                 'speed'               => $arr1['speed'],
                 'month'               => $arr1['month'],
                 'data_per_day'        => $arr1['data_per_day'],
                 'installation_charge' => $arr1['installation_charge'],
                 'pincode'             => $arr1['pincode'],
                
          );

            $this->db->where('id',$arr1['packageid']);
            $this->db->update('package_details',$arr);

       echo "successfully updated";       

    }


    public function deletepackageinfo()
     {
       # code...
      $this->db->where('id',$this->input->post('val'));
      $this->db->delete('package_details');

      echo "successfully deleted";
     }




  }

 ?>