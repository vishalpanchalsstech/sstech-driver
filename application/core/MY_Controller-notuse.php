<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
 { 
     function __construct(){
         parent::__construct();
     }
     
   //set the class variable.
   var $template  = array();
   var $data      = array();
   //Load layout    
   public function layout() {
       
     // making temlate and send data to view.
       if($this->session->userdata('logged_in'))
       {
           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           $this->template['header']   = $this->load->view('layout/header',$this->data, true);
           $this->template['slider'] = $this->load->view('layout/'.$this->slider, $data, true);
           $this->template['middle'] = $this->load->view($this->middle, $data, true);
           $this->template['footer'] = $this->load->view('layout/footer', $data, true);
           $this->load->view('layout/index', $this->template);
           
           
       }// making template and send data to view.
    
       else
       {
           //If no session, redirect to login page
           return redirect('index.php/login', 'refresh');
       }
    
   }
}