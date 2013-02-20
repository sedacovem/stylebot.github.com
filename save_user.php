
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Турбины</title>
<meta http-equiv="Content-Language" content="ru" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    if (isset($_POST['rost'])) { $rost = $_POST['rost']; if ($rost == '') { unset($rost);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['ves'])) { $ves=$_POST['ves']; if ($ves =='') { unset($ves);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($rost) or empty($ves)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $rost = stripslashes($rost);
    $rost = htmlspecialchars($rost);
 $ves = stripslashes($ves);
    $ves = htmlspecialchars($ves);
 //удаляем лишние пробелы

 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

   
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO one (rost,ves) VALUES('$rost','$ves')");
	// Проверяем, есть ли ошибки
	    if ($result2=='TRUE')
	    {
	    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
	    }
	 else {
	    echo "Ошибка! Вы не зарегистрированы.";
	    }
	    
    ?>
<body>
</html>
