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

        $this->view('books/index' , $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);

            $image_dir = APPROOT . '\booksimages\a';
            $image_dir = substr_replace($image_dir ,"",-1);
            $image_type = strtolower(pathinfo($_FILES['bookImage']['name'] , PATHINFO_EXTENSION));
            //Mudando o nome da imagem para adicionar Data do momento da criação do formulario e nome do livro inserido
            $image_temp=($image_dir . date("Y.m.d-H.i.s") . "-" . trim($_POST['bookName'] . "." . $image_type));
            
            $data = [
                'book_name' => trim($_POST['bookName']),
                'conditionn' => trim($_POST['bookCondition']),
                'trade' => trim($_POST['trade']),
                'synopsis' => trim($_POST['synopsis']),
                'book_img' => $image_temp,
                'user_id' => trim($_SESSION['user_id'])
    
            ];
            

            if(move_uploaded_file($_FILES["bookImage"]["tmp_name"],$image_temp)){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($this->postModel->addAnnounce($data))
                {
                    flash('announce_added' , 'Anúncio Criado');
                    redirect('books');
                } else die('Algo deu errado');
            }
        }
        }else {
            $data = [
                'book_name' => '',
                'condition' => '',
                'trade' => '',
                'synopsis' => '',
                // 'book_img' => ''

            ];
        }
        $this->view('books/add' , $data);
    }

    public function show($id){
        $row = $this->postModel->getBookByID($id);
        $data=[
            'announce' => $row
        ];
        $this->view('books/show' , $data);
    }
}
