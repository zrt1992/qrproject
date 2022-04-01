// For datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#contract-renewal').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": 2,
            }],
            "order": [
                [1, 'desc']
            ],
            "autoWidth": false,
            "displayLength": 25,
            "fixedColumns": false,
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});