var isNew = true;

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

        }

        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: data,

            success: function (data) {
                if (isNew == true) {
                    alert("Patient Added");
                }
            }
        })
    }
    getAllPatient();
}

function resetForm() {
    alert('reset')
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
                    { "sTitle": "Address", "mData": "address" },
                    {
                        "sTitle": "Address", "mData": "patientno", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getDetails(' + mData + ')">Edit</button>';
                        }
                    },
                    {
                        "sTitle": "Address", "mData": "patientno", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-danger" onclick="removeDetails(' + mData + ')">Delete</button>';
                        }
                    }
                ]
            })
        }
    })
}