// For datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#activityRoomsDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [3,4,5],
                'orderable': false,
            }],
            "autoWidth": false,
            "displayLength": 25,
            "fixedColumns": false,
        });
    });
});