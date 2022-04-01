// to triger the rejection reason model on cancel event
function rejectionReasonModal(id){
    $("#rejectionReasonModal").modal('show');;
    $("#rejectionReasonModalEvent_id").val(id);
}

// to end ajax request to get the selected slot detail
function getServiceEventSlotDetail(id){
    $('.time-slot-pills a').removeClass('active');
    $.ajax({
        url:'/events/slot/info',
        type:'get',
        data:{"slot_id":id},
        success:function(response){
            console.log(response);
            $("#serviceEventSlotAddClassActive"+id).addClass('active');
            $("#service-event-slot-detail").html(response);
        }
    });
}
$("#rejectionReasonModal").on("hidden.bs.modal", function () {
    $(this).find("input,textarea").val('').end();
});

// For datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#eventsDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [2,3,4,5,6,7],
                'orderable': false,
            }],
            "order": [[0, "desc"]],
            "autoWidth": true,
            "displayLength": 10,
            "fixedColumns": true,
        });
    });
});

// For canceled events datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#canceledEventsDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [2,3,4,5,6],
                'orderable': false,
            }],
            "order": [[0, "desc"]],
            "autoWidth": true,
            "displayLength": 10,
            "fixedColumns": true,
        });
    });
});

// For pending events datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#pendingEventsDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [2,3,4,5,6,7],
                'orderable': false,
            }],
            "order": [[0,1]],
            "autoWidth": true,
            "displayLength": 10,
            "fixedColumns": true,
        });
    });
});
// For services events datatables
$(function() {
    // $('#myTable').DataTable();
    $(function() {
        var table = $('#serviceEventsDataTable').DataTable({
            "columnDefs": [{
                "visible": true,
                "targets": [2,3,4,5,6],
                'orderable': false,
            }],
            "order": [[0,1]],
            "autoWidth": true,
            "displayLength": 10,
            "fixedColumns": true,
        });
    });
});