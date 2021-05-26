<?php
    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');

        }


        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['nameField']),
                    'email' => trim($_POST['emailField']),
                    'email_error' => '',
                    'password' => trim($_POST['passwordField']),
                    'confirm_passowrd' => trim($_POST['conPasswordField']),
                    'address' => trim($_POST['addressField']),
                    'address_number' => trim($_POST['addressNumberField'])

                ];

                if($this->userModel->findUserByEmail($data['email']))
                {
                    $data['email_error'] = 'E-mail ja existente';
                    $this->view('users/register' , $data);
                } else{
                    $data['password'] = password_hash($data['password'] , PASSWORD_DEFAULT);

                   if ($this->userModel->register($data)){
                        redirect('users/login');
                   } else die('Algo deu errado');
                }
                

            }else{
                $data = [
                    'name' => '',
                    'email' => '',
                    'email_error' => '',
                    'password' => '',
                    'confirm_passowrd' => '',
                    'address' => '',
                    'address_number' => ''

                ];
                $this->view('users/register' , $data);
            }
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'email' => trim($_POST['email']),
                    'passowrd' => trim($_POST['password']),


                ];
            }else{
                $data = [
                    'email' => '',
                    'passowrd' => '',


                ];
                $this->view('users/login' , $data);
            }
        }

    }