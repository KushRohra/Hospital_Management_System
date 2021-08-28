var isNew = true;
var patient_id = null;

window.onload = function () {
    getAllUser();
};

function getAllUser() {
    $('#tbl_prescription').dataTable().fnDestroy();
    $.ajax({
        url: 'php/prescription/all_prescription.php',
        type: 'GET',
        dataType: 'JSON',

        success: function (data) {
            $('#tbl_prescription').html(data);
            $('#tbl_prescription').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    { "sTitle": "Prescription No", "mData": "prescription_no" },
                    { "sTitle": "Channel No", "mData": "channel_no" },
                    { "sTitle": "Disease", "mData": "disease" },
                    { "sTitle": "Description", "mData": "description" },
                    {
                        "sTitle": "Invoice", "mData": "prescription_no", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getInvoice(' + mData + ')">Invoice</button>';
                        }
                    }
                ]
            })
        }
    })
}

function getInvoice(no) {
    window.location.href = "invoice.php?no=" + no;
}