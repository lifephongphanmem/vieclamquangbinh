$('#gioitinh_th').on('click', function() {
    var check = $('#gioitinh_th').is(':checked');
    if (check) {
        $('#gt_th').removeClass('d-none');
    } else {
        $('#gt_th').addClass('d-none');
    }
});

$('#tthdkt_th').on('click', function() {
    var check = $('#tthdkt_th').is(':checked');
    if (check) {
        $('#hdkt_th').removeClass('d-none');
    } else {
        $('#hdkt_th').addClass('d-none');
    }
});
$('#dtut_th').on('click', function() {
    var check = $('#dtut_th').is(':checked');
    if (check) {
        $('#ut_th').removeClass('d-none');
    } else {
        $('#ut_th').addClass('d-none');
    }
});
$('#trinhdogdpt_th').on('click', function() {
    var check = $('#trinhdogdpt_th').is(':checked');
    if (check) {
        $('#gdpt_th').removeClass('d-none');
    } else {
        $('#gdpt_th').addClass('d-none');
    }
});
$('#trinhdocmkt_th').on('click', function() {
    var check = $('#trinhdocmkt_th').is(':checked');
    if (check) {
        $('#cmkt_th').removeClass('d-none');
    } else {
        $('#cmkt_th').addClass('d-none');
    }
});

$('#dotuoi').on('click', function() {
    var check = $('#dotuoi').is(':checked');
    if (check) {
        $('#tuoi').removeClass('d-none');
    } else {
        $('#tuoi').addClass('d-none');
    }
});
$('#loaihinh').on('click', function() {
    var check = $('#loaihinh').is(':checked');
    if (check) {
        $('#lh').removeClass('d-none');
    } else {
        $('#lh').addClass('d-none');
    }
});
$('#thatnghiep').on('click', function() {
    var check = $('#thatnghiep').is(':checked');
    if (check) {
        $('#thatn').removeClass('d-none');
    } else {
        $('#thatn').addClass('d-none');
    }
});

$('#ktghdkt').on('click', function() {
    var check = $('#ktghdkt').is(':checked');
    if (check) {
        $('#khongthamgiahdkt').removeClass('d-none');
    } else {
        $('#khongthamgiahdkt').addClass('d-none');
    }
});


