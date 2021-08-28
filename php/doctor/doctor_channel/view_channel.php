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

    <!-- Modal -->
    <div class="modal fade" id="prescriptionModal" tabindex="-1" role="dialog" aria-labelledby="prescriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="prescriptionModalLabel">Prescription</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formPrescription" class="card">
                        <div align="left">
                            <label class="form-label" for="channel_no">Channel No</label>
                            <input type="text" class="form-control" placeholder="Channel No" id="channel_no" name="channel_no" size="3ppx" required>
                        </div>
                        <div align="left">
                            <label class="form-label" for="disease">Disease</label>
                            <input type="text" class="form-control" placeholder="Disease" id="disease" name="disease" size="3ppx" required>
                        </div>
                        <div align="left">
                            <label class="form-label" for="description">Description</label>
                            <input type="text" class="form-control" placeholder="Description" id="description" name="description" size="3ppx" required>
                        </div>
                        <br>
                        <div align="right">
                            <button class="btn btn-info" type="button" id="save" onclick="addPrescription()">Add</button>
                            <button class="btn btn-warning" type="button" id="reset" onclick="resetForm()">Reset</button>
                        </div>
                    </form>
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
        var isNew = true;

        window.onload = function() {
            $.ajax({
                url: 'get_doctors_channel.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    log_id: log_id
                },

                success: function(data) {
                    $('#tbl_doctor_channel').html(data);
                    $('#tbl_doctor_channel').dataTable({
                        "aaData": data,
                        "scrollX": true,
                        "aoColumns": [{
                                "sTitle": "Channel No",
                                "mData": "channel_no"
                            },
                            {
                                "sTitle": "Doctor Name",
                                "mData": "doctor_name"
                            },
                            {
                                "sTitle": "Patient Name",
                                "mData": "patient_name"
                            },
                            {
                                "sTitle": "Room No",
                                "mData": "room_no"
                            },
                            {
                                "sTitle": "Channel Date",
                                "mData": "channel_date"
                            },
                            {
                                "sTitle": "Prescription",
                                "mData": "channel_no",
                                "render": function(mData, type, row, meta) {
                                    return '<button class="btn btn-success" data-toggle="modal" data-target="#prescriptionModal" onclick="displayPrescriptionForm(' + mData + ')">Prescription</button>';
                                }
                            }
                        ]
                    })
                }
            })
        };

        function resetForm() {
            $('#disease').val('');
            $('#description').val('');
        }

        function addPrescription() { 
            if ($("#formPrescription").valid()) {                
                $.ajax({
                    type: 'POST',
                    url: '../../prescription/add_prescription.php',
                    dataType: 'JSON',
                    data: $('#formPrescription').serialize(),

                    success: function (data) {
                        $('#prescriptionModal').modal('hide');
                        alert("Prescription Added");
                        resetForm();
                    }
                })
            }
        }

        function displayPrescriptionForm(id) {
            $('#channel_no').val(id);
        }
    </script>
</body>

</html>