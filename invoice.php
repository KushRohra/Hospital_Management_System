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
            <div class="col-sm-8">
                <form action="" id="formInvoice">
                    <table class="table table-border">
                        <tr>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="item_code" placeholder="Item Code" id="item_code" class="form-control" size="30px" required>
                            </td>
                            <td>
                                <input type="text" name="item_name" placeholder="Item Name" id="item_name" class="form-control" size="30px" required>
                            </td>
                            <td>
                                <input type="text" name="price" placeholder="Price" id="price" class="form-control" size="30px" required>
                            </td>
                            <td>
                                <input type="number" name="quantity" placeholder="Quantity" id="quantity" class="form-control" size="30px" required>
                            </td>
                            <td>
                                <input type="text" name="amount" placeholder="Amount" id="amount" class="form-control" size="30px" required>
                            </td>
                            <td>
                                <button type="button" onclick="addItem()" class="btn btn-info">Add Item</button> 
                            </td>
                        </tr>
                    </table>
                    <table id="table_item" class="table table-border">
                        <thead>
                            <tr>
                                <th>Delete</th>
                                <th>Item No</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <tbody>
                                    
                                </tbody>
                            </tr>
                        </thead>
                    </table>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="form-group" align="left">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" placeholder="Total" name="total" id="total" size="30px">
                </div>
                <div class="form-group" align="left">
                    <label for="pay">Pay</label>
                    <input type="text" class="form-control" placeholder="Pay" name="pay" id="pay" size="30px">
                </div><div class="form-group" align="left">
                    <label for="balance">Balance</label>
                    <input type="text" class="form-control" placeholder="Balance" name="balanace" id="balanace" size="30px">
                </div>
                <div class="form-group" align="right">
                    <button type="button" class="btn btn-success">Print</button>
                    <button type="button" class="btn btn-warning">Reset</button>
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