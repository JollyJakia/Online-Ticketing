<?php
include './header.php';

?><!--Connect Header--->
<h1 class="page-header">Dashboard</h1>
<?php

?>
<?php
$userRole = '';
$userRole = $_SESSION['userRole'];
if($userRole == 'superadmin'){
    include './particular/superAdminDashBord.php';
}
if($userRole == 'busOwner'){
    include './particular/busOwner.php';
}
if($userRole == 'user'){
    include './particular/userDashBord.php';
}
?>
<?php include './footer.php'; ?><!--Connect Footer-->