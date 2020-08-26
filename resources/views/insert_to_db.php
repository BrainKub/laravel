<?php
        $mysqli = new mysqli("localhost", "root", "root", "mysql1");// Подключается к базе данных
        $mysqli->query("INSERT INTO `comments` (`name`, `page_id`, `text_comment`) values ('$name', '$page_id', '$text_comment')");//
?>