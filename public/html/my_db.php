<?php 
	$conn = mysqli_connect($host, $user, $pass, $db_name);
	mysqli_set_charset($conn,"utf8");
	$q = 'SELECT `value` FROM `values` WHERE name = ';
    // $result_main = mysqli_query($conn, "SELECT * FROM `products`");
    // = mysqli_fetch_assoc($query_main_site)
    $i_am['mail'] = mysqli_fetch_assoc(mysqli_query($conn, $q."'mail'"))['value'];
	$i_am['my_mail'] = mysqli_fetch_assoc(mysqli_query($conn, $q."'my_mail'"))['value'];
	$i_am['my_pass'] = mysqli_fetch_assoc(mysqli_query($conn, $q."'my_pass'"))['value'];
	$subject_mail = mysqli_fetch_assoc(mysqli_query($conn, $q."'subject_mail'"))['value'];
	$body_mail = mysqli_fetch_assoc(mysqli_query($conn, $q."'body_mail'"))['value'];
	$mail_success = mysqli_fetch_assoc(mysqli_query($conn, $q."'mail_success'"))['value'];
	$company_name = mysqli_fetch_assoc(mysqli_query($conn, $q."'company_name'"))['value'];