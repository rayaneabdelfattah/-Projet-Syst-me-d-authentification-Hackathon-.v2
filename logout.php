<?php

session_start();


session_unset();



session_destroy();

// obvious.
header('location: login.php');
exit;
