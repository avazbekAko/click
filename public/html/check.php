<?php

// Register
if(isset($_POST['register_check'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= md5($_POST['password']);
    $password_2 = md5($_POST['password_confirmation']);
    $qa1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `Users` WHERE `Email` = '$email';")); 
    if($qa1['Email'] == $email){
        echo "<script>alert('Пользователь с таким email уже существует!')</script>";
    }
    else if($password!= $password_2){
        echo "<script>alert('Пароли не совпадают!')</script>";
    }
    else{
        mysqli_query($conn, "
            INSERT INTO `Users` (`Name`, `Email`, `Password` ) VALUES ('$name', '$email', '$password');
        ");
        $qa2 = mysqli_fetch_assoc(mysqli_query($conn, "
            SELECT * FROM `Users` WHERE `Email` = '$email';
        ")); 
        $i = $qa2['Id'];
        $name= $qa2['Name'];
        setcookie("name", "$name");
        setcookie("id", "$i");
        setcookie("email", "$email");
        setcookie("password", "$password");
        exit("<meta http-equiv='refresh' content='0; url= /'>");
        
        
        
    }
}
// Auth
if(isset($_POST['auth_check'])){
    $email= $_POST['email'];
    $password= md5($_POST['password']);
    $qa1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `Users` WHERE `Email` = '$email';")); 
    if($qa1['Password'] == $password){
        $i = $qa1['Id'];
        $name= $qa1['Name'];
        setcookie("name", "$name");
        setcookie("id", "$i");
        setcookie("email", "$email");
        setcookie("password", "$password");
        exit("<meta http-equiv='refresh' content='0; url= /'>");    
    }
    echo "<script>alert('Неверный логин или пароль!')</script>";
}

// Profile
if(isset($_GET['Профиль'])){
    if(isset($_GET['id']) && isset($_COOKIE['id'])){
        if($_COOKIE['id'] == $_GET['id']){
            $id = $_COOKIE['id'];
            $my_profile = true;
        }
        else{
            $my_profile = false;
            $id = $_GET['id'];
        }
    }
    else if ((isset($_GET['id']))){
        $my_profile = false;
        $id = $_GET['id'];
    }
    else if(isset($_COOKIE['id'])){
        $my_profile = true;
        $id = $_COOKIE['id'];
    }
    else{
        exit("<meta http-equiv='refresh' content='0; url= /'>");
    }
    $q = mysqli_query($conn, "SELECT * FROM `Users` WHERE `Id` = '$id';");
    $row = mysqli_fetch_assoc($q);
    $name = $row['Name'];
    $email = $row['Email'];
}
// Update profile
if(isset($_POST['update_check'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $id = $_COOKIE['id'];
    mysqli_query($conn, "UPDATE `Users` SET `Name` = '$name', `Email` = '$email' WHERE `Id` = '$id';");
    $qa2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `Users` WHERE `Email` = '$email';"));
    $i = $qa2['Id'];
    $name= $qa2['Name'];
    setcookie("name", "$name");
    setcookie("id", "$i");
    setcookie("email", "$email");
    exit("<meta http-equiv='refresh' content='0; url= /'>");    

}

if(isset($_POST['create_check'])){
    $link = $_POST['link'];
    $shorten_link = $_POST['shorten_link'];	
    // $shorten_link = str_replace("https://avazbek.click/?/", "", $shorten_link);
    // $shorten_link = str_replace(".", "_", $shorten_link);
    
    $id = $_COOKIE['id'];


    mysqli_query($conn, "
        INSERT INTO `Links` (`Link`, `Shorten_link`, `Id_user`) VALUES ('$link', '$shorten_link', '$id');
    ");
    exit("<meta http-equiv='refresh' content='0; url= /'>");
}