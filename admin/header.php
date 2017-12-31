<?php
session_start();
include '../connect.php';
if(!isset($_SESSION['userName']) || !isset($_SESSION['userRole']) || !isset($_SESSION['userId'])){
    header('Location:../login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Online Ticketing System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/datepicker.css"/>
    <link rel="stylesheet" href="css/style.css"/>

    
  </head>

  <body>
      <!-- Static navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">Ticketing</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar collapse" id="navbar">

            <ul class="nav nav-sidebar">
                <li><a href="dashboard.php">Dashboard</a></li>
                 <?php
                    $userRole = '';
                    $userRole = $_SESSION['userRole'];
                    if($userRole == 'superadmin'){
                        echo '<li><a href="newBus.php">Add New Bus</a></li>';
                    }
                    elseif($userRole == 'busOwner'){
                        echo '<li><a href="addBusTicket.php">Add Bus Tickets</a></li>';
                    }
                    else{
                         echo '<li><a href="ticketBuy.php">Buy Tickets</a></li>';
                    }
                ?>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            
        