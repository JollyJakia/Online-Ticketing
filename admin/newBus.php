<?php
include './header.php';
if(isset($_POST['newBusSubmit'])){

    $status =$_POST['newBus'];
    $busOwner = $_POST['busOwner'];
    $country = $_POST['country'];
    $companyName = $_POST['companyName'];
    $totalBuses =$_POST['totalBuses'];
    $ownerName = $_POST['ownerName'];
    $companyEmail =$_POST['companyEmail'];
    $psw = $_POST['psw'];
    $companyPhone = $_POST['companyPhone'];
    $companyAddress = $_POST['companyAddress'];

    $sql= "SELECT * FROM users WHERE userEmail = '".$companyEmail."' ";
    $query = $conn->query($sql)or die($conn->error());
    $duplicate = $query->num_rows;
    if($duplicate >= 1){
        echo '</br><h4 style="color:red;">'.$companyEmail.'&nbsp;The Email is already present..!! </h4>';
    }
    else{
        $insert = "INSERT INTO users (userName, userEmail, userPsw, userRole, userstatus, address, country, phone, totalBus, companyName) 
                  VALUES ('$ownerName','$companyEmail','$psw','$busOwner','$status','$companyAddress','$country','$companyPhone','$totalBuses','$companyName')";
        $result = $conn->query($insert);
        echo '</br><h4 style="color:green;">Your Details Are Submited</h4>';
    }

}
?><!--Connect Header--->
<h1 class="page-header">Add New Buses</h1>
<div class="row">
    <div class="col-md-4">
        <form method="post" name="newBusForm" action="">
            <input type="hidden" value="active" name="newBus"/>
            <input type="hidden" value="busOwner" name="busOwner"/>
            <input type="hidden" value="Bangladesh" name="country"/>
            <div class="form-group">
                <labe for="companyName">Bus Company Name</labe>
                <input type="text"  class="form-control" id="companyName" name="companyName"/>
            </div>
            <div class="form-group">
                <labe for="totalBuses">Total Buses</labe>
                <input type="number"  class="form-control" id="totalBuses" name="totalBuses"/>
            </div>
            <div class="form-group">
                <labe for="ownerName">Bus Owner Name</labe>
                <input type="text"  class="form-control" id="ownerName" name="ownerName"/>
            </div>
            <div class="form-group">
                <labe for="companyEmail">Bus Company Email</labe>
                <input type="text"  class="form-control" id="companyEmail" name="companyEmail"/>
            </div>
            <div class="form-group">
                <labe for="psw">Password</labe>
                <input type="password"  class="form-control" id="psw" name="psw"/>
            </div>
            <div class="form-group">
                <labe for="companyPhone">Bus Company Phone</labe>
                <input type="text"  class="form-control" id="companyPhone" name="companyPhone"/>
            </div>
            <div class="form-group">
                <labe for="companyAddress">Bus Company Address</labe>
                <input type="text"  class="form-control" id="companyAddress" name="companyAddress"/>
            </div>
            <div class="form-group">
                <button type="submit" name="newBusSubmit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php include './footer.php'; ?><!--Connect Footer-->