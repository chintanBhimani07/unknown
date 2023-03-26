<?php
$userId = $_SESSION['login_user_id'];
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if ($_SESSION['login_user_access_type'] == 1) { ?>
            <h1 class="h3 mb-0 text-gray-800">All Lead Entry</h1>
        <?php } ?>
    </div>
    <div class="scroll-component">
        <div class="row" id="dashboard-head">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php echo  $con->query("SELECT * FROM lead;")->num_rows . ' ' . 'Lead' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pending</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $con->query("SELECT * FROM lead WHERE lead_status=0;")->num_rows . ' ' . 'Lead'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Contact to Client</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php echo $con->query("SELECT * FROM lead WHERE lead_status=1;")->num_rows . ' ' . 'Lead'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rejected</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php echo $con->query("SELECT * FROM lead WHERE lead_status=2;")->num_rows . ' ' . 'Lead'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card-12 shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Lead Entry List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Client Contact No.</th>
                                        <th>Project Requirement</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th id="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $qry = $con->query("SELECT * FROM lead;");
                                    while ($row = $qry->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td scope="row">
                                                <?php echo $i++ ?>
                                            </td>
                                            <td>
                                                <?php echo $row['client_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['client_email'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['client_tel_no'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['project_type'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['description'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['lead_status'] == 0) { ?>
                                                    <span style="color: blue">Pending</span>
                                                <?php } else if ($row['lead_status'] == 1) { ?>
                                                    <span style="color: green">Completed</span>
                                                <?php } else { ?>
                                                    <span style="color: red">Rejected</span>
                                                <?php } ?>
                                            </td>
                                            <td class="d-flex align-items-center justify-content-center">
                                                <?php if ($row['lead_status'] == 0) { ?>
                                                    <div class="dropdown no-arrow">
                                                        <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                            <a type="button" class="dropdown-item" id="onRejectLead" data-id="<?php echo $row['lead_id'] ?>" href="#">Reject</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a type="button" class="dropdown-item" id="onCompleteLead" data-id="<?php echo $row['lead_id'] ?>" href="#">Complete</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(() => {
        $(document).on("click", "#onCompleteLead", function(e) {
            e.preventDefault();
            let leadId = $("#onCompleteLead").data("id");
            $.ajax({
                url: "./php/actions.php?action=lead_action",
                method: "POST",
                data: {
                    status: 1,
                    leadId: leadId,
                },
                success: function(res) {
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
                error: function(res) {
                    res = JSON.parse(res);
                    toastr.error(res.message);
                },
            });
        });


        $(document).on("click", "#onRejectLead", function(e) {
            e.preventDefault();
            let id = $("#onRejectLead").data("id");
            $.ajax({
                url: "./php/actions.php?action=lead_action",
                method: "POST",
                data: {
                    status: 2,
                    leadId: id,
                },
                success: function(res) {
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
                error: function(res) {
                    res = JSON.parse(res);
                    toastr.error(res.message);
                },
            });
        });
    })
</script>