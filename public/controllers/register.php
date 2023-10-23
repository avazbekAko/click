<?php

// Register
if($method === "POST"){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= md5($_POST['password']);
    $password_2 = md5($_POST['password_confirmation']);
    
    // $result = mysqli_fetch_assoc(ysqli_query($conn, "SELECT * FROM Users WHERE Email = '$email';")); 
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmt = $db->prepare($sql.";");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result !== []){
        echo "<script>alert('Пользователь с таким email уже существует!')</script>";
    }
    else if($password!= $password_2){
        echo "<script>alert('Пароли не совпадают!')</script>";
    }
    else{
        $sql = "INSERT INTO users (name, email, password ) VALUES ('$name', '$email', '$password')";
        $stmt = $db->prepare($sql.";");
        $stmt->execute();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $db->prepare($sql.";");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i = $result[0]['id'];
        $name= $result[0]['name'];
        setcookie("name", "$name");
        setcookie("id", "$i");
        setcookie("email", "$email");
        setcookie("password", "$password");
        exit("<meta http-equiv='refresh' content='0; url= /'>");        
    }
}

if($method === "GET" || $method === "POST"){
    require "./html/register.php";
}