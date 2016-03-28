<?php
session_start(); // начало сессии: если сессии еще нет 
// (не пришел Cookie "PHPSESSID" или нет файла сессии, 
//  соответствующего значению cookie "PHPSESSID"), то:
//  1) генерируется уникальный идентификатор сессии;
//  2) устанавливается Cookie "PHPSESSID" со значением этого идентификатора
//  3) создается файл сессии с соответствующим идентификатору именем
//  4) инициализируется суперглобальный массив $_SESSION, который проецируется на файл сессии
//--- конфигурационные параметры ---
$db_drivername = "mysql"; // тип бд
$hostname = "localhost"; //адрес где находится сервер бд
$dbname = "web";// имя бд
$username = "root";//имя пользователя(админ)
$password = "";
//--- Создание PDO для соединения с сервером БД ---
$pdo = new PDO("{$db_drivername}:host={$hostname};dbname={$dbname}", $username, $password); 
//--- 1 параметр PDO: "mysql:host=localhost;dbname=weblabdb"
//--- 2 параметр PDO: "root"
//--- 3 параметр PDO: ""
$pdo->query("SET CHARACTER SET utf8"); // установка кодировки символов для текущего соединения с MySQL Server (для роспознавания символов)

require_once 'blocks/auth.php'; // требования наличия файла
?>
<html>
  <head>
    <title> Проведи время с пользой </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link media="print" rel="stylesheet" href="css/print.css"/>
    <link media="screen" rel="stylesheet" href="css/main.css"/>
  </head>
  <body>
    <div id="all">
      <div id="top">
        <?php include 'blocks/top.php'; ?>
      </div>
      <div id="other">
        <div id="leftblock">
          <?php include 'blocks/leftblock.php'; ?>
        </div>
        <div id="rightblock">
          <?php include 'blocks/rightblock.php'; ?>
        </div>
        <div id="content">
          <?php
          // Обрвботка html запросов
          $url = '\'' . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . '\'';
          $menu_item_result = $pdo->query("SELECT * FROM  `page` WHERE url=" . $url);
          if ($menu_item_result->rowCount() > 0) {
            $menu_item = $menu_item_result->fetch(PDO::FETCH_ASSOC);
            echo $menu_item['content'];
          } else {
            echo 'Неверный URL!!!';
          }
          ?>
        </div>
      </div>
    </div>    
    <script src="script/jquery-2.1.4.min.js"></script>
    <script src="script/main.js"></script>
  </body>
</html>
