<?php
include './header.php';
?><!--Connect Header--->
<h1 class="page-header">Ticket Print</h1>
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
    $sql = "SELECT * FROM bokkingtable WHERE id = '$id'";
    $result = $conn->query($sql) or die(mysqli_error());
//`id`, `userID`, `busID`, `totalSeat`, `routeFrom`, `routeTo`, `date`, `companyName`, `time`, `rate
       while($row = $result->fetch_assoc()){
           $companyName = $row['companyName'];
           $totalSeat = $row['totalSeat'];
           $routeForm = $row['routeFrom'];
           $routeTo = $row['routeTo'];
           $date = $row['date'];
           $departureTime = $row['time'];
           $ticketRate = $row['totalTicketPrice'];
       }
?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="table-responsive">
            <table class="table" style="border: 1px solid #efefef;background-color: aliceblue;">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <h4><?php echo $companyName; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name: </b> <span><?php echo $username; ?></span>
                        </td>
                        <td>
                            <b>Seat: </b> <span><?php echo $totalSeat; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>From: </b> <span><?php echo $routeForm; ?></span>
                        </td>
                        <td>
                            <b>To: </b> <span><?php echo $routeTo; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Date: </b> <span><?php echo $date; ?></span>
                        </td>
                        <td>
                            <b>Time: </b> <span><?php echo $departureTime; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Rate: </b> <span><?php echo $ticketRate; ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php  include './footer.php'; ?><!--Connect Footer-->
