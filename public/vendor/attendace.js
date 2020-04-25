$(document).ready(function() {
    // Generate Date Format
    var date = Date();
    document.getElementById("attendance_date").value = formatDate(date);

    function formatDate(date) {
        var d = new Date(date);
        month = "" + (d.getMonth() + 1);
        day = "" + d.getDate();
        year = d.getFullYear();

        if (month.length < 2) month = "0" + month;
        if (day.length < 2) day = "0" + day;

        return [year, month, day].join("-");
    }
   
    load_attendance();
    
    function load_attendance(attendance_department = "") {
        let counter = 1;
        $("#attendance_table").DataTable({
            // destroy: true,
            processing: true,
            serverside: true,
            ajax: {
                url: "/attendance",
                data: { attendance_department: attendance_department },
                type: "get"
            },
            columns: [
                { data: null },
                { data: "employee_name", name: "employee_name" },
                { data: "id", name: "user_id" },
                { data: "department.department_name", name: "department_name" },
                {
                    data: null,
                    name: "attendance_date",
                    defaultContent:`<div class="form-group">
                                        <input type="text" class="form-control text-center" style="width:8em; background-color:white; border:0" name="attendance_date[]" value= "${formatDate(date)}" id="attendance_date- ${counter++}" readonly>
                                        </div>`,
                },
                {
                    data: null,
                    name: "attendance_status",
                    defaultContent: `<div class="form-group">
                                        <select class="form-control" name="attendance_status[]" id="attendance_status-${counter++}">
                                        <option value="true">Present</option>
                                        <option value="false" selected>Absent</option>
                                        </select>
                                    </div>`
                }
            ],
            fnRowCallback: function(nRow, aData, iDisplayIndex) {
                $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
                return nRow;
            }
        });
    }

    $("#mark_attendance").on("click", function(event) {
        event.preventDefault();
        var table = $("#attendance_table").DataTable();
        let attendance_status = [];
        $("select[name='attendance_status[]']").each(function() {
            attendance_status.push($(this).val());
        });

        let attendance_date = [];
        $("input[name='attendance_date[]']").each(function() {
            attendance_date.push($(this).val());
        });

        var data = table
            .rows()
            .data()
            .toArray();
        
         data = data.map((item,i)=>{
            return {
                attendance_status: attendance_status[i],...item,
            }
        })

       var  attendance_data = data.map((item,i)=>{
            return {
                attendance_date: attendance_date[i],...item
            }
        })

        // let attendance_data = data.serializeArray();
        // console.log(attendance_data);

        $.each(attendance_data, function( k, v ) {
            $.each(v, function( key, value ) {
                console.log(  "name: " + key + ", Value: " + value );
            });
        });

      


      
        // $.ajax({
        //     url: "/store/attendance",
        //     method:"POST",
        //     data: { 'data': JSON.stringify(data) },
        //     success: function(data){
        //         console.log(data);
        //         alert('Sucess');
        //     },
        // });
       
    });

    // Filter Attendance Table
    $("#filter_attendance").on("click", function() {
        var attendance_department = $("#attendance_department").val();
        // console.log(attendance_department);
        if (attendance_department || attendance_department == "") {
            $("#attendance_table")
                .DataTable()
                .destroy();
            load_attendance(attendance_department);
        } else {
            load_attendance();
        }
    });

    // $("#selectAll").click(function() {
    //     $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    // });

    // $("input[type=checkbox]").click(function() {
    //     if (!$(this).prop("checked")) {
    //         $("#selectAll").prop("checked", false);
    //     }
    // });

    // var attendanceTable = $("#attendance_table").DataTable();

    // var data = attendanceTable.rows().data();

    // console.log("The table has " + data.length + " records");
    // console.log("Data", data);

    // getHolidays();

    // function getHolidays() {
    //     var apiUrl = "https://calendarific.com/api/v2/holidays?&api_key=baa9dc110aa712sd3a9fa2a3dwb6c01d4c875950dc32&country=NG&year=2020";
    //     $.ajax({
    //         url: apiUrl,
    //     }).done(function (items) {
    //         $.each(items, function(key, item){
    //             console.log(item);
    //         });
    //     });
    // }
});
