$(document).ready(function() {
    let allowancesFormGroup = $("#allowance_list");
    let deductionsFormGroup = $("#deduction_list");
    var counter_allow = 1;
    var counter_deduct = 1;
    function loadFinance(user_id = "") {
        var user_id = $("#user_id").val();
        if (user_id) {
            $.ajax({
                url: "/fetch/employee-fiance/" + user_id,
                type: "GET",
                data: { user_id: user_id },
                dataType: "json",
                beforeSend: function() {
                    // $("#loader").addClass("spinner-border  ");
                },
                success: function(data) {
                    console.log(data);
                    // console.log(data.deduct);
                    data.result.forEach(element => {
                        // console.log(element);
                        user_allowances = element.allowances;
                        user_deductions = element.deductions;

                        // $("#hidden_id").val(element.id);

                        // $("#hidden_id").val(element.id);
                        $("#basic_salary").val(element.account.basic_salary);
                        $("#total_salary").val(element.account.total_salary);
                        // $("#hidden_id").val(element);

                        $.each(user_allowances, function(key, entry) {
                            // console.log(entry.pivot.allowance_name);

                            let allowance_options = data.allowan.map(
                                element => {
                                    if ( entry.pivot.allowance_name ==
                                        element.allowance_name
                                    ) {
                                        return `<option value="${element.allowance_name}" selected>${element.allowance_name}</option>`;
                                    } else {
                                        return `<option value="${element.allowance_name}">${element.allowance_name}</option>`;
                                    }
                                }
                            );
                            let html = `<li class="list-group-item" id="allowance_${counter_allow}">
                                        <div class="row">   
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="allowance_name[]" id="">
                                                    
                                                    <option disabled selected="true"> -----Select----</option>
                                                       ${allowance_options}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <input type="number" class="form-control allowance" name="allowance_value[]" id="" value="${entry.pivot.allowance_value}">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" id="deleteAllowance_${counter_allow}" class="form-control btn btn-danger remove" >
                                                <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                                            </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>`;
                            // console.log(entry);
                            counter_allow++;
                            allowancesFormGroup.append(html);

                            // allowanceDropdown.append($('<option></option>').attr('value', entry.allowance_name).text(entry.allowance_name));
                        });
                        $.each(user_deductions, function(key, entry) {
                            // console.log(entry.pivot.allowance_name);

                            let deduction_options = data.deduct.map(element => {
                                if (
                                    entry.pivot.deduction_name ==
                                    element.deduction_name
                                ) {
                                    return `<option value="${element.deduction_name}" selected>${element.deduction_name}</option>`;
                                } else {
                                    return `<option value="${element.deduction_name}">${element.deduction_name}</option>`;
                                }
                            });
                            let html = `<li class="list-group-item" id="deduction_${counter_deduct}">
                                        <div class="row">   
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="deduction_name[]" id="">
                                                        ${deduction_options}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <input type="number" class="form-control deduction" name="deduction_value[]" id="" value="${entry.pivot.deduction_value}">
                                                
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" id="deleteDeduction_${counter_deduct}" class="form-control btn btn-danger remove" >
                                                <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                                            </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>`;
                            counter_deduct++;
                            // counter_deduct++;
                            // console.log(entry);
                            deductionsFormGroup.append(html);
                            // allowanceDropdown.append($('<option></option>').attr('value', entry.allowance_name).text(entry.allowance_name));
                        });
                    });
                },
                complete: function() {

                    $("#allAllowances").ready(sumAllowances());
                    $(".allDeductions").ready(sumDeductions());
                }
            });
        } else {
            alert("You must choose an employee");
        }
    }
    loadFinance();

    function sumAllowances() {
        var sum_allowances = 0.0;

        $(".allowance").each(function() {
            sum_allowances += parseFloat($(this).val()) || 0;
        });

        $(".total_allowance").val(sum_allowances);
        calculateNetSalary();
        // console.log(sum_deductions);
    }
    function sumDeductions() {
        var sum_deductions = 0.0;

        $(".deduction").each(function() {
            sum_deductions += parseFloat($(this).val()) || 0;
        });

        $(".total_deduction").val(sum_deductions);
        calculateNetSalary();
    }

    function calculateNetSalary() {
        let basic_salary =
            parseFloat($("#basic_salary").val()) || 0;
        let total_allowance =
            parseFloat($("#total_allowance").val()) || 0;
        let total_deduction =
            parseFloat($("#total_deduction").val()) || 0;
        let result =
            basic_salary + total_allowance - total_deduction;
        $("#total_salary").val(result);
    } 
});
