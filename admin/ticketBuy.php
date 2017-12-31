<?php
include './header.php';
$table = '';
if(isset($_POST['searchBtn'])){
  $from = $_POST['from'];
  $to = $_POST['to'];
  $date = $_POST['date'];
  $sql = "SELECT * FROM bustickets WHERE routeForm = '$from' AND routeTo = '$to' AND date = '$date'";
 $result = $conn->query($sql) or die(mysqli_error());
   
    while($row = $result->fetch_assoc()){
        $table = '<tr>
                <td>'.$row  ['date'].'</td>
                <td>'.$row  ['routeForm'].'</td>
                <td>'.$row  ['routeTo'].'</td>
                <td>'.$row  ['departureTime'].'</td>
                <td>'.$row  ['arrivalTime'].'</td>
                <td>'.$row  ['companyName'].'</td>
                <td>'.$row  ['totalSeat'].'</td>
                <td>'.$row  ['pickUpPointFrom'].'</td>
                <td>'.$row  ['pickUpPointTo'].'</td>
                <td>'.$row  ['ticketRate'].'</td>
                <td>'.$row  ['discountRate'].'%</td>
                <td><a href="ticketConfirm.php?id='.$row  ['id'].'" class="btn btn-primary">Buy</a></td>
            </tr>';
    }
}
?><!--Connect Header--->
<h1 class="page-header">Buy Ticket</h1>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <form  action="" method="post" name="ticketSearch">
            <div class="form-group">
                <labe for="from">From</labe>
                <select class="form-control" name="from">
                    <option>Select From</option>
                    <?php
                        $sql = "SELECT * FROM bustickets";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo '<option value="'.$row  ['routeForm'].'">'.$row  ['routeForm'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <labe for="to">To</labe>
                <select class="form-control" name="to">
                    <option>Select To</option>
                    <?php
                        $sql = "SELECT * FROM bustickets";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo '<option value="'.$row  ['routeTo'].'">'.$row  ['routeTo'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <div class="input-group date_picker" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                    <input class="form-control" size="16" type="text" value="12-02-2012"  id="date" name="date"> 
                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <button type="submit" name="searchBtn" class="btn btn-primary pull-right">Submit</button>
         </form> 
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Deperture Time</th>
                        <th>Arrival Time</th>
                        <th>Company Name</th>
                        <th>Total Seat</th>
                        <th>Pick Up Point</th>
                        <th>Drop In Point</th>
                        <th>Ticket Rate</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $table; ?>
                </tbody>
            </table>
        </div>
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