<?php
class Books extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Book');
    }
    public function index()
    {
        $books = $this->postModel->fetchAllBooks();
        $data = [
            'books' => $books
        ];

        $this->view('books/index', $data);
    }

    public function add()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$image_dir = APPROOT . '../public/img/bookimages/a';
            $image_dir = substr_replace(PUBROOT, "", -1);
            $image_type = strtolower(pathinfo($_FILES['bookImage']['name'], PATHINFO_EXTENSION));
            //Mudando o nome da imagem para adicionar Data do momento da cria��o do formulario e nome do livro inserido
            $image_temp = ($image_dir . date("Y.m.d-H.i.s") . "-" . trim($_POST['bookName'] . "." . $image_type));
            $image_name = (date("Y.m.d-H.i.s") . "-" . trim($_POST['bookName'] . "." . $image_type));

            $data = [
                'book_name' => trim($_POST['bookName']),
                'conditionn' => trim($_POST['bookCondition']),
                'trade' => trim($_POST['trade']),
                'synopsis' => trim($_POST['synopsis']),
                'book_img' => $image_name,
                'user_id' => trim($_SESSION['user_id'])

            ];


            if (move_uploaded_file($_FILES["bookImage"]["tmp_name"], $image_temp)) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if ($this->postModel->addAnnounce($data)) {
                        flash('announce_added', 'An�ncio Criado');
                        redirect('books');
                    } else die('Algo deu errado');
                }
            }
        } else {
            $data = [
                'book_name' => '',
                'condition' => '',
                'trade' => '',
                'synopsis' => '',
                // 'book_img' => ''

            ];
        }
        $this->view('books/add', $data);
    }

    public function bookInfo($id)
    {
        $row = $this->postModel->getBookByID($id);
        $data = [
            'announce' => $row
        ];
        $this->view('books/show', $data);
    }

    public function showUserPosts()
    {
        $books = $this->postModel->fetchAllUserBooks($_SESSION['user_id']);
        $data = [
            'books' => $books
        ];
        
            $this->view('books/userbooks', $data);
        
    }

    public function editBookAnnounce($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'book_name' => trim($_POST['editName']),
                'conditionn' => trim($_POST['bookCondition']),
                'trade' => trim($_POST['trade']),
                'synopsis' => trim($_POST['synopsis']),
                'book_id' => $id

            ];


            if ($this->postModel->updateAnnounce($data)) {
                flash('announce_added', 'An�ncio Criado');
                redirect('books/index');
            } else die('Algo deu errado');
        } else {
            $row = $this->postModel->getBookByID($id);
            $data = [
                'announce' => $row
            ];
            if ($data['announce']->id_user == $_SESSION['user_id']) {
                $this->view('books/editbookinfo', $data);
            } else die('Acesso restrito');
        }
    }
    public function deleteAnnounce($bookID)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($this->postModel->deleteAnnounce($bookID)){
                flash('post_message' , 'Anúncio removido');
                redirect('books');
            }
        } else {
            die('as');
        }
    }
}
