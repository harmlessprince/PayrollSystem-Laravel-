$(document).ready(function() {


    //Generating Attendance Table
    $("#Report-form").on("submit", function(e) {
        e.preventDefault();

        var attendanceID = $("#attendanceType").val(); //Get attendance type id 
        var attendanceDate = $("#datePicker").val();    //Get Attendance date
      
        $.ajax({
            url: "/attendance/generateAttendance",
            type: "get",
            data: {
                _token: "{{ csrf_token() }}",
            },
            cache: false,
            dataType: "json",
            success: function(dataResult) {
                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = "";
                var i = 1;
                $.each(resultData,function(index,row){
                   bodyData += `
                   <tr>
                     <td>${row.id}</td>
                     <td>${row.employee_name}</td>
                     <td id="Attendancedate">${formatDate(date)}</td>
                     <td>
                       <select class="form-control">
                       <option selected>Choose...</option>
                       <option value="0">Absent</option>
                       <option value="1">Present</option>
                     </select>
                   </td>
                   </tr>`;
                });
               console.log(bodyData);
                $("#tableForAttendance").append(bodyData);
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
