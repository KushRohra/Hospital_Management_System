var isNew = true;

window.onload = function () {
    getAllItem();
};

function addItem() {
    if ($("#formItem").valid()) {
        var url = '';
        var data = '';
        var method = '';

        if (isNew == true) {
            url = 'php/item/add_item.php';
            data = $('#formItem').serialize();
            method = 'POST';
        }
        else {
            url = 'php/item/edit_item.php';
            data = $('#formItem').serialize() + "&item_id=" + item_id;
            method = 'POST';
        }

        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: data,

            success: function (data) {
                if (isNew == true) {
                    alert("Item Added");
                } else {
                    isNew = true;
                    alert("Item Updated");
                }
                getAllItem();
                resetForm();
            }
        })
    }
    
}

function resetForm() {
    $('#item_name').val('');
    $('#description').val('');
    $('#selling_price').val('');
    $('#cost_price').val('');
    $('#quantity').val('');
}

function getAllItem() {
    $('#tbl_item').dataTable().fnDestroy();

    $.ajax({
        url: 'php/item/all_item.php',
        type: 'GET',
        dataType: 'JSON',

        success: function (data) {
            $('#tbl_item').html(data);
            $('#tbl_item').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    { "sTitle": "Item Id", "mData": "item_id" },
                    { "sTitle": "Item Name", "mData": "item_name" },
                    { "sTitle": "description", "mData": "description" },
                    { "sTitle": "Selling Price", "mData": "selling_price" },
                    { "sTitle": "Cost Price", "mData": "cost_price" },
                    { "sTitle": "Quantity", "mData": "quantity" },
                    {
                        "sTitle": "Edit", "mData": "item_id", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getItemDetails(' + mData + ')">Edit</button>';
                        }
                    },
                    {
                        "sTitle": "Delete", "mData": "item_id", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-danger" onclick="removeItemDetails(' + mData + ')">Delete</button>';
                        }
                    }
                ]
            })
        }
    })
}

function getItemDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/item/item_return.php',
        dataType: 'JSON',
        data: {
            item_id: id
        },
        success: function(data) {
            isNew = false;
            item_id = data.item_id;
            $('#item_id').val(data.item_id);
            $('#item_name').val(data.item_name);
            $('#description').val(data.description);
            $('#selling_price').val(data.selling_price);
            $('#cost_price').val(data.cost_price);
            $('#quantity').val(data.quantity);
        }
    });
}

function removeItemDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/item/delete_item.php',
        dataType: 'JSON',
        data: {
            item_id: id
        },
        success: function(data) {
            getAllItem();
        }
    })
}