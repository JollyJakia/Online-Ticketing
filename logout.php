<?php
session_start();
include("connect.php");

if (session_destroy()){

    header('Location:index.php');
}

include("header.php");
?>