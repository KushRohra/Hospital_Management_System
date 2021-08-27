var isNew = true;

window.onload = function () {
    getAllChannel();
    getDoctor();
    getPatient();
};

function getDoctor() {
    $.ajax({
        type: 'GET',
        url: 'php/channel/get_doctor.php',
        dataType: 'JSON',
        success: function(data) {
            for(var i=0; i<data.length; i++) {
                $('#doctor_no').append($('<option/>', {
                    value: data[i].doctor_id,
                    text: data[i].doctor_name
                }))
            }
        }
    })
}

function getPatient() {
    $.ajax({
        type: 'GET',
        url: 'php/channel/get_patient.php',
        dataType: 'JSON',
        success: function(data) {
            for(var i=0; i<data.length; i++) {
                $('#patient_no').append($('<option/>', {
                    value: data[i].patientno,
                    text: data[i].name
                }))
            }
        }
    })
}

function addChannel() {
    if ($("#formChannel").valid()) {
        var url = '';
        var data = '';
        var method = '';

        if (isNew == true) {
            url = 'php/channel/add_channel.php';
            data = $('#formChannel').serialize();
            method = 'POST';
        }
        else {
            url = 'php/channel/edit_channel.php';
            data = $('#formChannel').serialize() + "&channel_no=" + channel_no;
            method = 'POST';
        }

        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: data,

            success: function (data) {
                if (isNew == true) {
                    alert("Channel Booked");
                } else {
                    isNew = true;
                    alert("Channel Updated");
                }
                getAllChannel();
                resetForm();
            }
        })
    }
    
}

function resetForm() {
    $('#doctor_no').val('');
    $('#patient_no').val('');
    $('#room_no').val('');
    $('#channel_date').val('');
}

function getAllChannel() {
    $('#tbl_channel').dataTable().fnDestroy();

    $.ajax({
        url: 'php/channel/all_channel.php',
        type: 'GET',
        dataType: 'JSON',

        success: function (data) {
            $('#tbl_channel').html(data);
            $('#tbl_channel').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    { "sTitle": "Channel No", "mData": "channel_no" },
                    { "sTitle": "Doctor Name", "mData": "doctor_name" },
                    { "sTitle": "Patient Name", "mData": "patient_name" },
                    { "sTitle": "Room No", "mData": "room_no" },
                    { "sTitle": "Channel Date", "mData": "channel_date" },
                    {
                        "sTitle": "Edit", "mData": "channel_no", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-success" onclick="getChannelDetails(' + mData + ')">Edit</button>';
                        }
                    },
                    {
                        "sTitle": "Delete", "mData": "channel_no", "render": function (mData, type, row, meta) {
                            return '<button class="btn btn-danger" onclick="removeChannelDetails(' + mData + ')">Cancel</button>';
                        }
                    }
                ]
            })
        }
    })
}

function getChannelDetails(no) {
    $.ajax({
        type: 'POST',
        url: 'php/channel/channel_return.php',
        dataType: 'JSON',
        data: {
            channel_no: no
        },
        success: function(data) {
            isNew = false;
            channel_no = data.channel_no;
            $('#doctor_no').val(data.doctor_no);
            $('#patient_no').val(data.patient_no);
            $('#room_no').val(data.room_no);
            $('#channel_date').val(data.channel_date);
        }
    });
}

function removeChannelDetails(no) {
    $.ajax({
        type: 'POST',
        url: 'php/channel/delete_channel.php',
        dataType: 'JSON',
        data: {
            channel_no: no
        },
        success: function(data) {
            getAllChannel();
        }
    })
}