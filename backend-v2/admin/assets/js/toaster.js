$(document).ready(function() {
    toastr.options = {
        'closeButton': false,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
    }


    // Toast Position
    $('#position').click(function(event) {
        var pos = $('input[name=position]:checked', '#positionForm').val();
        toastr.options.positionClass = "toast-" + pos;
        toastr.options.preventDuplicates = false;
        toastr.info('This sample position', 'Toast Position')
    });

});
