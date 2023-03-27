function preview() {
  thumb.src = URL.createObjectURL(event.target.files[0]);
}

// Employee Add Photo
function uploadEmpImg() {
  if ($("#emp_profile_pic").val()) {
    let img = $("#emp_profile_pic").prop("files")[0];
    let empCode = $("#emp_code").val();
    var formData = new FormData();
    formData.append("emp_profile_pic", img);
    formData.append("emp_code", empCode);
    $.ajax({
      type: "POST",
      url: "./php/actions.php?action=upload_emp_profile",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == 200) {
          toastr.success(res.message);
        } else {
          toastr.error(res.message);
        }
      },
      error: function (res) {
        res = JSON.parse(res);
        toastr.error(res.message);
      },
    });
  }
}

function uploadExpImg(id) {
  if ($("#exp_bill_photo").val()) {
    let img = $("#exp_bill_photo").prop("files")[0];
    var formData = new FormData();
    formData.append("exp_bill_photo", img);
    formData.append("exp_id", id);
    $.ajax({
      type: "POST",
      url: "./php/actions.php?action=upload_exp_profile",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == 200) {
          toastr.success(res.message);
        } else {
          toastr.error(res.message);
        }
      },
      error: function (res) {
        res = JSON.parse(res);
        toastr.error(res.message);
      },
    });
  } else {
  }
}

