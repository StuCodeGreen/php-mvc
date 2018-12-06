<?php
class Users extends Controller {
    public function __construct() {

    }

    public function register() {

        // check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form

            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // init data
            $data = [
              'name' => trim($_POST['name']),
              'email' => trim($_POST['email']),
              'password' => trim($_POST['password']),
              'confirm_password' => trim($_POST['confirm_password']),
              'name_err' => '',
              'email_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
          ];

            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            //validate name
            if (empty($data['name'])) {
                $data['email_err'] = 'Please enter name';
            }
            //validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            //validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated
                die('SUCCESS');
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        }else {          // init data
          $data = [
              'name' => '',
              'email' => '',
              'password' => '',
              'confirm_password' => '',
              'name_err' => '',
              'email_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
          ];

         //load view
         $this->view('users/register',$data);
        }
  
    }
      
    public function login(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //process form
        //sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
         
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
      ];

      //validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
    }

    //validate password
    if (empty($data['password'])) {
      $data['password_err'] = 'Please enter password';
  }   
    // Make sure errors are empty
       if (empty($data['email_err']) && empty($data['password_err'])) {
        // Validated
        die('SUCCESS');
    } else {
        // Load view with errors
        $this->view('users/login', $data);
    }
        
  
  
  } else {
        $data = [
          'email' => '',
          'password' => '',   
          'email_err' => '',
          'password_err' => '',  
      ];
      }
      $this->view('users/login',$data);
    }
}