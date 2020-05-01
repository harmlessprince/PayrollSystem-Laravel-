$(document).ready(() => {
    $("#generate_payslip").prop("disabled", true);
    let generateYears = () => {
        var now = new Date().getFullYear();
        yearOptions = "";

        for (let index = now; index >= 2015; index--) {
            yearOptions += ` <option value="${index}"> ${index} </option>`;
        }
        $("#years")
            .append(yearOptions)
            .val(now);
        // $("#year").val(now);country
    };

    generateYears();

    let generateMonths = () => {
        let currentMonth = new Date().toLocaleString({}, { month: "long" });
        let months = [];
        monthOptions = "";
        for (var i = 0; i < 12; i++) {
            months.push(new Date(0, i).toLocaleString({}, { month: "long" }));
        }

        for (let index = 0; index < months.length; index++) {
            monthOptions += ` <option  value="${months[index]}"> ${months[index]} </option>`;
        }
        $("#months")
            .append(monthOptions)
            .val(currentMonth);
        // $("#month").val(currentMonth);
    };

    generateMonths();

    function removeSpinner() {
        $("#loader").removeClass("spinner-border  ");
    }

    let loadEmployees = () => {
        $(".departments").on("change", function() {
            var departmentId = $(this).val();
            if (departmentId) {
                $.ajax({
                    url: "/fetch/users/" + departmentId,
                    type: "GET",
                    dataType: "json",
                    beforeSend: function() {
                        $("#loader").addClass("spinner-border  ");
                    },
                    success: function(data) {
                        $("#users").empty();
                        $("#users").append(
                            ` <option disabled selected="${true}">-----Select-----</option>`
                        );
                        $.each(data, function(key, value) {
                            $("#users").append(
                                '<option value="' +
                                    key +
                                    '">' +
                                    value +
                                    "</option>"
                            );
                        });
                    },
                    complete: function() {
                        setTimeout(removeSpinner, 2000);
                        $("#generate_payslip").prop("disabled", false);
                    }
                });
            }
        });
    };
    loadEmployees();

    // Add Allowance and Remove Allowance
    var counter_allow = 1;
    function addAllownace() {
        $.ajax({
            url: "/fetch/allowances",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var allowance_options = data.allowan.map(element => {
                    return `<option value="${element.allowance_name}">${element.allowance_name}</option>`;
                });
                var html = `<li class="list-group-item" id="allowance_${counter_allow}">
                        <div class="row">   
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control " name="allowance_name[]" id="sel_${counter_allow}">4
                                        <option disabled selected="true"> -----Select----</option>
                                        ${allowance_options}
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <input type="number" class="form-control allowance" name="allowance_value[]" id="inp${counter_allow}">
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
                // fetchDeductins();
                $("#allowance_list").append(html);
                counter_allow++;
            }
        });
    }
    function removeAllowance() {
        var id = this.id;
        var split_id = id.split("_");
        var deleteindex = split_id[1];
        $("#allowance_" + deleteindex).remove();
        counter_allow--;
        counter_allow++;
    }
    $(".allowance_container").on("click", ".remove", removeAllowance);
    $("#addAllowance").on("click", addAllownace);

    // Add Deduction and Remove Deduction
    var counter_deduct = 1;
    function addDeduction() {
        $.ajax({
            url: "/fetch/deductions",
            type: "GET",
            // data: { user_id: user_id },
            dataType: "json",
            success: function(data) {
                var deduction_options = data.deduct.map(element => {
                    return `<option value="${element.deduction_name}">${element.deduction_name}</option>`;
                });
                var html = `<li class="list-group-item " id="deduction_${counter_deduct}">
                        <div class="row">   
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" name="deduction_name[]" id="selec${counter_deduct}">
                                        <option disabled selected="true"> -----Select----</option>
                                        ${deduction_options}
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <input type="number" class="form-control deduction" name="deduction_value[]" id="inp_${counter_deduct}">
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
                // fetchDeductins();
                $("#deduction_list").append(html);
                counter_deduct++;
            }
        });
        // return counter;
    }
    function removeDeduction() {
        var id = this.id;
        var split_id = id.split("_");
        var deleteindex = split_id[1];
        $("#deduction_" + deleteindex).remove();
        counter_deduct--;
        counter_deduct++;
    }
    $(".deduction_container").on("click", ".remove", removeDeduction);
    $("#addDeduction").on("click", addDeduction);

    let allowancesFormGroup = $("#allowance_list");
    let deductionsFormGroup = $("#deduction_list");


    function loadFinance(user_id = "") {
        var user_id = $("#users").val();
        $('#payslip-id').text(user_id+""+slipmonth+""+slipyear)
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
                   
                    $("#total_allowance").val(data.total_allowance);
                    $("#total_deduction").val(data.total_deduction);
                    data.result.forEach(element => {
                        // console.log(element);
                        // user_allowances = element.allowances;
                        // user_deductions = element.deductions;
                       
                        $("#user_id").val(element.id);
                        $('.slip-title').text(element.employee_name + " Payslip")
                        
                        $("#basic_salary").val(element.account.basic_salary);
                        $("#total_salary").val(element.account.total_salary);
                        
                    });
                },
                complete: function() {
                    // $("#allAllowances").ready(sumAllowances());
                    // $(".allDeductions").ready(sumDeductions());
                }
            });
        } else {
            alert("You must choose an employee");
        }
    }

    $("#generate_payslip").on("click", loadFinance);

    function sumDeductions() {
        // var sum_deductions = 0.0;

        $(".deduction").each(function() {
            sum_deductions += parseFloat($(this).val()) || 0;
        });

        $(".total_deduction").val(sum_deductions);
    }

    function sumAllowances() {
        var sum_allowances = 0.0;

        $(".allowance").each(function() {
            sum_allowances += parseFloat($(this).val()) || 0;
        });

        $(".total_allowance").val(sum_allowances);
        // console.log(sum_deductions);
    }

    $(".card")
        .hover(
            () => {
                this.focus();
            },
            function() {
                this.blur();
            }
        )
        .keyup(".allowance", function() {
            sumAllowances();
        });

    $(".card")
        .hover(
            () => {
                this.focus();
            },
            function() {
                this.blur();
            }
        )
        .keyup(".deduction", function() {
            sumDeductions();
        });

    (function fetchDeductins() {
        $.ajax({
            url: "/fetch/deductions",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var deduction_options = data.deduct.map(element => {
                    return `<option value="${element.deduction_name}">${element.deduction_name}</option>`;
                });
                $("#deduction_name").append(deduction_options);
            }
        });
    })();

    (function fetchAllowances() {
        $.ajax({
            url: "/fetch/allowances",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var allowance_options = data.allowan.map(element => {
                    return `<option value="${element.allowance_name}">${element.allowance_name}</option>`;
                });
                $("#allowance_name").append(allowance_options);
            }
        });
    })();

    $(".modal").on("hidden.bs.modal", function() {
        window.location.reload();
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $("#create-slip").click(function(e) {
        e.preventDefault();
       
        let user_id = $("#user_id").val();
        let payslip_year = $("#years").val();
        // console.log(payslip_year);
        let payslip_month = $("#months").val();
        let basic_salary = $("#basic_salary").val();
        let total_allowance = $("#total_allowance").val();
        let total_deduction = $("#total_deduction").val();
        let total_salary = $("#total_salary").val();
        let methodOfPayment = $("#methodOfPayment").val();
        let status = $("#status").val();
        let comment = $("#comment").val();
        $.ajax({
            url: "/store/payslip",
            method: "POST",
            data: {
                user_id: user_id,
                payslip_year: payslip_year,
                payslip_month: payslip_month,
                basic_salary: basic_salary,
                total_allowance: total_allowance,
                total_deduction: total_deduction,
                total_salary: total_salary,
                methodOfPayment: methodOfPayment,
                status: status,
                comment: comment
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message); //Message come from controller
                } else {
                    alert("Error");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });


    $('.modal').on('load', function(){
        $("select.country").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });
    });

    
    var slipyear = $(".year").val();
    var slipmonth = $(".month").val();

    console.log(slipyear, slipmonth)
   
    

    function calculateNetSalary() {
        let basic_salary = parseFloat($("#basic_salary").val()) || 0;
        let total_allowance = parseFloat($("#total_allowance").val()) || 0;
        let total_deduction = parseFloat($("#total_deduction").val()) || 0;
        let result = basic_salary + total_allowance - total_deduction;
        $("#total_salary").val(result);
    }

    $(".sumSalary").on("click", calculateNetSalary);
});
