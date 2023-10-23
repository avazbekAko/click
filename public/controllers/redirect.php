<?php
if($method === "GET"){
    $sql = "SELECT * FROM links WHERE shorten_link = '$route'";
    $stmt = $db->prepare($sql.";");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $link = $result[0]['link'] ?? "/404";
    exit("<meta http-equiv='refresh' content='0; url= $link'>");
    // echo $result[0]['link'];
}