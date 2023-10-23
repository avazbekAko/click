<?php
if($method === "POST"){
    $email= $_POST['email'];
    $password= md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmt = $db->prepare($sql.";");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result[0]['password'] == $password){
        $i = $result[0]['id'];
        $name= $result[0]['name'];
        setcookie("name", "$name");
        setcookie("id", "$i");
        setcookie("email", "$email");
        setcookie("password", "$password");
        exit("<meta http-equiv='refresh' content='0; url= /'>");    
    }
    echo "<script>alert('Неверный логин или пароль!')</script>";
}

if($method === "GET" || $method === "POST"){
    require "./html/auth.php";
}