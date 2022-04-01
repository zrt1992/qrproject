// For datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#activityTypeDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [2,3,4],
                'orderable': false,
            }],
            "autoWidth": false,
            "displayLength": 25,
            "fixedColumns": false,
        });
    });
});