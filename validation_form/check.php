<?php
    // В глобальные значения полей помещаем отфильтрованные от ненужных символов и пробелов значения(фильтром FILTER_SANSIZE_STRING)
    // А также в фильтруемом значении оператор $_POST для определения метода передачи данных(post или get)
    $login=filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $name=filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $password =filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
    // Проврека длины логина
    if(mb_strlen($login) < 3 || mb_strlen($login) > 30) {
        echo "Недопустимая длина логина";
        exit();
    } else if(mb_strlen($name)<3 || mb_strlen($name)>20) {
        echo "Недопустимая длина имени";        
        exit();
    } else if(mb_strlen($password)<3 || mb_strlen($password)>10) {
        echo "Недопустимая длина пароля (от 3 до 10)";        
        exit();
    }

    // Хэширование пароля
    $password = md5($password."qj39xr4y29yzdq293dj");
    // В переменной будет лежать подключение к БД(хост, имя, пароль, название БД)
    $mysql = new mysqli('localhost','root','root','register_bd');
    // query - Функция принимающая SQL-запрорс(будем добавлять нового юзера в таблицу юзеров)
    $mysql->query(
        "INSERT INTO `users` (`login`, `password`, `name`) VALUES('$login', '$password', '$name')"
    );
    // Обязательно закрываем соединение
    $mysql->close();
    echo "Пользователь добавлен!";
    // Переадресация обратно на страницу с формой
    header('Location: /site');
?>