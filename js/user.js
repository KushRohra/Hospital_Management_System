var isNew = true;
var patient_id = null;

window.onload = function () {
    getAllUser();
};

function addUser() {
    if ($("#formUser").valid()) {
        var url = '';
        var data = '';
        var method = '';

        if (isNew == true) {
            url = 'php/user/add_user.php';
            data = $('#formUser').serialize();
            method = 'POST';
        }
        else {
            url = 'php/user/edit_user.php';
            data = $('#formUser').serialize() + "&user_id=" + user_id;
            method = 'POST';
        }

        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: data,

            success: function (data) {
                if (isNew == true) {
                    alert("User Added");
                } else {
                    isNew = true;
                    alert("User Updated");
                }
                $('#password').removeAttr("disabled");
                getAllUser();
                resetForm();
            }
        })
    }

}

function resetForm() {
    $('#username').val('');
    $('#fullname').val('');
    $('#password').val('');
    $('#utype').val('');
}

function getAllUser() {
    $('#tbl_user').dataTable().fnDestroy();
    $.ajax({
        url: 'php/user/all_user.php',
        type: 'GET',
        dataType: 'JSON',

        success: function (data) {
            $('#tbl_user').html(data);
            $('#tbl_user').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    { "sTitle": "User Id", "mData": "user_id" },
                    { "sTitle": "Full Name", "mData": "fullname" },
                    { "sTitle": "Username", "mData": "username" },
                    {
                        "sTitle": "User Type", "mData": "utype", "render": function (mData, type, row, meta) {
                            if (mData == 1) {
                                return '<b style="color:green">Pharmacist</b>';
                            } else if (mData == 2) {
                                return '<b style="color:blue">Doctor</b>';
                            } else {
                                return '<b style="color:red">Receptionist</b>';
                            }
                        }
                    },
                    {
                        "sTitle": "Edit", "mData": "user_id", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getUserDetails(' + mData + ')">Edit</button>';
                        }
                    },
                    {
                        "sTitle": "Delete", "mData": "user_id", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-danger" onclick="removeUserDetails(' + mData + ')">Delete</button>';
                        }
                    }
                ]
            })
        }
    })
}

function getUserDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/user/user_return.php',
        dataType: 'JSON',
        data: {
            user_id: id
        },
        success: function (data) {
            isNew = false;
            user_id = data.user_id;
            $('#fullname').val(data.fullname);
            $('#username').val(data.username);
            $('#password').attr('disabled', 'disabled');
            $('#utype').val(data.utype);
        }
    });
}

function removeUserDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/user/delete_user.php',
        dataType: 'JSON',
        data: {
            user_id: id
        },
        success: function (data) {
            getAllUser();
        }
    })
}