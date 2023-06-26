<!-- ****************** -->
<!-- МОДУЛЬ РЕГИСТРАЦИИ -->
<!-- ****************** -->
<?php
    // В глобальные значения полей помещаем отфильтрованные от ненужных символов и пробелов значения(фильтром FILTER_SANSIZE_STRING)
    // А также в фильтруемом значении оператор $_POST для определения метода передачи данных(post или get)
    $name=filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $surname=filter_var(trim($_POST['surname']),
    FILTER_SANITIZE_STRING);
    $phone=filter_var(trim($_POST['phone']),
    FILTER_SANITIZE_STRING);
    $login=filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $password =filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
    echo "Недопустимая длина логина ".$login.$password.$name.$phone.$surname;
    // Проврека длины логина
    // if(mb_strlen($login) < 3 || mb_strlen($login) > 30) {
    //     echo "Недопустимая длина логина ".mb_strlen($login).mb_strlen($password).mb_strlen($name).mb_strlen($phone).mb_strlen($surname);
    //     exit();
    // } else if(mb_strlen($name)<3 || mb_strlen($name)>20) {
    //     echo "Недопустимая длина имени";        
    //     exit();
    // } else if(mb_strlen($password)<3 || mb_strlen($password)>10) {
    //     echo "Недопустимая длина пароля (от 3 до 10)";        
    //     exit();
    // } else if(mb_strlen($surname)<3 || mb_strlen($surname)>15) {
    //     echo "Недопустимая длина фамилии (от 3 до 15)";        
    //     exit();
    // }
    // else if(mb_strlen($phone)<3 || mb_strlen($phone)>11) {
    //     echo "Недопустимая длина номера телефона (от 3 до 11)";        
    //     exit();
    // }

    // Хэширование пароля
    $password = md5($password."qj39xr4y29yzdq293dj");
    // В переменной будет лежать подключение к БД(хост, имя, пароль, название БД)
    $mysql = new mysqli('localhost','root','root','register_bd');
    // query - Функция принимающая SQL-запрорс(будем добавлять нового юзера в таблицу юзеров и его уч запись в БД)
    $mysql->query(
        "INSERT INTO `users` (`login`, `password`, `name`, `surname`, `phone`) VALUES('$login', '$password', '$name', '$surname', '$phone')"
    );
    $mysql->query(
        "CREATE USER '$login'@'localhost' IDENTIFIED BY '123';"
    );
    // Обязательно закрываем соединение
    $mysql->close();
    // echo "Пользователь добавлен!";
    // Переадресация обратно на страницу с формой
    // exit();
        // Куки удаляются
    // setcookie('user', $user['name'], time() - 3600, "/");
    // header('Location: /site');
    header('Location: /site/choosing.php');
?>