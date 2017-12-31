<?php session_start();
include './connect.php';
ob_start();
$user_name_return = '';
$user_type_return = '';
$user_id_return = '';
$error = '';
 if(isset($_POST['loginSubmit'])){
        $userName = $_POST['username'];
        $psw = $_POST['password'];
    //SELECT * FROM `users` WHERE `userEmail``userPsw``userRole`
        $active= 'active';
        $sql = "SELECT * FROM users WHERE `userEmail` = '$userName' AND `userPsw` = '$psw'  AND `userstatus` = '$active'";
        $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $user_name_return = $row  ['userName'];
                $password_return  = $row  ['userPsw'];
                $user_role_return = $row  ['userRole'];
                $user_id_return   = $row  ['userId'];
                $companyName      = $row  ['companyName'];
            }
            //if($user_name_return == $userName AND $password_return == $psw){
                $_SESSION['userName'] = $user_name_return;
                $_SESSION['userRole'] = $user_role_return;
                $_SESSION['userId']   = $user_id_return;
                $_SESSION['companyName']   = $companyName;
                    header('Location:admin/dashboard.php',true, 301);
            //}
            /*else{
                $error = '</br><h4 style="color:red;">Your User Name And Password Not Correct</h4><br>';
            }*/
    }
?>
<?php include './header.php'; ?><!--Connect Header--->
<!--Login Form-->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Login</h2>
        <br>
        <?php echo $error; ?>
        <form name="loginForm" action="" method="post">
            <div class="form-group">
                <label for="username">Email address:</label>
                <input type="email" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password" id="pwd" required>
            </div>
            <button type="submit" name="loginSubmit" class="btn btn-default">Submit</button>
        </form> 
    </div>
</div>

<?php include './footer.php'; ?><!--Connect Footer-->
