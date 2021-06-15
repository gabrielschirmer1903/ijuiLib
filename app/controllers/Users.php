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
                'address_number' => trim($_POST['addressNumberField']),
                'phone' => trim($_POST['phoneNumber'])

            ];

            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = 'E-mail ja existente';
                $this->view('users/register', $data);
            } else {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('register_success', 'Você está cadastrado');
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
                $data['email_err'] = 'Usu�rio n�o encontrado';
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

                if ($this->userModel->updateUserInfo($_SESSION['user_id'], $data)){
                    redirect('users/profile');
                }die('Algo inesperado aconteceu');
                
            } else {
                $user = $this->userModel->fetchUserInfo($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];

                $this->view('users/edit_profile', $data);
            }
        }
    }

    public function changePassword()
    {
        if (isLoggendIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user = $this->userModel->fetchUserInfo($_SESSION['user_id']);
                $data = [

                    'current_pwd' => $_POST['current_pwd'],
                    'new_pwd' => trim($_POST['new_pwd']),
                    'conf_new_pwd' => trim($_POST['conf_new_pwd']),
                ];

                // echo $user->password;
                // echo "<br>";
                // echo (password_hash($data['current_pwd']));


                if (password_verify($data['current_pwd'], $user->password) == $user->password) {
                    if (($data['new_pwd'] == $data['conf_new_pwd'])) {
                        $this->userModel->changePassword($_SESSION['user_id'], $data);
                        redirect('users');
                    } else die('As senhas novas n�o s�o iguais');
                } else die('Digite a senha atual corretamente');
            } else {
                $this->view('users/change_password');
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

    // public function changeUserImage()
    // {
    //     die('teste');
    //     if (isLoggendIn()) {
    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //             $sessionID = $_SESSION['user_id'];
    //             //$image_dir = APPROOT . '../public/img/bookimages/a';
    //             $image_dir = substr_replace(IMGUSEROOT, "", -1);
    //             $image_type = strtolower(pathinfo($_FILES['changeUserImage']['name'], PATHINFO_EXTENSION));
    //             //Mudando o nome da imagem para adicionar Data do momento da cria��o do formulario e nome do livro inserido
    //             $image_temp = ($image_dir . date("Y.m.d-H.i.s") . "-" . trim($_POST['changeUserImage'] . "." . $image_type));
    //             $image_name = (date("Y.m.d-H.i.s") . "-" . trim($_POST['changeUserImage'] . "." . $image_type));

    //             $data = [
    //                 'user_image' => $image_name
    //             ];

    //             if (move_uploaded_file($_FILES["changeUserImage"]["tmp_name"], $image_temp)) {
    //                 if ($this->postModel->changeUserImage($data , $sessionID)) {
    //                     flash('announce_added', 'Imagem atualizada');
    //                     redirect('users');
    //                 } else die('Algo deu errado');
    //             }
    //         }
    //     }
    // }
}
