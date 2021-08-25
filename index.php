<?php
    session_start();

    if (!$_SESSION['username']) {
        header('Location: login.php');
    } 
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"></link>
</head>

<body>

    <?php
    include('header.php')
    ?>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="" id="formPatient" class="card">
                    <div class="left">
                        <h3>Patient</h3>
                    </div>
                    <div align="left">
                        <label class="form-label" for="pname">Patient Name</label>
                        <input type="text" class="form-control" placeholder="Patient Name" id="pname" name="pname" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" class="form-control" placeholder="Phone No" id="phone" name="phone" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Address" id="address" name="address" size="3ppx" required>
                    </div>
                    <br>
                    <div align="right">
                        <button class="btn btn-info" type="button" id="save" onclick="addPatient()">Add</button>
                        <button class="btn btn-warning" type="button" id="reset" onclick="resetForm()">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="tbl_patient" cellpadding="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./compn/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./js/patient.js"></script>
</body>

</html>