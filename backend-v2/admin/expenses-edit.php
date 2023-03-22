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

<?php
$expId = $_GET['expId'];
$qry = $con->query("SELECT * FROM  expenses WHERE exp_id='$expId';");
while ($row = $qry->fetch_assoc()) { ?>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Expenses Update</h1>
            <a href="./index.php?page=expenses-dashboard"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-list fa-sm text-white mr-2"></i>All Expenses</a>
        </div>

        <div class="row add-employee-form">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit_exp_form">
                            <input type="hidden" class="form-control" id="exp_id" name="exp_id"
                                value="<?php echo $row['exp_id'] ?>" autocomplete="off" autofocus required>
                            <div class="form-group">
                                <label for="exp_name" class="col-form-label mr-1">Expenses Name</label><span
                                    class="text-danger">*</span>
                                <input type="text" class="form-control" id="exp_name" name="exp_name"
                                    value="<?php echo $row['exp_name'] ?>" autocomplete="off" autofocus required>
                            </div>

                            <div class="form-group">
                                <label for="exp_amount" class="col-form-label mr-1">Expenses Amount</label><span
                                    class="text-danger">*</span>
                                <input type="number" class="form-control" id="exp_amount" name="exp_amount"
                                    value="<?php echo $row['exp_amount'] ?>" autocomplete="off" step="any" required>
                            </div>
                            <div class="form-group">
                                <label for="exp_date" class="col-form-label mr-1">Expenses Date</label><span
                                    class="text-danger">*</span>
                                <input type="date" class="form-control" id="exp_date" name="exp_date" autocomplete="off"
                                    value="<?php echo $row['exp_date'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exp_bill_photo" class="col-form-label mr-1">Expenses Bill Picture</label><span
                                    class="text-danger">*</span>
                                <input type="file" class="custom-file" id="exp_bill_photo" name="exp_bill_photo"
                                    autocomplete="off" onchange="preview()">
                                <input type="hidden" class="custom-file" id="oldFile" name="oldFile" autocomplete="off"
                                    value="<?php echo $row['exp_bill_photo'] ?>">
                                <img id="thumb" src="./assets/Expenses/<?php echo $row['exp_bill_photo'] ?>"
                                    width="100px" />
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="./index.php?page=expenses-dashboard"
                                        class="btn btn-warning btn-user btn-block text-dark">Back to Expenses List</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script>
    function preview() {
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }

    function uploadImg() {
        if ($('#exp_bill_photo').val()) {
            let img = $('#exp_bill_photo').prop('files')[0];
            let id= $('#exp_id').val();
            var formData = new FormData();
            formData.append('exp_bill_photo', img);
            formData.append('exp_id', id);
            $.ajax({
                type: "POST",
                url: "./php/actions.php?action=upload_exp_profile",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else {}
    }

    $(document).ready(function() {

        $("#edit_exp_form").validate({
            // Define validation rules
            rules: {
                exp_name: "required",
                exp_amount: "required",
                exp_date: "required",
                exp_bill_photo: "required",
                exp_name: {
                    required: true
                },
                exp_amount: {
                    required: true
                },
                exp_date: {
                    required: true
                },
                exp_bill_photo: {
                    required: true
                },
            },
            // Specify validation error messages
            messages: {
                exp_name: "Please provide a valid name",
                exp_amount: "Please provide a valid amount",
                exp_date: "Please select a valid date",
                exp_bill_photo: "Please select a valid photo",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: './php/actions.php?action=edit_exp',
                    data: $("#edit_exp_form").serialize(),
                    type: 'POST',
                    success: function(resp) {
                        if (resp == 1) {
                            uploadImg();
                            setTimeout(() => {
                                window.location = './index.php?page=expenses-dashboard';
                            }, 1000);
                        } else {
                            console.log(resp);
                        }
                    }
                });
            }
        });
    });                
</script>