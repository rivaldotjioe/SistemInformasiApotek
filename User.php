<?php

if (!isset($_SESSION)){
    session_start();
}

class User 
{
    private $error;
    

    function __construct(){
        
        
    }
    public function register($username, $password, $type)
    {
        try {
            $password = md5($password);
            $sql = mysqli_query($conn,"insert into users values ('$username','$password','$type') ");
            return true;
        } catch (\Throwable $th) {
            $error = $th;
        }  
    }

    public function login($username,$password)
    {   
        $conn;
        $query = "select username from users where username = '$username' and password = '$password'";
        require("koneksi.php");
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 1)
        {
            $data = mysqli_fetch_array($result);
            $_SESSION['login']= true;
            $_SESSION['username'] = $data['username'];
            return true;
        } else {
            return false;
        }
        mysqli_close($conn);
    }

    public function logout()
    {
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            unset($_SESSION['username']);
        }
    }
}
?>