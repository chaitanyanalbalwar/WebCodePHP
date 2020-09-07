<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_Authentication extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user'); 
        //error_reporting(0);
    } 
     
    public function index(){ 
        $userData = array(); 
         
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
            
 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:''; 
            $userData['fname']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['lname']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            // $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            // $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            // $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
            

             
            // Insert or update user data to the database 
            $result = $this->user->checkUser($userData); 
            
            //print_r($result);die;

             
            // Check user data insert or update status 
            if(!empty($result)){ 
                $data['userData'] = $userData; 
                
                        $this->session->unset_userdata('userdata'); 

                
            $userdata1 = array( 
                'oauth_provider'=>'facebook',
                'oauth_uid'   => !empty($fbUser['id'])?$fbUser['id']:'',
			   'fname'  => $result['fname'], 
			   'lname'     => $result['lname'],
			   'mobileno'     => $result['mobileno'], 
			   'email'     => $result['email'], 
			   //'address'     => $result->address, 
 			   'user_id'     => $result['user_id'], 
			   'logged_in' => true
			);  

			$this->session->set_userdata('userdata',$userdata1);
			
			        redirect('my-profile');

                 
                // Store the user profile info into session 
                //$this->session->set_userdata('userData', $userData); 
            }else{ 
               $data['userData'] = array(); 
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        } 
         
        // Load login/profile view 
        //$this->load->view('user_authentication/index',$data); 
        redirect('my-profile');
    } 
 
    public function logout() { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userData'); 
        // Redirect to login page 
        redirect('home');
    } 
}
