<?php
    require 'config.php';
    require 'my_db.php';
    require 'check.php';
    // require 'mail.php';
	
	if(isset($_GET['Создать'])){
		require 'main.php';
	}
	else if(isset($_GET['Выход'])){
		setcookie("name", "", time() - 3600);
		setcookie("id", "", time() - 3600);
		setcookie("email", "", time() - 3600);
		setcookie("password", "", time() - 3600);
		exit("<meta http-equiv='refresh' content='0; url= /'>");
	}

	else if(isset($_GET['Вход']) && !isset($_COOKIE['id'])){
		require 'auth.php';
	}
	
	else if(isset($_GET['Регистрация']) && !isset($_COOKIE['id'])){
		require 'register.php';
	}
	else if(isset($_GET['Профиль'])){
		require 'profile.php';
	}
	else if(isset($_GET['test'])){
		require "qr.php";
	}

	else {
		$data = $_GET;
		$key = key($data); // Получаем первый ключ массива
		$value = trim($key, '[]'); // Удаляем квадратные скобки и обрезаем пробелы
		
		// print_r($value);

		if(($value == ""))
			exit("<meta http-equiv='refresh' content='0; url= /?Создать'>");

		$value = "https://avazbek.click/?$value";

		// print_r($value);

		$q = mysqli_query($conn, "SELECT * FROM `Links` WHERE `Shorten_link` = '$value';");
		$row = mysqli_fetch_assoc($q);
		$link = $row['Link'];
		exit("<meta http-equiv='refresh' content='0; url= $link'>");
		// print_r($link);
	}
?>