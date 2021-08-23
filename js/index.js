var isNew = true;
var patient_id = null;

window.onload = function () {
    getAllPatient();
};

function addPatient() {
    if ($("#formPatient").valid()) {
        var url = '';
        var data = '';
        var method = '';

        if (isNew == true) {
            url = 'php/add_patient.php';
            data = $('#formPatient').serialize();
            method = 'POST';
        }
        else {
            url = 'php/edit_patient.php';
            data = $('#formPatient').serialize() + "&patient_id=" + patient_id;
            method = 'POST';
        }

        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: data,

            success: function (data) {
                if (isNew == true) {
                    alert("Patient Added");
                } else {
                    alert("Patient Updated")
                }
                getAllPatient();
                resetForm();
            }
        })
    }
    
}

function resetForm() {
    $('#pname').val('');
    $('#phone').val('');
    $('#address').val('');
}

function getAllPatient() {
    $('#tbl_patient').dataTable().fnDestroy();
    $.ajax({
        url: 'php/all_patient.php',
        type: 'GET',
        dataType: 'JSON',

        success: function (data) {
            $('#tbl_patient').html(data);
            $('#tbl_patient').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    { "sTitle": "Patient No", "mData": "patientno" },
                    { "sTitle": "Patient Name", "mData": "name" },
                    { "sTitle": "Phone", "mData": "phone" },
                    { "sTitle": "Address", "mData": "address" },
                    {
                        "sTitle": "Edit", "mData": "patientno", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getPatientDetails(' + mData + ')">Edit</button>';
                        }
                    },
                    {
                        "sTitle": "Delete", "mData": "patientno", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-danger" onclick="removePatientDetails(' + mData + ')">Delete</button>';
                        }
                    }
                ]
            })
        }
    })
}

function getPatientDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/patient_return.php',
        dataType: 'JSON',
        data: {
            patient_id: id
        },
        success: function(data) {
            isNew = false;
            patient_id = data.patientno;
            $('#pname').val(data.name);
            $('#phone').val(data.phone);
            $('#address').val(data.address);
        }
    });
}

function removePatientDetails(id) {
    $.ajax({
        type: 'POST',
        url: 'php/delete_patient.php',
        dataType: 'JSON',
        data: {
            patient_id: id
        },
        success: function(data) {
            getAllPatient();
        }
    })
}