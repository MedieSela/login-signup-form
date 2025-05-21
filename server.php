<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

require_once 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['emer'], $_POST['mbiemer'],$_POST['mosha'],$_POST['email'],$_POST['password'])){

    $emer = $conn->real_escape_string($_POST['emer']);
    $mbiemer = $conn->real_escape_string($_POST['mbiemer']);
    $mosha = (int)$_POST['mosha'];
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows>0){
        echo "Email already exists.<a href='signup.html'>Try again</a>";   
        exit;
    }

    $sql = "INSERT INTO users (emer,mbiemer,mosha,email,password) VALUES ('$emer','$mbiemer','$mosha','$email','$password')";
    if($conn->query($sql)){
        header("Location: login.html");
        exit;
    }else{
        echo "Failed" .$conn->error;
    }
}  
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['email'],$_POST['password']) && !isset($_POST['emer'])){
         
        $email = $conn->real_escape_string($_POST['email']);
        $password=$_POST['password'];

        $result = $conn->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows==1){
        $user=$result->fetch_assoc();

        if(password_verify($password,$user['password'])){
            $_SESSION['user']=[
                'emer' => $user['emer'],
                'mbiemer' => $user['mbiemer'],
                'mosha' => $user['mosha'],
                'email' => $user['email']
            ];
            header("Location: profile.php");
            exit();
        }else{
            echo "Wrong Password. <a href='login.html'>Kthehu</a>";
        }
    }else{
        echo "This email does not exist. <a href='login.html'>Kthehu</a>";
    }
}

?>