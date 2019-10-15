$(document).ready( function () {
    $('#myTable').DataTable({
        'columnDefs': [ {
            'targets': [3], /* column index */
            'orderable': false, /* true or false */
        }]
    });
} );

setTimeout(function() {
    $('#hide').hide('fast');
}, 5000);

setTimeout(function() {
    $('#hide2').hide('fast');
}, 6000);