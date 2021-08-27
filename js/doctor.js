var isNew = true;
var doctor_id = null;

window.onload = function () {
    getAllDoctor();
};

function addDoctor() {
    if ($("#formDoctor").valid()) {
        var url = '';
        var data = '';
        var method = '';

        if (isNew == true) {
            url = 'php/doctor/add_doctor.php';
            data = $('#formDoctor').serialize();
            method = 'POST';
        }
        else {
            url = 'php/doctor/edit_doctor.php';
            data = $('#formDoctor').serialize() + "&doctor_id=" + doctor_id;
            method = 'POST';
        }

        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: data,

            success: function (data) {
                if (data == 2) {
                    alert("Current Doctor details are already Added!!")
                } else {
                    if (isNew == true) {
                        alert("Doctor Added");
                    } else {
                        isNew = true;
                        alert("Doctor Updated");
                    }
                }
                getAllDoctor();
                resetForm();
            }
        })
    }
    
}

function resetForm() {
    $('#doctor_name').val('');
    $('#specialization').val('');
    $('#qualification').val('');
    $('#fee').val('');
    $('#phone').val('');
    $('#room_no').val('');
    $('#log_id').val('');
}

function getAllDoctor() {
    $('#tbl_doctor').dataTable().fnDestroy();
    var log_id = $('#log_id').val();

    $.ajax({
        url: 'php/doctor/all_doctor.php',
        type: 'POST',
        dataType: 'JSON',
        data: {log_id: log_id},

        success: function (data) {
            $('#tbl_doctor').html(data);
            $('#tbl_doctor').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    { "sTitle": "Doctor Id", "mData": "doctor_id" },
                    { "sTitle": "Doctor Name", "mData": "doctor_name" },
                    { "sTitle": "Specialization", "mData": "specialization" },
                    { "sTitle": "Qualification", "mData": "qualification" },
                    { "sTitle": "Fee", "mData": "fee" },
                    { "sTitle": "Phone", "mData": "phone" },
                    { "sTitle": "Room No", "mData": "room_no" },
                    {
                        "sTitle": "Edit", "mData": "doctor_id", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getDoctorDetails(' + mData + ')">Edit</button>';
                        }
                    },
                    {
                        "sTitle": "Delete", "mData": "doctor_id", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-danger" onclick="removeDoctorDetails(' + mData + ')">Delete</button>';
                        }
                    }
                ]
            })
        }
    })
}

function getDoctorDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/doctor/doctor_return.php',
        dataType: 'JSON',
        data: {
            doctor_id: id
        },
        success: function(data) {
            isNew = false;
            doctor_id = data.doctor_id;
            $('#doctor_name').val(data.doctor_name);
            $('#specialization').val(data.specialization);
            $('#qualification').val(data.qualification);
            $('#fee').val(data.fee);
            $('#phone').val(data.phone);
            $('#room_no').val(data.room_no);
        }
    });
}

function removeDoctorDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/doctor/delete_doctor.php',
        dataType: 'JSON',
        data: {
            doctor_id: id
        },
        success: function(data) {
            getAllDoctor();
        }
    })
}