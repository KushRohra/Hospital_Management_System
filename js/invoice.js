getItemCode();

function getItemCode() {
    $('#item_code').empty();
    $('#item_code').keyup(function(e) {
        $.ajax({
            type: 'POST',
            url: 'php/item/get_item.php',
            dataType: 'JSON',
            data: {item_id: $('#item_code').val()},

            success: function(data) {
                $('#item_name').val(data.item_name);
                $('#price').val(data.selling_price);
                $('#quantity').focus();
            }
        });
    })
}

$(function() {
    $('#price,#quantity').on('keydown keyup click', calculatePrice);
    function calculatePrice() {
        var price = ( (Number($('#price').val())) * (Number($('#quantity').val())) );
        $('#total_price').val(price);
    }
})

var total_amount = 0;

function addItem() {
    var item_code = $('#item_code').val();
    var item_name = $('#item_name').val();
    var price = $('#price').val();
    var quantity = $('#quantity').val();
    var total = price * quantity;

    var table = `
        <tr>
            <td><button type='button' name='record' class='btn btn-danger' onclick='deleteItem(this)'>Delete</td>
            <td>${item_code}</td>
            <td>${item_name}</td>
            <td>${price}</td>
            <td>${quantity}</td>
            <td>${total}</td>
        </tr>
    `;
    total_amount += Number(total);
    $('#total').val(total_amount);
    $('#table_item tbody').append(table);

    $('#item_code').val('');
    $('#item_name').val('');
    $('#price').val('');
    $('#quantity').val('');
    $('#total_price').val('');
}

function deleteItem(e) {
    total_cost = parseInt($(e).parent().parent().find('td:last').text(), 10);
    total_amount -= total_cost;
    $('#total').val(total_amount)
    $(e).parent().parent().remove();
}

function resetForm() {
    window.location.href = 'prescription.php';
}