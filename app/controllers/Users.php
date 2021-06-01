<?php
class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['nameField']),
                'email' => trim($_POST['emailField']),
                'email_error' => '',
                'password' => trim($_POST['passwordField']),
                'confirm_passowrd' => trim($_POST['conPasswordField']),
                'city' => trim($_POST['cityField']),
                'address' => trim($_POST['addressField']),
                'address_number' => trim($_POST['addressNumberField'])

            ];

            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = 'E-mail ja existente';
                $this->view('users/register', $data);
            } else {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('register_suceess', 'Você está cadastrado');
                    redirect('users/login');
                } else die('Algo deu errado');
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'email_error' => '',
                'password' => '',
                'confirm_passowrd' => '',
                'city' => '',
                'address' => '',
                'address_number' => ''

            ];
            $this->view('users/register', $data);
        }
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['emailField']),
                'password' => trim($_POST['passwordField']),
                'email_err' => '',
                'password_err' => ''
            ];

            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'Usuário não encontrado';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'passowrd' => '',


            ];
            $this->view('users/login', $data);
        }
    }

    public function index()
    {
        if (isLoggendIn()) {
            $user = $this->userModel->fetchUserInfo($_SESSION['user_id']);
            $data = [
                'user' => $user

            ];

            $this->view('users/index', $data);
        }
    }

    public function editProfile()
    {
        if (isLoggendIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['editName']),
                    'email' => trim($_POST['editEmail']),
                    'city' => trim($_POST['city']),
                    'address' => trim($_POST['address']),
                    'address_number' => trim($_POST['number']),
                    'phone' => trim($_POST['phone'])
                ];

                if($this->userModel->updateUserInfo($_SESSION['user_id'] , $data)){

                    $this->view('users/index', $data);

                } else die('Algo deu errado');

            } else {
                $user = $this->userModel->fetchUserInfo($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];

                $this->view('users/editprofile', $data);
            }
        }
    }

    public function changePassword()
    {
        if (isLoggendIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'email' => trim($_POST['currentpwd']),
                    'city' => trim($_POST['newpwd']),
                    'address' => trim($_POST['confnewpwd']),
                ];

                if($this->userModel->updateUserInfo($_SESSION['user_id'] , $data)){

                    $this->view('users/index', $data);

                } else die('Algo deu errado');

            } else {
                $user = $this->userModel->fetchUserInfo($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];

                $this->view('users/editprofile', $data);
            }
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('books/index');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
