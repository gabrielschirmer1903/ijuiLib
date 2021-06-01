<?php
class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query("INSERT INTO users (name,email,password,city,address,address_number) VALUES (:name,:email,:password,:city,:address,:address_number)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':address_number', $data['address_number']);

        if($this->db->execute())
        {
            return true;
        } else return false;
    }
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else return false;
    }
    public function login($email , $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email' , $email);

        $row = $this->db->single();

        $hashedPassword = $row->password;
        if(password_verify($password , $hashedPassword)){
            return $row;
        } else return false;
    }
    public function fetchUserInfo($sessionId)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id_user');
        $this->db->bind(':id_user', $sessionId);

        $userInfo = $this->db->single();
        return $userInfo;
    }
    public function updateUserInfo($sessionId , $data)
    {
        $this->db->query("UPDATE users
                            set name = :name,
                            email = :email,
                            city = :city,
                            address = :address,
                            address_number = :address_number,
                            phone = :phone
                            WHERE id = :id");
        $this->db->bind(':name' , $data['name']);
        $this->db->bind(':email' , $data['email']);
        $this->db->bind(':city' , $data['city']);
        $this->db->bind(':address' , $data['address']);
        $this->db->bind(':address_number' , $data['address_number']);
        $this->db->bind(':phone' , $data['phone']);
        $this->db->bind(':id' , $sessionId);

        if($this->db->single()){
            return true;
        }else return false;

    }
}
