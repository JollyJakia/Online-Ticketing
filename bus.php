<?php include './header.php'; ?><!--Connect Header--->

<!--Login Form-->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Bus Ticket Booking</h2>
        <br>
        <form>
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="name" required="required">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" required="required">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Form:</label>
                        <select class="form-control" required="required">
                            <option>Select District</option>
                            <option>Dhaka</option>
                            <option>Chittagong</option>
                            <option>Shylet</option>
                            <option>Cox's Bazar</option>
                            <option>Barishal</option>
                            <option>Jessore</option>
                            <option>Bagerhat</option>
                            <option>Shamshernagar</option>
                            <option>Rajshahi</option>
                            <option>Bogra</option>
                        </select>
                    </div>  
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">To:</label>
                        <select class="form-control" required="required">
                            <option>Select District</option>
                            <option>Dhaka</option>
                            <option>Chittagong</option>
                            <option>Shylet</option>
                            <option>Cox's Bazar</option>
                            <option>Barishal</option>
                            <option>Jessore</option>
                            <option>Bagerhat</option>
                            <option>Shamshernagar</option>
                            <option>Rajshahi</option>
                            <option>Bogra</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Select Date:</label>
                <div class="input-group" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                    <input class="form-control" size="16" type="text" value="12-02-2012">
                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Agency Name</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio"></td>
                            <td>Novo Air Ltd.</td>
                            <td>12:00</td>
                            <td>13:50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success pull-right">Submit</button>
        </form> 
    </div>
</div>

<?php include './footer.php'; ?><!--Connect Footer-->
<script type="text/javascript">
    $(function () {
        $('#dp3').datepicker()
    });
</script>
