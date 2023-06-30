<!-- ************************************************************************ -->
<!--                             ФОРМА SQLi                                   -->
<!-- ************************************************************************ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>NIR</title>
</head>

<body>
    <div class="XSS_container">

        <a href="handlers/SQLiHandlers/SQLiExitHandler.php" class='choosing_btn'>Выход</a>

        <div class="choosing_header_container">
            <h1 class="choosing_header">
                Уязвимость "SQL injection"
            </h1>
        </div>

        <div class="XSS_container_inner">
            <div class="description_container">
                <h1 class="description_header">Описание</h1>
                <div id="description" class='triangle_left'></div>
                <div id="description_sign" class='description'>
                    /Здесь описание уязвимости/
                </div>
            </div>
            <div class="instruction_container">
                <h1 class="instruction_header">Инструкция</h1>
                <div class='triangle_left'></div>
                <div id="instruction" class='instruction'>
                    /Здесь инструкция по уязвимости/
                </div>
            </div>
        </div>

        <div class="split"></div>

        <div class='table_container'>

            <div class='redactor_table_box'>
                <h1 class='redactor_head'>Заполнение таблицы</h1>

                <form id='add_table' action='' method='post' class='choose_count'>
                    <p class='choose_count_sign'>Кол-во записей:</p>
                    <input type='number' name='count_table' id='count_table' min='0' max='50'></input>
                    <button id='add_count' type='submit' class='btn_input'>Заполнить</button>
                </form>

            </div>

            <div class='table_box'>
                <p>Название таблицы:</p>
                <!-- С помощью сессии принимаем название таблицы -->
                <p>
                    <?php
                    $TableName = $_COOKIE['cookTableName'];
                    echo $TableName;
                    ?>
                </p>
                <table>
                    <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>password</th>
                    </tr>
                    <!-- Рисуем сгенерированную таблицу уч записей -->
                    <?php
                    $mysql = new mysqli('localhost', 'root', 'root', 'register_bd');
                    $TableName = $_COOKIE['cookTableName'];
                    for ($i = 1; $i <= $_COOKIE['count']; $i++) {
                        $result = $mysql->query(
                            "SELECT * FROM $TableName WHERE id=$i LIMIT 1;"
                        );
                        $user = $result->fetch_assoc();
                        $userLogin = $user['login'];
                        // Удаляет символы < > в пароле                      
                        $userPassword=str_replace(['<','>'],'',$user['password']);                         
                        echo '<tr>';
                        echo '<td>' . "$i" . '</td>';
                        echo '<td>' . "$userLogin" . '</td>';
                        echo '<td>' . "$userPassword" . '</td>';
                        echo '</tr>';
                    }
                    $mysql->close();
                    ?>

                </table>
            </div>

        </div>

        <div class="split"></div>

        <div class='choose_work_box'>
            <button id="atack_btn">Атака</button>
            <button id="defense_btn">Защита</button>
        </div>

        <form id="pass_form" class="none_active" method="post" action="" style="width:100%">
            <div class="regular_container none_active">
                <p>Регулярное выражение:</p>
                <input type="text" id="regular" name="regular" class="input_box" />
            </div>
            <div class="regular_container">
                <p>Логин:</p>
                <input type="text" id="login" name="login" class="input_box" />
            </div>
            <div class="regular_container">
                <p>Пароль:</p>
                <input type="text" id="pass" name="pass" class="input_box" />
            </div>
            <button style="margin-left: 850px;" id="add_pass" class='btn_input' type="submit">Войти</button>
        </form>

        <div class="split"></div>

        <?php
            if (isset($_COOKIE['CookUserFound'])) {
                if ($_COOKIE['CookUserFound']) {
                    echo '<h1 class="log_sign_complete">';
                    echo 'Поздравляю! Вы вошли под пользователем: <p>'.$_COOKIE['CookAccLogin'].'</p>';
                    echo '</h1>';
                } else {
                    echo '<h1 class="log_sign_error">';
                    echo 'Ошибка!';
                    echo 'Пользователя с таким ником: <p>'.$_COOKIE['CookAccLogin'].'</p>';
                    echo 'И паролем : <p>'.$_COOKIE['CookAccPassword'].'</p>';
                    echo 'Не существует!';
                    echo '</h1>';
                }

            }
        ?>
        
    </div>
</body>
<script src="jscript\SQLi.js"></script>

</html>