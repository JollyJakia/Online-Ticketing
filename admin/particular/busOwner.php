<div class="row placeholders">
    <div class="col-md-4 placeholder">
        <div class="panel">
            <div class="panel-body">
                <h3 class="pull-left">Total Active Buses</h3>
                <?php
                    $userID = $_SESSION['userId'];
                    $sql = "SELECT * FROM bustickets WHERE `busCompanyID` = '$userID'";
                    $query = $conn->query($sql)or die($conn->error());
                    $totalbus = $query->num_rows;
                    if($totalbus ){
                        echo '<h3 class="text-right">'.$totalbus.'</h3>';
                    }
                ?>

            </div>
        </div>
    </div>
    <div class="col-md-4 placeholder">
        <div class="panel">
            <div class="panel-body">
                <h3 class="pull-left">Total Customer</h3>
                <?php
                    $userID = $_SESSION['userId'];
                    $sql= "SELECT * FROM users WHERE userRole = 'busOwner' AND userRole = 'user' AND userId = '$userID'";
                    $query = $conn->query($sql)or die($conn->error());
                    $totalbus = $query->num_rows;
                    if($totalbus ){
                        echo '<h3 class="text-right">'.$totalbus.'</h3>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-4 placeholder">
        <div class="panel">
            <div class="panel-body">
                <h3 class="pull-left">Total Sold Ticket</h3>
                <?php
                    $sql= "SELECT * FROM bokkingtable WHERE comID = '$userID'";
                    $query = $conn->query($sql)or die($conn->error());
                    $totalbus = $query->num_rows;
                    if($totalbus ){
                        echo '<h3 class="text-right">'.$totalbus.'</h3>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Avaiable Buses</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Bus ID</th>
                    <th>Bus Number</th>
                    <th>Company Name</th>
                    <th>Date</th>
                    <th>Route From</th>
                    <th>Route </th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Total Seat</th>
                    <th>Seat Fill Up</th>
                </tr>
                <?php
                //busCompanyID, companyName, date, routeForm, routeTo, departureTime, arrivalTime, totalSeat, filleSeat, busStopies, pickUpPointFrom, pickUpPointTo, ticketRate, discountRate
                $id = $_SESSION['userId'];
                $companyName = $_SESSION['companyName'];
                $sql = "SELECT * FROM bustickets WHERE `busCompanyID` = '$id'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo '<tr>
                            <td>#00'.$row  ['busCompanyID'].'</td>
                            <td>'.$row  ['busNumber'].'</td>    
                            <td>'.$row  ['companyName'].'</td>
                            <td>'.$row  ['date'].'</td>
                            <td>'.$row  ['routeForm'].'</td>
                            <td>'.$row  ['routeTo'].'</td>
                            <td>'.$row  ['departureTime'].'</td>
                            <td>'.$row  ['arrivalTime'].'</td>
                            <td>'.$row  ['totalSeat'].'</td>
                            <td>'.$row  ['filleSeat'].'</td>     
                        </tr>';
                }

                ?>
                </thead>
            </table>
        </div>
    </div>
</div>