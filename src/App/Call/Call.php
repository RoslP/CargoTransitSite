<?php
if (isset($_POST['button-reg'])) {
    (new DataProcessing())->registration();
}
elseif (isset($_POST['button-auth']))
{
  (new DataProcessing())->authenticate();
}

elseif (isset($_POST['post-data-in-lk']))
{
    (new DataProcessing())->TakeOllDataInUsers();
}