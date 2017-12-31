<?php 
    include './header.php'; 
    include './connect.php';
    
    if(isset($_POST['regBtn'])){
        $status = $_POST['status'];
        $userType = $_POST['userType'];
        $name = $_POST['name'];
        $email =$_POST['email'];
        $psw = $_POST['psw'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        $sql= "SELECT * FROM users WHERE userEmail = '".$email."' ";
        $query = $conn->query($sql)or die($conn->error());
        $duplicate = $query->num_rows;
        if($duplicate >= 1){
            echo '</br><h4 style="color:red;">'.$email.'&nbsp;The Email is already present..!! </h4>';
        }
        else{
            $insert = "INSERT INTO users (userName, userEmail, userPsw, userRole, userstatus, address, country, phone, totalBus, companyName) 
                      VALUES ('$name','$email','$psw','$userType','$status','$address','','$phone','','')";
            $result = $conn->query($insert);
            echo '</br><h4 style="color:green;">Your Details Are Submited</h4>';
        }
        
    }
?><!--Connect Header--->

<!--Login Form-->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Registration Form</h2>
        <br>
        <form method="post" name="regForm" action="">
            <input type="hidden" value="active" name="status"/>
            <input type="hidden" value="user" name="userType"/>
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required="required">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required="required">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="psw" required="required" name="psw">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" required="required" name="address">
            </div>
            <button type="submit" class="btn btn-default" name="regBtn">Submit</button>
        </form> 
    </div>
</div>

<?php include './footer.php'; ?><!--Connect Footer-->
