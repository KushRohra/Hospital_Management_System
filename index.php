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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./compn/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./js/patient.js"></script>
</body>

</html>