$(document).ready(function() {


    //Generating Attendance Table
    $("#Report-form").on("submit", function(e) {
        e.preventDefault();
        var attendanceID = $("#attendanceType").val(); //Get attendance type id 
        var attendanceDate = $("#datePicker").val();    //Get Attendance date
        var i = 
        $("#dataTable").dataTable({
            "destroy": true,
            "processing":true,
            "serverside": true,
            "ajax": "/attendance/generateAttendance",
            "columns":[
                {"data": null},
                {"data": "employee_name"},
                {"data":  null,"defaultContent": formatDate(date)},
                {"data": null},
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
                $("td:nth-child(4)", nRow).html(`<select class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option value="0">Absent</option>
                                                    <option value="1">Present</option>
                                                </select>`);
                return nRow;
            }
            
        });
        
        
    });

    // Generate Date Format
    var date = Date();
    document.getElementById("datePicker").value = formatDate(date);

 
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
