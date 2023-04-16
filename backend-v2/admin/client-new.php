<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Client</h1>
        <a href="./index.php?page=client-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Clients</a>
    </div>
    <div class="row add-employee-form scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_client_form">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="client_first_name" class="col-form-label mr-1">First Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="client_first_name" name="client_first_name" autocomplete="off" autofocus >
                            </div>
                            <div class="col-sm-6">
                                <label for="client_last_name" class="col-form-label mr-1">Last Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="client_last_name" name="client_last_name" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="gender" class="col-form-label mr-1">Gender</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="gender" name="gender">
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="client_contact" class="col-form-label mr-1">Mobile No.</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="client_contact" name="client_contact" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_address" class="col-form-label mr-1">Resident Address</label><span class="text-danger">*</span>
                            <textarea type="text" class="form-control" id="client_address" name="client_address" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="client_email" class="col-form-label mr-1">Email Address</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" id="client_email" name="client_email" autocomplete="off" >
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=client-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to Client List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