$(document).ready(function () {
  // User Login
  $("#user_login").validate({
    rules: {
      user_email: "required",
      user_password: "required",
      user_email: {
        required: true,
        email: true,
      },
      user_password: {
        required: true,
        minlength: 6,
        maxlength: 16,
      },
    },
    messages: {
      user_email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
      user_password: {
        required: "Please provide a valid password",
        minlength: "password must be min 6 characters long",
        maxlength: "Password must not be more than 16 characters long",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=login_application_user",
        data: $("#user_login").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            setTimeout(() => {
              window.location = "./index.php";
            }, 2000);
          } else {
            toastr.error(res.message);
          }
        },
      });
    },
  });

  // User change password
  $("#change_user_form").validate({
    rules: {
      user_old_password: "required",
      user_password: "required",
      user_confirm_password: "required",
      user_old_password: {
        required: true,
        minlength: 6,
        maxlength: 16,
      },
      user_password: {
        required: true,
        minlength: 6,
        maxlength: 16,
      },
      user_confirm_password: {
        required: true,
        minlength: 6,
        maxlength: 16,
        equalTo: "#user_password",
      },
    },
    messages: {
      user_old_password: {
        required: "Please provide a valid password",
        minlength: "Password must be at least 6 characters long",
        maxlength: "Password must not be more than 16 characters long",
      },
      user_password: {
        required: "Please provide a valid password",
        minlength: "Password must be at least 6 characters long",
        maxlength: "Password must not be more than 16 characters long",
      },
      user_confirm_password: {
        required: "Please provide a valid password",
        minlength: "Password must be at least 6 characters long",
        maxlength: "Password must not be more than 16 characters long",
        equalTo: "Passwords do not match",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=change_password",
        data: $("#change_user_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#change_user_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Password Reset
  $("#reset_password").validate({
    rules: {
      user_email: "required",
      user_email: {
        required: true,
        email: true,
      },
    },
    messages: {
      user_email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=email_verification",
        data: $("#reset_password").serialize(),
        type: "POST",
        success: function (res) {
          console.log(res);
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            setTimeout(() => {
              window.location = "./verify-otp.php";
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // OTP Verification
  $("#otp_verify_form").validate({
    rules: {
      user_otp: "required",
      user_otp: {
        required: true,
        minlength: 6,
        maxlength: 6,
      },
    },
    messages: {
      user_otp: {
        required: "Please enter OTP",
        minlength: "Please provide valid OTP ",
        minlength: "Please provide valid OTP ",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=otp_verification",
        data: $("#otp_verify_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            toastr.info(
              "Please check your email, new password is coming soon."
            );
            setTimeout(() => {
              window.location = "./user-login.php";
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Employee Add
  $("#new_employee_form").validate({
    rules: {
      emp_first_name: "required",
      emp_last_name: "required",
      emp_gender: "required",
      emp_dob: "required",
      emp_mob: "required",
      emp_email: "required",
      emp_department: "required",
      emp_designation: "required",
      emp_joining_date: "required",
      emp_working_hours: "required",
      emp_first_name: {
        required: true,
      },
      emp_last_name: {
        required: true,
      },
      emp_gender: {
        required: true,
      },
      emp_dob: {
        required: true,
      },
      emp_mob: {
        required: true,
        minlength: 10,
        maxlength: 10,
        number: true,
      },
      emp_email: {
        required: true,
        email: true,
      },
      emp_department: {
        required: true,
      },
      emp_designation: {
        required: true,
      },
      emp_joining_date: {
        required: true,
      },
      emp_working_hours: {
        required: true,
      },
    },
    messages: {
      emp_first_name: "Please provide a valid first name",
      emp_last_name: "Please provide a valid last name",
      emp_gender: "Please select a valid gender",
      emp_dob: "Please select a valid date",
      emp_mob: {
        required: "Please provide a phone number",
        minlength: "Phone number must be min 10 characters long",
        maxlength: "Phone number must not be more than 10 characters long",
      },
      emp_email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
      emp_department: "Please select a valid department",
      emp_designation: "Please select a valid designation",
      emp_joining_date: "Please select a valid date",
      emp_working_hours: "Please select a valid time",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_employee",
        data: $("#new_employee_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            uploadEmpImg();
            $("#new_employee_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Employee Update
  $("#edit_employee_form").validate({
    rules: {
      emp_code: "required",
      emp_first_name: "required",
      emp_last_name: "required",
      emp_gender: "required",
      emp_dob: "required",
      emp_mob: "required",
      emp_email: "required",
      emp_department: "required",
      emp_designation: "required",
      emp_joining_date: "required",
      emp_working_hours: "required",
      emp_code: {
        required: true,
      },
      emp_first_name: {
        required: true,
      },
      emp_last_name: {
        required: true,
      },
      emp_gender: {
        required: true,
      },
      emp_dob: {
        required: true,
      },
      emp_mob: {
        required: true,
        minlength: 10,
        maxlength: 10,
        number: true,
      },
      emp_email: {
        required: true,
        email: true,
      },
      emp_department: {
        required: true,
      },
      emp_designation: {
        required: true,
      },
      emp_joining_date: {
        required: true,
      },
      emp_working_hours: {
        required: true,
      },
    },
    messages: {
      emp_code: "Please provide a valid Code",
      emp_first_name: "Please provide a valid first name",
      emp_last_name: "Please provide a valid last name",
      emp_gender: "Please select a valid gender",
      emp_dob: "Please select a valid date",
      emp_mob: {
        required: "Please provide a phone number",
        minlength: "Phone number must be min 10 characters long",
        maxlength: "Phone number must not be more than 10 characters long",
      },
      emp_email: {
        required: "Please enter your email",
        minlength: "Please enter a valid email address",
      },
      emp_department: "Please select a valid department",
      emp_designation: "Please select a valid designation",
      emp_joining_date: "Please select a valid date",
      emp_working_hours: "Please select a valid time",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=edit_employee",
        data: $("#edit_employee_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            uploadEmpImg();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // User New
  $("#new_user_form").validate({
    rules: {
      user_email: "required",
      user_password: "required",
      user_confirm_password: "required",
      user_access_type: "required",
      user_email: {
        required: true,
      },
      user_password: {
        required: true,
        minlength: 6,
        maxlength: 16,
      },
      user_confirm_password: {
        required: true,
        minlength: 6,
        maxlength: 16,
        equalTo: "#user_password",
      },
      user_access_type: {
        required: true,
      },
    },
    messages: {
      user_email: {
        required: "Please Select a valid Name",
      },
      user_password: {
        required: "Please provide a valid password",
        minlength: "Password must be at least 6 characters long",
        maxlength: "Password must not be more than 16 characters long",
      },
      user_confirm_password: {
        required: "Please provide a valid password",
        minlength: "Password must be at least 6 characters long",
        maxlength: "Password must not be more than 16 characters long",
        equalTo: "Passwords do not match",
      },
      user_access_type: "Please Select a valid Access Type",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_user",
        data: $("#new_user_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_user_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Leave Type Add
  $("#new_leave_type").validate({
    rules: {
      leave_type: "required",
      leave_description: "required",
      leave_type: {
        required: true,
      },
      leave_description: {
        required: true,
        minlength: 20,
        maxlength: 200,
      },
    },
    messages: {
      leave_type: "Please provide a valid Type",
      leave_description: {
        required: "Please provide a valid Description",
        minlength: "Description must be min 20 characters long",
        maxlength: "Description must be max 200 characters long",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_leaveType",
        data: $("#new_leave_type").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_leave_type")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Leave Type Update
  $("#edit_leave_type").validate({
    rules: {
      leave_type: "required",
      leave_description: "required",
      leave_type: {
        required: true,
      },
      leave_description: {
        required: true,
        minlength: 20,
        maxlength: 200,
      },
    },
    messages: {
      leave_type: "Please provide a valid Type",
      leave_description: {
        required: "Please provide a valid Description",
        minlength: "Description must be min 20 characters long",
        maxlength: "Description must be max 200 characters long",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=edit_leaveType",
        data: $("#edit_leave_type").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Leave Add
  $("#new_leave").validate({
    rules: {
      leave_type: "required",
      from_date: "required",
      to_date: "required",
      leave_type: {
        required: true,
      },
      from_date: {
        required: true,
      },
      to_date: {
        required: true,
      },
    },
    messages: {
      leave_type: "Please Select a valid Type",
      from_date: "Please provide a valid Date",
      to_date: "Please provide a valid Date",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_leave",
        data: $("#new_leave").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_leave")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Leave Update
  $("#leave_action").validate({
    rules: {
      leave_status: "required",
      admin_remarks: "required",
      leave_status: {
        required: true,
      },
      admin_remarks: {
        required: true,
      },
    },
    messages: {
      leave_status: "Please Select a valid Status",
      admin_remarks: "Please provide a valid Remark",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=take_leave_action",
        data: $("#leave_action").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            setTimeout(() => {
              location.reload();
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Productivity Add
  $("#new_productivity_form").validate({
    rules: {
      productivity_subject: "required",
      productivity_date: "required",
      start_time: "required",
      end_time: "required",
      productivity_comments: "required",
      productivity_subject: {
        required: true,
      },
      productivity_date: {
        required: true,
      },
      start_time: {
        required: true,
      },
      end_time: {
        required: true,
      },
      productivity_comments: {
        required: true,
        minlength: 10,
        maxlength: 200,
      },
    },
    messages: {
      productivity_subject: "Please provide a valid subject",
      productivity_date: "Please provide a valid date",
      start_time: "Please select a valid start time",
      end_time: "Please select a valid end time",
      productivity_comments: {
        required: "Please provide a valid description",
        minlength: "Comments must be min 10 characters long",
        maxlength: "Comments must not be more than 200 characters long",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_productivity",
        data: $("#new_productivity_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_productivity_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Productivity Update
  $("#edit_productivity_form").validate({
    rules: {
      productivity_subject: "required",
      productivity_date: "required",
      start_time: "required",
      end_time: "required",
      productivity_comments: "required",
      productivity_subject: {
        required: true,
      },
      productivity_date: {
        required: true,
      },
      start_time: {
        required: true,
      },
      end_time: {
        required: true,
      },
      productivity_comments: {
        required: true,
        minlength: 10,
        maxlength: 200,
      },
    },
    messages: {
      productivity_subject: "Please provide a valid subject",
      productivity_date: "Please provide a valid date",
      start_time: "Please select valid start time",
      end_time: "Please select valid end time",
      productivity_comments: {
        required: "Please provide valid description",
        minlength: "Comments must be min 10 characters long",
        maxlength: "Comments must not be more than 200 characters long",
      },
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=edit_productivity",
        data: $("#edit_productivity_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            setTimeout(() => {
              location.reload();
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Task Add
  $("#new_task_form").validate({
    rules: {
      task_name: "required",
      task_description: "required",
      task_assign_to: "required",
      task_name: {
        required: true,
      },
      task_description: {
        required: true,
        minlength: 10,
        maxlength: 200,
      },
      task_assign_to: {
        required: true,
      },
    },
    messages: {
      task_name: "Please provide a valid Name",
      task_description: {
        required: "Please provide a Description",
        minlength: "Description must be min 10 characters long",
        maxlength: "Description must not be more than 200 characters long",
      },
      task_assign_to: "Please select a valid Employees",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_task",
        data: $("#new_task_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_task_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Edit Task
  $("#edit_task_form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "./php/actions.php?action=edit_task",
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: "POST",
      type: "POST",
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == 200) {
          toastr.success(res.message);
          setTimeout(() => {
            location.reload();
          }, 3000);
        } else {
          toastr.error(res.message);
        }
      },
      error: function (res) {
        res = JSON.parse(res);
        toastr.error(res.message);
      },
    });
  });

  // Project Add
  $("#new_project_form").validate({
    rules: {
      project_name: "required",
      project_status: "required",
      project_code: "required",
      client_id: "required",
      start_date: "required",
      hod_id: "required",
      nature_of_project: "required",
      project_location: "required",
      project_name: {
        required: true,
      },
      project_status: {
        required: true,
      },
      project_code: {
        required: true,
      },
      client_id: {
        required: true,
      },
      start_date: {
        required: true,
      },
      hod_id: {
        required: true,
      },
      nature_of_project: {
        required: true,
      },
      project_location: {
        required: true,
      },
    },
    messages: {
      project_name: "Please provide a valid name",
      project_status: "Please select a valid status",
      project_code: "Please provide a valid code",
      client_id: "Please select a valid client",
      start_date: "Please select a valid date",
      hod_id: {
        required: "Please select a valid hod",
      },
      nature_of_project: {
        required: "Please select valid type",
      },
      project_location: "Please provide a valid location",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_project",
        data: $("#new_project_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_project_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Project Update
  $("#edit_project_form").validate({
    rules: {
      project_name: "required",
      project_status: "required",
      project_code: "required",
      client_id: "required",
      start_date: "required",
      hod_id: "required",
      nature_of_project: "required",
      project_location: "required",
      project_name: {
        required: true,
      },
      project_status: {
        required: true,
      },
      project_code: {
        required: true,
      },
      client_id: {
        required: true,
      },
      start_date: {
        required: true,
      },
      hod_id: {
        required: true,
      },
      nature_of_project: {
        required: true,
      },
      project_location: {
        required: true,
      },
    },
    messages: {
      project_name: "Please provide a valid name",
      project_status: "Please select a valid status",
      project_code: "Please provide a valid code",
      client_id: "Please select a valid client",
      start_date: "Please select a valid date",
      hod_id: {
        required: "Please select a valid hod",
      },
      nature_of_project: {
        required: "Please select valid type",
      },
      project_location: "Please provide a valid location",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=edit_project",
        data: $("#edit_project_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            setTimeout(() => {
              location.reload();
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Client Add
  $("#new_client_form").validate({
    rules: {
      client_first_name: "required",
      client_last_name: "required",
      client_email: "required",
      client_first_name: {
        required: true,
      },
      client_last_name: {
        required: true,
      },
      client_email: {
        required: true,
        email: true,
      },
    },
    messages: {
      client_first_name: {
        required: "Please provide a valid First Name",
      },
      client_last_name: {
        required: "Please provide a valid Last Name",
      },
      client_email: "Please Provide valid Email",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_client",
        data: $("#new_client_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            $("#new_client_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Client Update
  $("#edit_client_form").validate({
    rules: {
      client_first_name: "required",
      client_last_name: "required",
      client_email: "required",
      client_first_name: {
        required: true,
      },
      client_last_name: {
        required: true,
      },
      client_email: {
        required: true,
        email: true,
      },
    },
    messages: {
      client_first_name: {
        required: "Please provide a valid First Name",
      },
      client_last_name: {
        required: "Please provide a valid Last Name",
      },
      client_email: "Please Provide valid Email",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=edit_client",
        data: $("#edit_client_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            toastr.success(res.message);
            setTimeout(() => {
              location.reload();
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Expense Add
  $("#new_exp_form").validate({
    rules: {
      exp_name: "required",
      exp_amount: "required",
      exp_date: "required",
      exp_bill_photo: "required",
      exp_name: {
        required: true,
      },
      exp_amount: {
        required: true,
      },
      exp_date: {
        required: true,
      },
      exp_bill_photo: {
        required: true,
      },
    },
    messages: {
      exp_name: "Please provide a valid name",
      exp_amount: "Please provide a valid amount",
      exp_date: "Please select a valid date",
      exp_bill_photo: "Please select a valid photo",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=save_exp",
        data: $("#new_exp_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            uploadExpImg(res.id);
            $("#new_exp_form")[0].reset();
            toastr.success(res.message);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });

  // Expense Update
  $("#edit_exp_form").validate({
    rules: {
      exp_name: "required",
      exp_amount: "required",
      exp_date: "required",
      exp_bill_photo: "required",
      exp_name: {
        required: true,
      },
      exp_amount: {
        required: true,
      },
      exp_date: {
        required: true,
      },
      exp_bill_photo: {
        required: true,
      },
    },
    messages: {
      exp_name: "Please provide a valid name",
      exp_amount: "Please provide a valid amount",
      exp_date: "Please select a valid date",
      exp_bill_photo: "Please select a valid photo",
    },
    submitHandler: function (form) {
      $.ajax({
        url: "./php/actions.php?action=edit_exp",
        data: $("#edit_exp_form").serialize(),
        type: "POST",
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == 200) {
            uploadExpImg(res.id);
            toastr.success(res.message);
            setTimeout(() => {
              location.reload();
            }, 3000);
          } else {
            toastr.error(res.message);
          }
        },
        error: function (res) {
          res = JSON.parse(res);
          toastr.error(res.message);
        },
      });
    },
  });
});
