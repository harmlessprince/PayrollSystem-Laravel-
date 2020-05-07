$(document).ready(function() {
    var counter_leave = 1;
    function addLeave() {
                var html = `<li class="list-group-item" id="leave_${counter_leave}">
                        <div class="row">   
                            <div class="col">
                            <div class="form-group">
                            <input type="text" class="form-control leave_type" name="leave_type[]"
                                id="leave_list">
                            </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" id="deleteLeave_${counter_leave}" class="form-control btn btn-danger remove" >
                                <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                              </svg>
                                </button>
                            </div>
                        </div>
                    </li>`;
                // fetchDeductins();
                $("#leave_list").append(html);
                counter_leave++;
    }

    //////////////////////Remove Allowances//////////////////
    function removeLeave() {
        var id = this.id;
        var split_id = id.split("_");
        var deleteindex = split_id[1];
        $("#leave_" + deleteindex).remove();
        counter_leave--;
        counter_leave++;
    }
    $(".leave_container").on("click", ".remove", removeLeave);
    $("#addLeave").on("click", addLeave);



    (function fetchLeaves() {
        $.ajax({
            url: "/fetch/leaves",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // console.log(data);
                var leave_options = data.map(element => {
                    return `<option value="${element.leave_type}">${element.leave_type}</option>`;
                });
              
               console.log(leave_options);
                if ( leave_options.length<=0 ) {
                    $("#leave_type").append("<option selected disabled>-------Please Create Leaves----------</option>");
                } else {
                    $("#leave_type").append("<option selected disabled>---------------Select----------------</option>");
                    $("#leave_type").append(leave_options);
                }
            }
        });
    })();
});
