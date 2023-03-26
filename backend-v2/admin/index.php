<?php
include './config/db.config.php';

session_start();
if (!isset($_SESSION['login_user_id'])) {
    header('location:./user-login.php');
}

$page = (isset($_GET['page']) ? $_GET['page'] : 'home');
$_SESSION['title'] = $page;

include './head.components.php';
include './layout-top.components.php';

if (!file_exists($page . '.php')) {
    include '404.php';
} else {
    include $page . '.php';
}

include './layout-bottom.components.php';

include './bottom.components.php';