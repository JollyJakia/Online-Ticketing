<div class="row placeholders">
    <div class="col-md-4 placeholder">
        <div class="panel">
            <div class="panel-body">
                <h3 class="pull-left">Total Buses Companies</h3>
                <?php
                $sql= "SELECT * FROM users WHERE userRole = 'busOwner' ";
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
                $sql= "SELECT * FROM users WHERE userRole = 'user'";
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
                    $sql= "SELECT * FROM bokkingtable";
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
    <div class="col-md-6">
        <h2 class="page-header">Registered Bus Companies</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Bus ID</th>
                    <th>Company Name</th>
                    <th>Owner Name</th>
                    <th>Company Phone</th>
                    <th>Total Bus</th>
                </tr>
                <?php
                $active= 'active';
                $sql = "SELECT * FROM users WHERE userRole = 'busOwner' AND `userstatus` = '$active'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo '<tr>
                                        <td>#00'.$row  ['userId'].'</td>
                                        <td>'.$row  ['companyName'].'</td>
                                        <td>'.$row  ['userName'].'</td>
                                        <td>'.$row  ['phone'].'</td>
                                        <td>'.$row  ['totalBus'].'</td>
                                    </tr>';
                }

                ?>
                </thead>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <h2 class="page-header">Users</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Phone</th>
                    <th>User Email</th>
                    <th>Status</th>
                </tr>
                <?php
                $active= 'active';
                $sql = "SELECT * FROM users WHERE userRole = 'user' AND `userstatus` = '$active'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo '<tr>
                                        <td>#00'.$row  ['userId'].'</td>
                                        <td>'.$row  ['userName'].'</td>
                                        <td>'.$row  ['phone'].'</td>
                                        <td>'.$row  ['userEmail'].'</td>
                                        <td>'.$row  ['userstatus'].'</td>
                                    </tr>';
                }

                ?>
                </thead>
            </table>
        </div>
    </div>
</div>