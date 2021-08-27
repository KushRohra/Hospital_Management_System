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
                <form action="" id="formItem" class="card">
                    <div class="left">
                        <h3>Item</h3>
                    </div>
                    <div align="left">
                        <label class="form-label" for="item_name">Item Name</label>
                        <input type="text" class="form-control" placeholder="Item Name" id="item_name" name="item_name" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="description">Description</label>
                        <input type="text" class="form-control" placeholder="Description" id="description" name="description" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="selling_price">Selling Price</label>
                        <input type="number" class="form-control" placeholder="Selling Price" id="selling_price" name="selling_price" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="cost_price">Cost Price</label>
                        <input type="number" class="form-control" placeholder="Cost Price" id="cost_price" name="cost_price" size="3ppx" required>
                    </div>
                    <div align="left">
                        <label class="form-label" for="quantity">Quantity</label>
                        <input type="number" class="form-control" placeholder="Quantity" id="quantity" name="quantity" size="3ppx" required>
                    </div>
                    <br>
                    <div align="right">
                        <button class="btn btn-info" type="button" id="save" onclick="addItem()">Add</button>
                        <button class="btn btn-warning" type="button" id="reset" onclick="resetForm()">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="tbl_item" cellpadding="0" width="100%">
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
    <script src="./js/item.js"></script>
</body>

</html>