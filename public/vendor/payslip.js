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
            } else {
                $("#users").empty();
                $("#users").append(
                    '<option value="">Select employee name</option>'
                );
            }
        });
    };
    loadEmployees();

    // function renderHello() {
    //     var template = document.getElementById("template").innerHTML;
    //     var rendered = Mustache.render(template, {});
    //     document.getElementById("target").innerHTML = rendered;
    // }
    // $("#generate_payslip").on("click", renderHello);
    // var counter = 1;

    // Add Allowance and Remove Allowance
    var counter_allow = 1;
    function addAllownace() {
        var html = `<li class="list-group-item" id="allowance_${counter_allow}">
                        <div class="row">   
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <input type="number" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" id="deleteAllowance_${counter_allow}" class="form-control btn btn-danger remove">
                                <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                              </svg>
                                </button>
                            </div>
                        </div>
                    </li>`;
        $("#allowance_list").append(html);
        counter_allow++;
        // return counter;
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
        var html = `<li class="list-group-item" id="deduction_${counter_deduct}">
                        <div class="row">   
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <input type="number" class="form-control" name="" id="">
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
        $("#deduction_list").append(html);
        counter_deduct++;
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
                    data.result.forEach(element => {
                        // console.log(element);
                        user_allowances = element.allowances;
                        user_deductions = element.deductions;
                        
                        $("#hidden_id").val(element.id);

                        // $("#hidden_id").val(element);

                        $.each(user_allowances, function(key, entry) {
                            // console.log(entry.pivot.allowance_name);
                                        let html = `<li class="list-group-item" id="allowance_${counter_allow}">
                                        <div class="row">   
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="" id="">
                                                        <option value="${entry.pivot.allowance_name}">${entry.pivot.allowance_name}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <input type="number" class="form-control" name="" id="" value="${entry.pivot.allowance_value}">
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
                                        let html = `<li class="list-group-item" id="deduction_${counter_deduct}">
                                        <div class="row">   
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="" id="">
                                                        <option value="${entry.pivot.deduction_name}">${entry.pivot.deduction_name}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <input type="number" class="form-control" name="" id="" value="${entry.pivot.deduction_value}">
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
                            // console.log(entry);
                            deductionsFormGroup.append(html);
                            // allowanceDropdown.append($('<option></option>').attr('value', entry.allowance_name).text(entry.allowance_name));
                        });
                    });
                },
                complete: function() {}
            });
        } else {
            alert("You must choose an employee");
        }
    }

    $("#generate_payslip").on("click", loadFinance);
});
  // let allowanceDropdown = $("#allowance_name");
    // allowanceDropdown.empty();

    // allowanceDropdown.append(
    //     '<option selected="true" disabled>Choose Allowance</option>'
    // );
    // allowanceDropdown.prop("selectedIndex", 0);