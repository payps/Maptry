<?php

$connection=mysqli_connect ("localhost", 'root', '','jctry');
if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}

