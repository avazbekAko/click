<?php

if($method === "POST"){
    $link = $_POST['link'];
    $shorten_link = $_POST['shorten_link'];	
    // $shorten_link = str_replace("https://avazbek.click/?/", "", $shorten_link);
    // $shorten_link = str_replace(".", "_", $shorten_link);
    
    $id = $_COOKIE['id'] ?? null;
    
    if(isset($id)){
        $sql = "INSERT INTO links (link, shorten_link, id_user) VALUES ('$link', '$shorten_link', '$id')";
        $stmt = $db->prepare($sql.";");
        $stmt->execute();
        exit("<meta http-equiv='refresh' content='0; url= /'>");
    }

    echo "<script>alert('Вы не авторизованы!')</script>";
}

if($method === "GET" || $method === "POST"){
    require './html/main.php';
}