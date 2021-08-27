<?php
session_start();
if (!$_SESSION['username']) {
    header('Location: login.php');
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </link>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Hospital</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="../../../doctor.php">Add Doctor</a></li>
                <li><a href="">View Channels</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"> <?php echo $_SESSION['username']; ?></span></a></li>
                <li><a href="../../../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div align="left">
        <input type="hidden" class="form-control" value="<?php echo $_SESSION['id'] ?>" id="log_id" name="log_id" size="3ppx" required>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="tbl_doctor_channel" cellpadding="0" width="100%">
                        <thead>
                            <tr>
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
    <script src="../../../compn/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        var log_id = $('#log_id').val();
        window.onload = function() {
            $.ajax({
                url: 'get_doctors_channel.php',
                type: 'POST',
                dataType: 'JSON',
                data: {log_id: log_id},

                success: function (data) {
                    $('#tbl_doctor_channel').html(data);
                    $('#tbl_doctor_channel').dataTable({
                        "aaData": data,
                        "scrollX": true,
                        "aoColumns": [
                            { "sTitle": "Channel No", "mData": "channel_no" },
                            { "sTitle": "Doctor Name", "mData": "doctor_name" },
                            { "sTitle": "Patient Name", "mData": "patient_name" },
                            { "sTitle": "Room No", "mData": "room_no" },
                            { "sTitle": "Channel Date", "mData": "channel_date" }
                        ]
                    })
                }
            })
        };
    </script>
</body>

</html>