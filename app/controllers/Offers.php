<?php
class Offers extends Controller
{
    public function __construct()
    {
        if (isLoggendIn()) {
            $this->offerModel = $this->model('Offer');
        }
    }

    public function index()
    {
        redirect('user');
    }

    public function createOfferForm($idBook)
    {
        $bookInfo = $this->offerModel->getBookByID($idBook);

        if (isLoggendIn()) {
                $data = [
                    'book_info' => $bookInfo
                ];

                $this->view('offers/newoffer', $data);
        }
    }

    
    public function createOffer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$image_dir = APPROOT . '../public/img/bookimages/a';
            $image_dir = substr_replace(IMGOFFERROOT, "", -1);
            $image_type = strtolower(pathinfo($_FILES['offerImage']['name'], PATHINFO_EXTENSION));
            //Mudando o nome da imagem para adicionar Data do momento da cria��o do formulario e nome do livro inserido
            $image_temp = ($image_dir . date("Y.m.d-H.i.s") . "-" . trim("offer" . "." . $image_type));
            $image_name = (date("Y.m.d-H.i.s") . "-" . "offer" . "." . $image_type);

            $data = [
                'offer_message' => trim($_POST['synopsis']),
                'offer_img' => $image_name,
                'id_book_owner' => trim($_POST['id_book_owner']),
                'id_offerer' => $_SESSION['user_id'],
                'id_book' => trim($_POST['id_book'])
            ];


            if (move_uploaded_file($_FILES["offerImage"]["tmp_name"], $image_temp)) {
                    if ($this->offerModel->addOffer($data)) {
                        flash('announce_added', 'Offerta enviada');
                        redirect('users');
                    } else die('Algo deu errado');  
            }
        }
    }

    public function fetchUserMadeOffers()
    {
        $info = $this->offerModel->fetchMadeOffers($_SESSION['user_id']);

        $data = [
            'offer' => $info
        ];

            $this->view('offers/madeoffers' , $data);

    }

    public function fetchReceviedOffers()
    {
        $info = $this->offerModel->fetchReceviedOffers($_SESSION['user_id']);

        $data = [
            'offer' => $info
        ];

            $this->view('offers/receviedoffers' , $data);
    }
    public function deleteOffer($offerID)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($this->offerModel->deleteOffer($offerID)){
                flash('post_message' , 'Anúncio removido');
                redirect('books');
            }
        } else {
            die('as');
        }
    }
}
