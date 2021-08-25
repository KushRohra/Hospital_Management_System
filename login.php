<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </link>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>

    <div class="container">
        <table width="100%" height="100%" border="0" cellspacing="0" align="center">
            <tr>
                <td align="center" valign="middle">
                    <table class="table-bordered" width="350" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFF">
                        <form action="" class="card" name="form_login" id="form_login">
                            <tr>
                                <td height="25" colspan="2" align="left" valign="middle" bgcolor="#FF9900" class="style2">
                                    <div align="center">
                                        <strong>Login</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <div id="err" style="color: red"></div>
                            </tr>
                            <tr>
                                <td width="118" align="left" valign="middle" class="style1">Username</td>
                                <td width="118" align="left" valign="middle" class="style1">
                                    <input type="text" class="form-control" size="10px" id="username" name="username" placeholder="Username">
                                </td>
                            </tr>
                            <tr>
                                <td width="118" align="left" valign="middle" class="style1">Password</td>
                                <td width="118" align="left" valign="middle" class="style1">
                                    <input type="password" class="form-control" size="10px" id="password" name="password" placeholder="Password">
                                </td>
                            </tr>
                            <tr>
                                <td width="118" align="left" valign="middle" class="style1">User Type</td>
                                <td width="118" align="left" valign="middle" class="style1">
                                    <select name="utype" id="utype" class="form-control">
                                        <option value="">Please Select an option</option>
                                        <option value="1">Pharmacist</option>
                                        <option value="2">Doctor</option>
                                        <option value="3">Receptionist</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" valign="middle" class="style1">
                                    <button type="button" class="btn btn-primary" onclick="login()">Sign In</button>
                                    <button type="button" class="btn btn-warning" onclick="resetForm()">Reset</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./compn/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>