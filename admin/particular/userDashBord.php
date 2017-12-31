<div class="row placeholders">
    <div class="col-md-4 placeholder">
        <div class="panel">
            <div class="panel-body">
                <h3 class="pull-left">Total Booking Tickets</h3>
                <?php
                    $userID = $_SESSION['userId'];
                    $sql= "SELECT * FROM bokkingtable WHERE userID = '$userID'";
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
        <h2 class="page-header">Booking Tickets</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Bus ID</th>
                    <th>Company Name</th>
                    <th>Total Seat</th>
                    <th>Route From</th>
                    <th>Route To</th>
                    <th>Date</th>
                    <th>Departure Time</th>
                    <th>Price</th>
                </tr>
                <?php
                $active= 'active';
                $sql= "SELECT * FROM bokkingtable WHERE userID = '$userID'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo '<tr>
                            <td>#00'.$row  ['busID'].'</td>
                            <td>'.$companyName = $row['companyName'].'</td>
                            <td>'.$totalSeat = $row['totalSeat'].'</td>
                            <td>'.$routeForm = $row['routeFrom'].'</td>
                            <td>'.$routeTo = $row['routeTo'].'</td>
                            <td>'.$date = $row['date'].'</td>
                            <td>'.$departureTime = $row['time'].'</td>
                            <td>'.$ticketRate = $row['rate'].'</td>
                        </tr>';
                }

                ?>
                </thead>
            </table>
        </div>
    </div>
    <div class="col-md-6">
    </div>
</div>