<?php
class Book
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function fetchAllBooks()
    {
        $this->db->query('SELECT * FROM books
                            INNER JOIN users
                            on books.id_user = users.id
                            ORDER BY books.post_date DESC
                            ');

        $res = $this->db->resultSet();
        return $res;
    }

    public function addAnnounce($data)
    {
        // $this->db->query("INSERT INTO books(id_user, book_name, condition, trade, synopsis) VALUES('$idUser','$bookName','$bookCondition','$trade','$synopsis');");
        $this->db->query("INSERT INTO books (id_user,book_name,condi,trade,synopsis,book_image) VALUES (:user,:name,:condi,:trade,:synopsis,:book_img)");
        
        $this->db->bind(':user', $data['user_id']);
        $this->db->bind(':name', $data['book_name']);
        $this->db->bind(':condi', $data['conditionn']);
        $this->db->bind(':trade', $data['trade']);
        $this->db->bind(':synopsis', $data['synopsis']);
        $this->db->bind(':book_img', $data['book_img']);

        if($this->db->execute())
        {
             return true;
        } else return false;
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
}
