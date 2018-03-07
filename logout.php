<?php 
session_start();
unset($_SESSION['username']);
session_destroy();
location.reload();
?>