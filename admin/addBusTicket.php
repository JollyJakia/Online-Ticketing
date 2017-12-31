<?php include './header.php';

$id = $_SESSION['userId'];
$companyName = $_SESSION['companyName'];



if(isset($_POST['addBusticket'])){
   $comID = $_POST['companyID'];
   $busCompanyName = $companyName;
   $date = $_POST['date'];
   $routeForm = $_POST['routeForm'];
   $routeTo = $_POST['routeTo'];
   $departureTime = $_POST['departureTime'];
   $arrivalTime = $_POST['arrivalTime'];
   $pickUpPointFrom = $_POST['pickUpPointFrom'];
   $pickUpPointTo = $_POST['pickUpPointTo'];
   $ticketRate = $_POST['ticketRate'];
   $discountRate = $_POST['discountRate'];
   $totalSeat = $_POST['totalSeat'];
   $busStopies = $_POST['busStopies'];
   $filleSeat = '';
   $busNumber = $_POST['busNumber'];
    $sql= "SELECT * FROM bustickets WHERE date = '".$date."' AND  routeForm = '".$routeForm."'  AND  departureTime = '".$departureTime."' AND  arrivalTime = '".$arrivalTime."'";
    $query = $conn->query($sql)or die($conn->error());
    $duplicate = $query->num_rows;
    if($duplicate >= 1){
        echo '</br><h4 style="color:red;">Already Exits..!! </h4>';
    }
    else{
        $insert = "INSERT INTO bustickets (busCompanyID, companyName, busNumber, date, routeForm, routeTo, departureTime, arrivalTime, totalSeat, filleSeat, busStopies, pickUpPointFrom, pickUpPointTo, ticketRate, discountRate) 
                  VALUES ('$comID','$busCompanyName','$busNumber','$date','$routeForm','$routeTo','$departureTime','$arrivalTime','$totalSeat','$filleSeat','$busStopies','$pickUpPointFrom', '$pickUpPointTo','$ticketRate', '$discountRate')";
        $result = $conn->query($insert);
        echo '</br><h4 style="color:green;">Your Details Are Submited</h4>';
    }
    
}
?><!--Connect Header-->
<h1 class="page-header">Add Bus Tickets</h1>
<div class="row">
    <div class="col-md-6">
        <form method="post" action="" name="addticket">
            <input type="hidden" name="companyID" value="<?php echo $id; ?>"/>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $companyName; ?>" disabled name="busCompanyName">
            </div>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <div class="input-group date_picker" id="dp3" data-date="12-02-2017" data-date-format="dd-mm-yyyy">
                    <input class="form-control" size="16" type="text" id="date" name="date" placeholder="12-02-2017"> 
                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="routeForm">From</labe>
                        <input type="text"  class="form-control" id="routeForm" name="routeForm"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <labe for="routeTo">To</labe>
                    <input type="text"  class="form-control" id="routeTo" name="routeTo"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="departureTime">Departure Time</labe>
                        <input type="text"  class="form-control" id="departureTime" placeholder="00:00" name="departureTime"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="arrivalTime">
                        <labe for="totalBuses">Arrival Time Time</labe>
                        <input type="text"  class="form-control" id="arrivalTime" placeholder="00:00" name="arrivalTime"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="fromPickPoint">From Pickup Point</labe>
                        <input type="text"  class="form-control" id="fromPickPoint" name="pickUpPointFrom"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="arrivalTime">
                        <labe for="toPickPoint">To Pickup Point</labe>
                        <input type="text"  class="form-control" id="toPickPoint" name="pickUpPointTo"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <labe for="ticketRate">Ticket Fare</labe>
                        <input type="text"  class="form-control" id="ticketRate" name="ticketRate"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="arrivalTime">
                        <labe for="discountRate">Discount</labe>
                        <input type="text"  class="form-control" id="discountRate"  name="discountRate"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <labe for="totalSeat">Total Seat</labe>
                        <input type="number"  class="form-control" id="totalSeat" name="totalSeat"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <labe for="busNumber">Bus Number</labe>
                        <input type="text"  class="form-control" id="busNumber" name="busNumber"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <labe for="busStopies">Middle Point Break</labe>
                <input type="text"  class="form-control" id="busStopies" name="busStopies"/>
            </div>
            <div class="form-group">
                <button type="submit" name="addBusticket" class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php include './footer.php'; ?><!--Connect Footer-->
<script type="text/javascript">
    $(function(){
        $('.date_picker input').datepicker({
           format: "dd.mm.yyyy",
           todayBtn: "linked",
           language: "de"
        });
    });
</script>