<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Department</h1>
        <a href="./index.php?page=department-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Departments</a>
    </div>

    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_department_form">
                        <div class="form-group ">
                            <label for="department_name" class="col-form-label mr-1">Department Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="department_name" name="department_name" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="department_hod" class="col-form-label mr-1">Hade Of Department</label>
                            <input type="text" class="form-control" id="department_hod" name="department_hod" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="department_employees" class="col-form-label mr-1">No. Of Employees</label>
                            <input type="number" class="form-control" id="department_employees" name="department_employees" autocomplete="off">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=department-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to Department List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function preview() {
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
    $(document).ready(function() {
        $('#new_department_form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: './php/actions.php?action=save_department',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        $('#add-employee-form').append(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Updated Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    } else {
                        $('#add-employee-form').append(`
                        <div class="alert alert-danger fade show" role="alert">
                            <strong>Data Updated Unsuccessfully</strong>
                        </div>
                    `);
                    }
                }
            })
        });
    });
</script>