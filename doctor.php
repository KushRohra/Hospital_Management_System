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
                <form action="" id="formDoctor" class="card">
                    <div class="left">
                        <h3>Doctor</h3>
                    </div>
                    <div align="left">
                        <label class="form-label" for="doctor_name">Doctor Name</label>
                        <input type="text" class="form-control" placeholder="Doctor Name" id="doctor_name" name="doctor_name" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="specialization">Specialization</label>
                        <input type="text" class="form-control" placeholder="Specialization" id="specialization" name="specialization" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="qualification">Qualification</label>
                        <input type="text" class="form-control" placeholder="Qualification" id="qualification" name="qualification" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="fee">Fee</label>
                        <input type="text" class="form-control" placeholder="Fee" id="fee" name="fee" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="room_no">Room No</label>
                        <input type="text" class="form-control" placeholder="Room No" id="room_no" name="room_no" size="3ppx" required>
                    </div>
                    <div align="left">
                        <input type="hidden" class="form-control" value="<?php echo $_SESSION['id'] ?>" id="log_id" name="log_id" size="3ppx" required>
                    </div>
                    <br>
                    <div align="right">
                        <button class="btn btn-info" type="button" id="save" onclick="addDoctor()">Add</button>
                        <button class="btn btn-warning" type="button" id="reset" onclick="resetForm()">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="tbl_doctor" cellpadding="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
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
    <script src="./js/doctor.js"></script>
</body>

</html>