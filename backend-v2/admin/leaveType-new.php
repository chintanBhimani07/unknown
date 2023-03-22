<style>
    .error {
        color: #ff0000 !important;
        position: relative !important;
        line-height: 1 !important;
        font-size: 1rem !important;
        width: 100% !important;
    }

    .form-control.error {
        border: 1px solid #ff0000;
        color: #5a5c69 !important
    }
</style>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Leave Type</h1>
        <a href="./index.php?page=leave-types" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Leave Types</a>
    </div>

    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_leave_type">
                        <div class="form-group">
                            <label for="leave_type" class="col-form-label mr-1">Leave Type</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="leave_type" name="leave_type" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="leave_description" class="col-form-label mr-1">Leave Description</label><span class="text-danger">*</span>
                            <textarea type="text" class="form-control" id="leave_description" name="leave_description" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=leave-types" class="btn btn-warning btn-user btn-block text-dark">Back to Leave Types List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#new_leave_type").validate({
            // Define validation rules
            rules: {
                leave_type: "required",
                leave_description: "required",
                leave_type: {
                    required: true
                },
                leave_description: {
                    required: true,
                    minlength:20,
                    maxlength:200,
                },
            },
            // Specify validation error messages
            messages: {
                leave_type: "Please provide a valid Type",
                leave_description: {
                    required:"Please provide a valid Description",
                    minlength:"Description must be min 20 characters long",
                    maxlength:"Description must be max 200 characters long"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: './php/actions.php?action=save_leaveType',
                    data: $("#new_leave_type").serialize(),
                    type: 'POST',
                    success: function(res) {
                        console.log(res);
                        if (res.status == 200) {
                            $('#new_leave_type').append(
                                `<div class="alert alert-success  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>`
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            $('#new_leave_type').append(
                                `<div class="alert alert-danger  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>`
                            );
                            setTimeout(function() {
                                $('.showMessage').hide();
                            }, 3000);
                        }
                    }
                });
            }
        });
    });
</script>