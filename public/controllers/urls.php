<?php
if($method === "GET"){
    $sql = "SELECT 
                id, 
                _(name) as name
            FROM store_types 
            WHERE 1 = 1";

    if(isset($data["id"])){
        $id = $data["id"];
        $sql.="  and id = $id";
    }

    $stmt = $db->prepare($sql.";");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Выводим массив на экран
    $data["data"] = $result;
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if($method === "POST"){
    if(!(isset($data["name"]))){
        // Если не удалось найти обязательныеи элементы, выдаём ошибку
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("error" => "Invalid data"));
        return;
    }

    $name = $data["name"];

    $sql = "INSERT INTO public.store_types (name) VALUES (_i('$name'))";

    $stmt = $db->prepare($sql.";");
    $stmt->execute();
    $data["id"] = ($db->lastInsertId());
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if($method === "PUT"){
    if(!(isset($data["name"]) && isset($data["id"]))){
        // Если не удалось найти обязательныеи элементы, выдаём ошибку
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("error" => "Invalid data"));
        return;
    }

    $id = $data["id"];
    $name = $data["name"];

    $sql = "UPDATE public.store_types SET name = _u(name, '$name') WHERE id = $id";
    $stmt = $db->prepare($sql.";");
    $stmt->execute();

    echo json_encode($data, JSON_PRETTY_PRINT);
}