<?php

class User{

    
    public $name;
    public $email;
    private $password;
    

    public function __construct($name,$email,$password=null)
    {

        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        
    }
    //check if user already exist
    public static function userExist($email)
    {
        $query = Db::$conn->prepare('select * from users where email=?');
        $query->execute([$email]);
        $username_exists= $query->fetchAll(PDO::FETCH_ASSOC);
        return $username_exists;
        
    }

    //save user to db
    public function save()
    {
        $this->password=password_hash($this->password , PASSWORD_BCRYPT);
        $query = Db::$conn->prepare('insert into users (name,email,password) values (?,?,?)');
        $success=$query->execute([$this->name,$this->email,$this->password,]);
        return $success;   

    }

    //check user credentials 
    public static function login($email,$password)
    {
       
        $query = Db::$conn->prepare('select * from users where email= ? limit 1');
        $query->execute([$email]);
        $user= $query->fetchAll(PDO::FETCH_ASSOC);
        $is_pass_correct = password_verify( $password,$user[0]['password']);
        return $is_pass_correct ? $user[0]['name']:null;   

    }

    //return all users with matching pattern in their name or email
    public static function all($name)
    {
        $name='%'.$name.'%';
        $query = Db::$conn->prepare('select * from users where name like ? or email like ?');
        $query->execute([$name,$name]);
        $users= $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;

    }


   




}