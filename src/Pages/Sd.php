<?php
session_start();
unset($_SESSION['id_users']);
unset($_SESSION['login']);
unset($_SESSION['is_manager']);
session_destroy();
header('location: ' . '/index.php');