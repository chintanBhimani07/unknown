<?php
$i = 1;
$id = $_GET['empId'];
$content = $_GET['content'];
$qry = $con->query("SELECT * FROM  employees WHERE emp_id ='$id'");
while ($row = $qry->fetch_assoc()) { ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <?php echo $row['emp_first_name'] . " " . $row['emp_last_name']; ?>
            </h1>
            <?php
            if ($content == 'employee') { ?>
                <a href="./index.php?page=employee-dashboard"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-list fa-sm text-white mr-2"></i>Employee</a>
            <?php } else if ($content == 'user' && isset($_GET['isProfile'])==true) { ?>
            <?php } else { ?>
                    <a href="./index.php?page=user-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-list fa-sm text-white mr-2"></i>Users</a>
            <?php } ?>
        </div>

        <div class="row scroll-component">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                                    <?php
                                    if ($row['emp_profile_pic']) { ?>
                                        <img src="assets/uploads/<?php echo $row['emp_profile_pic']; ?>" alt="Profile"
                                            width="200" height="200">
                                    <?php } else { ?>
                                        <img src="assets/uploads/default_user.jpg" alt="Profile" width="200" height="200">
                                    <?php } ?>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card  py-3 border-left-dark">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Full Name:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo ucwords($row['emp_first_name'] . " " . $row['emp_last_name']) ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Email
                                                        Address:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo $row['emp_email'] ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Contact No:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo $row['emp_mob'] ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Department:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo ucwords($row['emp_department']) ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Designation:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo ucwords($row['emp_designation']) ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Description:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php
                                    if (!empty($row['emp_description'])) {
                                        echo ucwords($row['emp_description']);
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Gender:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php echo ucwords($row['emp_gender']) ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Date Of Birth:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php echo $row['emp_dob'] ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Address:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php
                                    if (!empty($row['emp_address'])) {
                                        echo ucwords($row['emp_address']);
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Head Of Department:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php
                                    if (!empty($row['emp_hod_name'])) {
                                        echo ucwords($row['emp_hod_name']);
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Joining Date:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php echo ($row['emp_joining_date']) ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Confirmation Date:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php
                                    if ($row['emp_confirmation_date'] == '0000-00-00') {
                                        echo '-';
                                    } else {
                                        echo ($row['emp_confirmation_date']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Leaving Date:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php
                                    if ($row['emp_leaving_date'] == '0000-00-00') {
                                        echo '-';
                                    } else {
                                        echo ($row['emp_leaving_date']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-lg-2 my-2">
                                <span class="mr-2 d-none d-lg-inline text-gray-500">Working Hours:</span>
                            </div>
                            <div class="col-lg-10 my-2">
                                <span class="font-weight-bold">
                                    <?php echo $row['emp_working_hours'] . " " . "Hours" ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>