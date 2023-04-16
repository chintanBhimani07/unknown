<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Expenses</h1>
        <a href="./index.php?page=expenses-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>All Expenses</a>
    </div>
    <div class="row add-employee-form scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_exp_form" action="">
                        <div class="form-group">
                            <label for="exp_name" class="col-form-label mr-1">Expenses Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="exp_name" name="exp_name" autocomplete="off" autofocus >
                        </div>

                        <div class="form-group">
                            <label for="exp_amount" class="col-form-label mr-1">Expenses Amount</label><span class="text-danger">*</span>
                            <input type="number" class="form-control" id="exp_amount" name="exp_amount" autocomplete="off" step="any" >
                        </div>
                        <div class="form-group">
                            <label for="exp_date" class="col-form-label mr-1">Expenses Date</label><span class="text-danger">*</span>
                            <input type="date" class="form-control" id="exp_date" name="exp_date" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="exp_bill_photo" class="col-form-label mr-1">Expenses Bill Picture</label>
                            <input type="file" class="custom-file" id="exp_bill_photo" name="exp_bill_photo" onchange="preview()">
                            <img id="thumb" src="" width="100px" />
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block" type="submit">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=expenses-dashboard" class="btn btn-warning btn-user btn-block text-dark" id='submitBtn'>Back to Expenses List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
