<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

            #Page {
                padding: 10px;
                background-color: #fff;
                border-radius: 10px;
                font-size: 13pt;
                line-height: 2em;
                color: #222;
                font-family: "Comic Sans MS";
                margin-left: auto;
                margin-right: auto;
                width: 80%;
            }

            #Comments{
                padding: 10px;
                background-color: #fff;
                border-radius: 10px;
                font-size: 13pt;
                line-height: 2em;
                color: #222;
                font-family: "Comic Sans MS";
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                width: 80%;
            }

            html, body {
                background-color: #e6e6e6;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="content title m-b-md">Test</div>
            <div class="content">
                <div id="Page">
                          <p>Заголовок!
                            <br>
                            1⚡ Здесь какой-то текст.
                            <br>
                            2⚡ И здесь какой-то текст.
                            <br>
                            3⚡ А здесь могла бы быть ваша реклама.
                            <br>
                            4⚡ Снова текст.
                            <br>
                            5⚡ Текст. 
                          </p><p>Еще заголовок!
                            <br>
                            1⚡ Текст
                            <br>
                            2⚡ Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. Текст. 
                            <br>
                </div>
                <div id="Comments">
                    <form name="comment" method="post">
                    <p>
                    <label>Ваше имя:</label>
                    <input type="text" name="name" />
                    </p>
                    <p>
                    <label>Ваш комментарий:</label>
                    <br />
                    <textarea name="text_comment" cols="30" rows="50"></textarea>
                    </p>
                    <p>
                    <input type="hidden" name="page_id" value="1" />
                    <input type="submit" value="Отправить комментарий" />
                    </p>
                    </form>

                    <?php
                        $page_id = 1;// Уникальный идентификатор страницы (статьи или поста)
                        $mysqli = new mysqli("localhost", "root", "root", "mysql1");// Подключается к базе данных
                        $result_set = $mysqli->query("SELECT * FROM `comments` WHERE `page_id`='$page_id'"); //Вытаскиваем все комментарии для данной страницы
                        while ($row = $result_set->fetch_assoc()) {
                        print_r($row); //Вывод комментариев

                        echo "<br />";
                        }
                    ?>

<?php
        if(!isset($_GET['body'], $_GET['title']))
        die('Пришли не все данные');
        /* Принимаем данные из формы */
        $name = $_POST["name"];
        $page_id = $_POST["page_id"];
        $text_comment = $_POST["text_comment"];
        $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
        $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
        $mysqli = new mysqli("localhost", "root", "root", "mysql1");// Подключается к базе данных
        $mysqli->query("INSERT INTO `comments` (`name`, `page_id`, `text_comment`) values ('$name', '$page_id', '$text_comment')");// Добавляем комментарий в таблицу
        header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем редирект обратно
        ?>
                </div>
            </div>
    </body>
</html>
