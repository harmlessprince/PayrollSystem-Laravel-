$(document).ready(function() {
    //Generating Attendance Table
    $("#Report-form").on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "/attendance/daily",
            type: "GET",
            dataType: "json",
            success: function(data) {
                alert("Data Loaded");
            }
        });
    });



    // Generate Date Format
    var date = Date();
    document.getElementById("datePicker").value = formatDate(date);

    document.getElementById("Attendancedate").textContent =   document.getElementById("datePicker").value = formatDate(date);
    function formatDate(date) {
        var d = new Date(date);
        month = "" + (d.getMonth() + 1);
        day = "" + d.getDate();
        year = d.getFullYear();

        if (month.length < 2) month = "0" + month;
        if (day.length < 2) day = "0" + day;

        return [year, month, day].join("-");
    }
});
