<?php
require 'app/database/connect.php';
session_destroy();
header('location: ' . '/index.php');