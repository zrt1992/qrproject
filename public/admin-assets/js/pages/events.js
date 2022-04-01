$(function () {
// create page js for calender dropdown
    // var date = today.getDate();
    $('#datetimepicker1').datetimepicker({
        locale: 'ru',
        Default: false,
        stepping: 30,
        viewMode: 'years',
    });
    $("#datetimepicker1").on("change.datetimepicker", function (e){
        $('#datetimepicker2').datetimepicker('destroy');
        var mindatetime = e.date;
        var maxdatetime = moment(mindatetime).add(4,'hours');
        // alert(maxdatetime);
        $('#datetimepicker2').datetimepicker({
            locale: 'ru',
            Default: false,
            stepping: 30,
            format:'MM/DD/YYYY hh:mm A',
            minDate: mindatetime,
            maxDate: maxdatetime,
            viewMode: 'years',
        });
    });
// edit page js for calender dropdown
    $('#datetimepicker3').datetimepicker({
        locale: 'ru',
        Default: false,
        viewMode: 'years',
        stepping: 30,
        useCurrent: true
    });
    $('#datetimepicker4').datetimepicker({
        locale: 'ru',
        Default: false,
        viewMode: 'years',
        stepping: 30,
        useCurrent: true
    });
    $("#datetimepicker3").on("change.datetimepicker", function (e) {
        $('#datetimepicker4').datetimepicker('destroy');
        var mindatetime = e.date;
        var maxdatetime = moment(mindatetime).add(4,'hours');
        $('#datetimepicker4').datetimepicker({
            locale: 'ru',
            Default: false,
            viewMode: 'years',
            stepping: 30,
            format:'MM/DD/YYYY hh:mm A',
            minDate: mindatetime,
            maxDate: maxdatetime,
            useCurrent: true
        });
    });
    // events creation events offering services checkbox options
    $(".checkbox").change(function() {
        if(this.checked) {
            // alert('hi i m checked');
            $(".conditional1").css("display","block");
            $(".conditional2").css("display","block");
            $("#slot_time").attr("required","required");
            $("#slot_price").attr("required","required");
            $("#slot_persons").attr("required","required");
        }else{
            // alert('hi i m not checked');
             $(".conditional1").css("display","none");
             $(".conditional2").css("display","none");
             $("#slot_time").removeAttr("required");
            $("#slot_price").removeAttr("required");
            $("#slot_persons").removeAttr("required");
        }
    });
});

