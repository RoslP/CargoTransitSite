<?php
include 'app/controllers/users.php';
if (isset($_POST['button-reg'])) {
    (new DataProcessing())->registration();
}