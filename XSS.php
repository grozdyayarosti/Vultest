<!-- ****************** -->
<!--     ФОРМА XSS      -->
<!-- ****************** -->
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
        <a href="choosing.php" class='choosing_btn'>Выход</a>
        <div class="choosing_header_container">
            <h1 class="choosing_header">
                Уязвимость "XSS"
            </h1>
        </div>
        <div class="XSS_container_inner">
            <div class="description_container">
                <h1 class="description_header">Описание</h1>
                <div class= 'triangle_left'></div>
                <div class='description'>
                    /Здесь описание уязвимости/
                </div>
            </div>
            <div class="instruction_container">
                <h1 class="instruction_header">Инструкция</h1>
                <div class= 'triangle_left'></div>
                <div class='instruction'>
                    /Здесь инструкция по уязвимости/
                </div>
            </div>
        </div>
        <div class='table_container'>
            <div class='redactor_table_box'>
                <h1 class='redactor_head'>Заполнение таблцы данными</h1>
                <div class='choose_count'>
                    <p class='choose_count_sign'>Кол-во записей:</p>
                    <input type='number' id='count_table' min='0' max='1000'></input>
                </div>
                <button class='btn_input'>Заполнить</button>
            </div>
            <div class='table_box'>
                <p>Название таблицы:</p>
                <table>
                    <tr>
                        <th>id</th>
                        <th>nickname</th>
                        <th>feedback</th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="split"></div>
        <!--ЗДЕСЬ ЕЩЁ БУДЕТ РАЗМЕТКА-->
        <div class="split"></div>
        <h1>Отзывы</h1>
        <div class='review_container'>
            <div class='review_box'>
                <img class='avatar' src="img/avatar.jpg" alt='avatar'></img>
                <div class='review_sign'>
                    <p class='review_nick'>Fadf</p>
                    <p class='review_text'>lo</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>