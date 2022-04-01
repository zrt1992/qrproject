// For datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#pollsDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [1],
                'orderable': false,
            }],
            "order": [[0, "desc"]],
            "autoWidth": true,
            "displayLength": 25,
            "fixedColumns": true,
        });
    });
});

$("#clone").click(function() {
    $(".cloned-row:first").clone().find("input:text").val("").end().insertAfter(".cloned-row:last");
});

$("#cloneRemove").click(function() {
    var length = $('.cloned-row').length;
    if(length == 1){
        return true;
    }
    $(".cloned-row:last").remove();
});