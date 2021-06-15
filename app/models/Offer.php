<?php
class Offer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBookByID($id)
    {
        $this->db->query('SELECT * FROM books
                        INNER JOIN users 
                            on users.id = books.id_user
                        WHERE `id_books`  = :id   
        ');
        $this->db->bind(':id', $id);
        $book = $this->db->single();
        return $book;
    }

    public function addOffer($data)
    {
        $this->db->query('INSERT INTO active_offers(id_book_owner,id_offerer,message,offered_book_image,book_id) values(:id_book_owner,:id_offerer,:message,:offered_book_image,:book_id)');
        $this->db->bind(':id_book_owner' , $data['id_book_owner']);
        $this->db->bind(':id_offerer' , $data['id_offerer']);
        $this->db->bind(':message' ,$data['offer_message']);
        $this->db->bind(':offered_book_image' , $data['offer_img']);
        $this->db->bind(':book_id' , $data['id_book']);

        if($this->db->execute())
        {
             return true;
        } else return false;
    }

    public function fetchMadeOffers($userID)
    {
        $this->db->query('SELECT * FROM active_offers
                        INNER JOIN users 
                            on users.id = active_offers.id_book_owner
                        INNER JOIN books
                            on books.id_books = active_offers.book_id
                        WHERE `id_offerer`  = :id   
        ');
        $this->db->bind(':id', $userID);
        $book = $this->db->resultSet();
        return $book;
    }

    public function fetchReceviedOffers($userID)
    {
        $this->db->query('SELECT * FROM active_offers
                        INNER JOIN users 
                            on users.id = active_offers.id_offerer
                        INNER JOIN books
                            on books.id_books = active_offers.book_id
                        WHERE `id_book_owner`  = :id   
        ');
        $this->db->bind(':id', $userID);
        $book = $this->db->resultSet();
        return $book;
    }
    public function deleteOffer($offerID)
    {
        $this->db->query('DELETE FROM active_offers WHERE id_offer = :offerID');
        $this->db->bind(':offerID' , $offerID);

        if ($this->db->execute())
        {
            return true;
        } else return false;
    }
}
