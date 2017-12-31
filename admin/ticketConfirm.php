<?php
ob_start();
include './header.php';
?><!--Connect Header-->
<h1 class="page-header">Ticket Confirm</h1>
<?php
    
    $username = '';
    $date = '';
    $routeForm = '';
    $routeTo = '';
    $departureTime = '';
    $arrivalTime = '';
    $companyName = '';
    $busCompanyName  ='';
    $totalSeat = '';
    $busNumber = '';
    $pickUPPoint = '';
    $pickUPTo = '';
    $ticketRate = '';
    $discount = '';
    $comID = '';
    $filleSeat = '';
    $busStopies = '';
    $pickUpPointFrom = '';
    $pickUpPointTo = '';
    $discountRate  = '';
    $middlePoint = '';
    $bookedSeat ='';
    $username = $_SESSION['userName'];
    $userID = $_SESSION['userId'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM bustickets WHERE id = '$id'";
    $result = $conn->query($sql) or die(mysqli_error());

       while($row = $result->fetch_assoc()){
           $date = $row  ['date'];
           $busID = $row  ['id'];
           $routeForm = $row  ['routeForm'];
           $routeTo = $row  ['routeTo'];
           $departureTime = $row  ['departureTime'];
           $arrivalTime = $row  ['arrivalTime'];
           $companyName = $row  ['companyName'];
           $totalSeat = $row  ['totalSeat'];
           $pickUPPoint = $row  ['pickUpPointFrom'];
           $pickUPTo = $row  ['pickUpPointTo'];
           $ticketRate = $row  ['ticketRate'];
           $discount = $row  ['discountRate'];
           $busNumber = $row  ['busNumber'];
           $middlePoint = $row  ['busStopies'];
           $departureTime = $row  ['departureTime'];
       }
       
       $totalTicketRate = $ticketRate * $totalSeat;
       
       if(isset($_POST['confirmTicket'])){
            $bookedSeat = $_POST['bookedSeat'];
            $availableSeat = $totalSeat - $bookedSeat;
            if($bookedSeat <= $totalSeat){
                $totalTicketRate = $ticketRate * $bookedSeat;
                $insertData = "INSERT INTO bokkingtable (userID, busID, totalSeat, routeFrom, routeTo, date, companyName, time, rate, totalTicketPrice) 
                VALUES ('$userID','$busID','$bookedSeat','$routeForm','$routeTo','$date','$companyName','$departureTime','$totalTicketRate','$totalTicketRate')";
                $result = $conn->query($insertData) or die(mysqli_error());   
                echo '</br><h4 style="color:green;">Your Details Are Submited</h4>';
                $updateSql = "UPDATE bustickets SET totalSeat = '$availableSeat' WHERE id = '$busID'";
                $update = $conn->query($updateSql);

                $sql = "SELECT * FROM bokkingtable WHERE userID = '$userID'";

                    $result = $conn->query($sql) or die(mysqli_error());
                       while($row = $result->fetch_assoc()){
                            $pageID= $row  ['id'];
                    }
                 header('Location:ticketPrint.php?id='.$pageID.'',true, 301);
                 
            }
            else {
                echo '</br><h4 style="color:red;">'.$bookedSeat.' Seat Are Not Available</h4>';
            }
                         
       }
?>
<div class="row">
    <div class="col-md-6">
        <form method="post" action="" name="addticket">
            <input type="hidden" name="companyID" value="<?php echo $id; ?>"/>
            <input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $companyName; ?>"  disabled="">
            </div>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <div class="input-group" id="dp3" data-date="12-02-2017" data-date-format="dd-mm-yyyy">
                    <input class="form-control" size="16" type="text" value="<?php echo $date; ?>"  id="date" name="confirmDate" disabled=""> 
                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="routeForm">From</labe>
                        <input type="text"  class="form-control" id="routeForm" name="routeForm" value="<?php echo $routeForm; ?>" disabled=""/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <labe for="routeTo">To</labe>
                    <input type="text"  class="form-control" id="routeTo" name="routeTo" disabled="" value="<?php echo $routeTo; ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="departureTime">Departure Time</labe>
                        <input type="text"  class="form-control" id="departureTime" placeholder="00:00" name="departureTime" disabled="" value="<?php echo $departureTime; ?>"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="arrivalTime">
                        <labe for="totalBuses">Arrival Time Time</labe>
                        <input type="text"  class="form-control" id="arrivalTime" placeholder="00:00" name="arrivalTime" disabled="" value="<?php echo $arrivalTime; ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="fromPickPoint">From Pickup Point</labe>
                        <input type="text"  class="form-control" id="fromPickPoint" name="pickUpPointFrom" disabled="" value="<?php echo $pickUPPoint; ?>"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="arrivalTime">
                        <labe for="toPickPoint">To Pickup Point</labe>
                        <input type="text"  class="form-control" id="toPickPoint" name="pickUpPointTo" disabled="" value="<?php echo $pickUPTo; ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="ticketRate">Ticket Fare</labe>
                        <input type="text"  class="form-control" id="ticketRate" name="ticketRate" disabled="" value="<?php echo $ticketRate; ?>"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="arrivalTime">
                        <labe for="discountRate">Discount</labe>
                        <input type="text"  class="form-control" id="discountRate"  name="discountRate" disabled="" value="<?php echo $discount; ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <labe for="totalSeat">Wishing Seat</labe>
                        <input type="number"  class="form-control" id="totalSeat" name="bookedSeat" required="" min="1" value="<?php echo $bookedSeat; ?>" <?php //if($bookedSeat){echo 'disabled=""';} ?>/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <labe for="busNumber">Bus Number</labe>
                        <input type="text"  class="form-control" id="busNumber" name="busNUmber" value="<?php echo $busNumber; ?>" disabled=""/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <labe for="busStopies">Middle Point Break</labe>
                <input type="text"  class="form-control" id="busStopies" name="busStopies" value="<?php echo $middlePoint; ?>" disabled=""/>
            </div>
            <div class="form-group">
                <button type="submit" name="confirmTicket" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>
</div>
<?php  include './footer.php'; ?><!--Connect Footer-->
