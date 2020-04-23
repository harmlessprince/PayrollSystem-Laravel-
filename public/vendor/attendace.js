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
        $("#attendance_table").DataTable({
            destroy: true,
            processing: true,
            serverside: true,
            ajax: {
                url: "/attendance",
                data: { attendance_department: attendance_department },
                type: "get"
            },
            columns: [
                { data: null },
                { data: "employee_name" },
                { data: "department.department_name" },
                {
                    data: null,
                    defaultContent: formatDate(date)
                },
                { data: null }
            ],
            fnRowCallback: function(nRow, aData, iDisplayIndex) {
                $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
                $("td:nth-child(5)", nRow).html(`<div class="form-group">
                                                    <select class="form-control" name="attendance_status[]" id="attendance_status">
                                                    <option value="true">Present</option>
                                                    <option value="false" selected>Absent</option>
                                                    </select>
                                                </div>`);
                return nRow;
            }
        });
    }

    // <input type="checkbox" name="attendance_status[]" id="attendance_status" value="false"></input>

    $("#filter_attendance").on("click", function() {
        var attendance_department = $("#attendance_department").val();
        // console.log(attendance_department);
        if (attendance_department) {
            $("#attendance_table")
                .DataTable()
                .destroy();
            load_attendance(attendance_department);
        } else {
            load_attendance();
        }
    });

    $("#selectAll").click(function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    });

    $("input[type=checkbox]").click(function() {
        if (!$(this).prop("checked")) {
            $("#selectAll").prop("checked", false);
        }
    });

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