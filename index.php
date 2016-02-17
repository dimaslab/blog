<?php
session_start();
header ('Content-type: text/html; charset=UTF-8');
$mysqli= new mysqli('localhost', 'root','') or die('cannot connect to datebase');
$mysqli->select_db('blog') or die('Cannot select database');
$mysqli->set_charset( 'utf8' );
mb_internal_encoding('UTF-8');
$act = isset($_GET['act']) ? $_GET['act'] : 'list';

define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

switch ($act){
    case 'list':
        $records = array();
        $sel = $mysqli->query('SELECT * FROM entry');
        while ($row = $sel->fetch_assoc()) {
           $row['date']=date('H:i d-m-Y ');
            if (mb_strlen($row['content']) > 100) {
                $row['content'] = mb_substr(strip_tags($row['content']), 0,97) . '...';
            }
            $row['content'] = nl2br($row['content']);
            $row['header'] = htmlspecialchars($row['header']);
            $records[] = $row;
        }
        require ('templates/list.php');
        break;
    case 'view-entry':
        if (!isset($_GET['id'])) die("Запись не найдена");
        $id = intval($_GET['id']);

        $row = $mysqli->query("SELECT * FROM entry WHERE id = $id")->fetch_assoc();
        if (!$row) die("Нет такой записи");

        $row['date']=date('H:i d-m-Y ');
        $row['content'] = nl2br($row['content']);
        $row['header'] = htmlspecialchars($row['header']);

        require ('templates/entry.php');
        break;
    case 'login':
        require ('templates/login.php');
        break;
    case 'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location: .');
        break;
    case 'do-login':

      if ($_POST['login'] == 'login' && $_POST['password'] == '123') {
            $_SESSION['IS_ADMIN'] = true;
             header('Location: .');
       }else {
       header('Location: ?act=login');
      }
      break;
    default:
        die("Нет такого действия");
}
