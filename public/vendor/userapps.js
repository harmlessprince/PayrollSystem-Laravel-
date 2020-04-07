$(document).ready(function() {
    //Generating dydnamic input

    var count = 0;

    $("#add_new_input").click(function() {
        count++;

        $("#desigantion_list").append(
            '<div class="form-group row" id="desigantion_input-' +
                count +
                '">' +
                '<input type="text" name="designation_name[]" id="designation_name[' +
                count +
                ']" class="form-control col mr-1" placeholder="Enter Designation Name">' +
                ' <input type="button" class="col-auto btn btn-danger btn_remove" id="' +
                count +
                '" value="delete">' +
                "</div>"
        );
    });

    //Deleting the dynamically generated input
    $(document).on("click", ".btn_remove", function() {
        var button_id = $(this).attr("id");
        $("#desigantion_input-" + button_id + "").remove();
    });

    $(".reset-form").click(function() {
        $("#myform").trigger("reset");
    });

    // Get Designations
    $('select[name="department_name"]').on("change", function() {
        var departmentId = $(this).val();

        // console.log(departmentId);
        if (departmentId) {
            $.ajax({
                url: "/desigantions/get/" + departmentId,
                type: "GET",
                dataType: "json",
                beforeSend: function() {
                    $("#loaderdesignation").css("visibility", "visible");
                },
                success: function(data) {
                    $('select[name="designation_name"]').empty();

                    $.each(data, function(key, value) {
                        $('select[name="designation_name"]').append(
                            '<option value="' + key + '">' + value + "</option>"
                        );
                    });
                },
                complete: function() {
                    $("#loaderdesignation").css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="designation_name"]').value();
        }
    });

  
        $('#userAllowance').change(function() {
            dropdownval = $(this).val();
            console.log(dropdownval);
            $('#userAllowance').not(this).find('option[value="' + dropdownval + '"]').remove();
        });
    
    


    var $firstAllowance = $("#allowance-form");
    var counter_allowance = 1;
    $("#insert_new_allowance").on("click", function() {

        var $clonedAllowance = $firstAllowance.clone(true);

        $clonedAllowance
            .find("input")
            .attr("id", "allowance-" + counter_allowance);

        $clonedAllowance.find("user_allowance_list");



        $("#user_allowance_list").append($clonedAllowance);


   
        removeClonedAllowance($clonedAllowance);
        sumAllowances();
        counter_allowance++;
    });

    function removeClonedAllowance($allowanceForm) {
        $allowanceForm.find(".btn_remove_allowance").on("click", function() {
            $allowanceForm.remove();
            sumAllowances();
        });
    }

    removeClonedAllowance($firstAllowance);

    var counter_deduction = 1;
    var $firstDeduction = $("#deduction-form");

    $("#insert_new_deduction").on("click", function() {
        var $clonedDeduction = $firstDeduction.clone();

        $clonedDeduction
            .find("input")
            .attr("id", "deduction-" + counter_deduction);

        $clonedDeduction.find("user_deduction_list");
        // counter++;
        $("#user_deduction_list").append($clonedDeduction);

        counter_deduction++;
        removeClonedDeduction($clonedDeduction);
        sumDeductions();
    });

    function removeClonedDeduction($deductionForm) {
        $deductionForm.find(".btn_remove_deduction").on("click", function() {
            $deductionForm.remove();
            sumDeductions();
        });
    }

    removeClonedDeduction($firstDeduction);
    // Calc Inline Total
    $("#financialDetails").on(
        "keyup",
        ".total_allowance, .total_deduction",
        function() {
            // var basicSalary = parseFloat($(".basic_salary")).val();

            var allowanceValue = parseFloat($("#total_allowance").val()) || 0; // get value of field
            var deductionValue = parseFloat($("#total_deduction").val()) || 0; // convert it to a float
            var finalAnswer = (-deductionValue + allowanceValue).toString();
            $("#total_salary").val(finalAnswer);
        }
    );

    function sumDeductions() {
        var sum_deductions = 0.0;

        $(".deduction").each(function() {
            sum_deductions += parseFloat($(this).val());
        });

        $(".total_deduction").val(sum_deductions);
        // console.log(sum_deductions);
    }

    function sumAllowances() {
        var sum_allowances = 0.0;

        $(".allowance").each(function() {
            sum_allowances += parseFloat($(this).val());
        });

        $(".total_allowance").val(sum_allowances);
        // console.log(sum_deductions);
    }

    $("#financialDetails").on("keyup", ".deduction", function() {
        sumDeductions();
    });


    $("#financialDetails").ready(sumDeductions());

    $("#financialDetails").ready(sumAllowances());


    $("#financialDetails").on("keyup", ".allowance", function() {
        sumAllowances();
    });

    // $("#financialDetails").on("keyup", ".basic_salary", function() {
    //     var basicSalary = parseFloat($("#basic_salary").val()) || 0;

    //     console.log(basicSalary);
    // });

    $("#calcTotalSalary").click(function() {
        var valueOfBasicSalary = parseFloat($("#basic_salary").val()) || 0;
        var valueOfTotalDeduction = parseFloat($("#total_deduction").val()) || 0;
        var valueOfTotalAllowance = parseFloat($("#total_allowance").val()) || 0;

        valueOfTotalSalary = parseFloat ( valueOfBasicSalary + valueOfTotalAllowance - valueOfTotalDeduction );

        $("#total_salary").val(valueOfTotalSalary) ;

        // alert(valueOfTotalSalary);
    });



});

