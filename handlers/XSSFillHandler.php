<!-- ************************************  -->
<!--   ОБРАБОТЧИК ЗАПОЛНЕНИЯ ТАБЛИЦЫ XSS   -->
<!-- ************************************  -->
<?php    
    $count=$_POST['count_table'];
    $parsedInt = (int)$count;          
    
    $mysql = new mysqli('localhost','root','root','register_bd');    
    
    $login=$_COOKIE['user'];
    $password =$_COOKIE['userPass']; 
    
    $result = $mysql->query(
        "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'"
    );
    $mysql->close();
    $mysql = new mysqli('localhost','root','root','register_bd');    


    $user = $result->fetch_assoc();

    // print "login= ".$login;
    // print "password= ".$password;        
    $TableName = "table_".$user['id']; 
    // print $count."; TableName=".$TableName."; login=".$login."; password=".$password; 
    
    
    // $call = $mysqli->prepare('CALL test_proc(?, ?, ?, @sum, @product, @average)');
    // $call->bind_param('iii', $procInput1, $procInput2, $procInput3);
    // $call->execute();
    
    // $mysql->query("set @count='$count'");
    // $mysql->query("set @TableName='$TableName'");
    // $mysql->query("set @TableName='$TableName'");
    $mysql->query("CALL fill_usertable ('$TableName', '$count');");
    // $mysql->query("CALL fill_usertable (@TableName, CAST(@count AS UNSIGNED));");

    // $mysql->query(
    //     "CALL fill_usertable($TableName, $count)"
    //     // "call abc();"
    // );

    $mysql->close();
    
    echo "table=".$TableName."; "."count=".$count;
    
    // // Находим запись пользователя из таблицы по логину и паролю(Хэшированному)
    // $result = $mysql->query(
    //     "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'"
    // );
    // // Конвертируем запись о пользователе в массив и помещаем в переменную user
    // $user = $result->fetch_assoc();
    // // Соберём название для пользовательской таблицы
    // $tablename = "table"."_".$user['id'];
    // // От имени админа создаём личную таблицу юзеру
    // $mysql->query(        
    //     "CREATE TABLE $tablename (id INT PRIMARY KEY, nickname VARCHAR(25), feedback VARCHAR(100));"        
    // );

    // // Запускаем сессию для передачи названия таблицы на страницу XSS
    // session_start();  
    // $x=$tablename;
    // $_SESSION['s']=$x;

    // $mysql->close();
    // header('Location: /site/XSS.php');



    // Проверка пользователя в таблице юзеров
    // if($user == null) {
    //     echo "Такой пользователь не найден!";
    // } else {
    //     print_r($user);
    // }
    
    // // Устанавливаем файлы куки для хранения имени юзера(будут жить 1 час)
    // // 4й параметр со значением "/" даёт действовать куки на всех страницах сайта
     


    // var_dump([1,2,3,4]);
    // header('Location: /site/choosing.php');
?>