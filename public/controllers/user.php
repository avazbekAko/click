<?php
if($method === "POST"){
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
    
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $stmt = $db->prepare($sql.";");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $name = $result[0]['name'];
    $email = $result[0]['email'];  
}

if($method === "GET" || $method === "POST"){
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
    
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $stmt = $db->prepare($sql.";");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $name = $result[0]['name'];
    $email = $result[0]['email'];
    
    require "./html/profile.php";
}