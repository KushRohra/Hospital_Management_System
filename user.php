<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </link>
</head>

<body>

    <?php
    include('header.php')
    ?>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="" id="formUser" class="card">
                    <div class="left">
                        <h3>User Creation</h3>
                    </div>
                    <div align="left">
                        <label class="form-label" for="fullname">Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="username">UserName</label>
                        <input type="text" class="form-control" placeholder="UserName" id="username" name="username" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="address">User Type</label>
                        <select class="form-control" id="utype" name="utype" placeholder="User Type" required>
                            <option value="">Please Select</option>
                            <option value="1">Pharmacist</option>
                            <option value="2">Doctor</option>
                            <option value="3">Receptionist</option>
                        </select>
                    </div>
                    <br>
                    <div align="right">
                        <button class="btn btn-info" type="button" id="save" onclick="addUser()">Add</button>
                        <button class="btn btn-warning" type="button" id="reset" onclick="resetForm()">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="tbl_user" cellpadding="0" width="100%">
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
    <script src="./js/user.js"></script>
</body>

</html>