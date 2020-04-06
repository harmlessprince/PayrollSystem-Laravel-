$(document).ready(function() {
    var allowance_count = 1;

    var deduction_count = 1;

    $("#allowance").click(function() {
        allowance_count++;

        $("#allowance_list").append(
            '<div class="form-group row" id ="allowance-input-' +
                allowance_count +
                '">' +
                '<div class="input-group mb-3">' +
                ' <div class="input-group-prepend"> <span class="input-group-text">₦</span></div>' +
                '<input type="text" class="form-control reset" id = "allowance_name[]" name="allowance_name[]" placeholder="Enter Allowance">' +
                '<div class="col-auto"><a class="btn btn-danger text-white btn_remove_allowance" id="' +
                allowance_count +
                '"> <i class="fas fa-minus"></i> </a></div>' +
                "</div>" +
                "</div>"
        );
    });

    //Deleting the dynamically generated Allowance input
    $(document).on("click", ".btn_remove_allowance", function() {
        var button_id = $(this).attr("id");
        $("#allowance-input-" + button_id + "").remove();
    });

    $("#deduction").click(function() {
        deduction_count++;

        $("#deduction_list").append(
            '<div class="form-group row" id ="deduction-input-' +
                deduction_count +
                '">' +
                '<div class="input-group mb-3">' +
                ' <div class="input-group-prepend"> <span class="input-group-text">₦</span></div>' +
                '<input type="text" class="form-control reset" id = "deduction_name[]" name="deduction_name[]" placeholder="Enter Deduction">' +
                '<div class="col-auto"><a class="btn btn-danger text-white btn_remove_deduction" id="' +
                deduction_count +
                '"> <i class="fas fa-minus"></i> </a></div>' +
                "</div>" +
                "</div>"
        );
    });

    //Deleting the dynamically generated Deduction input
    $(document).on("click", ".btn_remove_deduction", function() {
        var button_id = $(this).attr("id");
        $("#deduction-input-" + button_id + "").remove();
    });

    $(".reset_form_lallowance_deduction").click(function() {
        $(".reset").val("");
    });

   
});
