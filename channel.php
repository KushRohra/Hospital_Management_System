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
        if ($_SESSION['utype'] == 1) {
            include('./header/header_pharmacist.php');
        } else if ($_SESSION['utype'] == 2) {
            include('./header/header_doctor.php');
        } else {
            include('./header/header_receptionist.php');
        }
    ?>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="" id="formChannel" class="card">
                    <div class="left">
                        <h3>Channel</h3>
                    </div>
                    <div align="left">
                        <label class="form-label" for="doctor_no">Doctor Name</label>
                        <select class="form-control" id="doctor_no" name="doctor_no">
                            <option value="">Please Select a Doctor</option>
                        </select>
                    </div>
                    <div align="left">
                        <label class="form-label" for="patient_no">Patient Name</label>
                        <select class="form-control" id="patient_no" name="patient_no">
                            <option value="">Please Select a Patient</option>
                        </select>
                    </div>
                    <div align="left">
                        <label class="form-label" for="room_no">Room No</label>
                        <input type="text" class="form-control" placeholder="Room No No" id="room_no" name="room_no" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="channel_date">Channel Date</label>
                        <input type="date" class="form-control" placeholder="Channel Date" id="channel_date" name="channel_date" size="3ppx" required>
                    </div>
                    <br>
                    <div align="right">
                        <button class="btn btn-info" type="button" id="save" onclick="addChannel()">Add</button>
                        <button class="btn btn-warning" type="button" id="reset" onclick="resetForm()">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="tbl_channel" cellpadding="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
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
    <script src="./js/channel.js"></script>
</body>

</html>