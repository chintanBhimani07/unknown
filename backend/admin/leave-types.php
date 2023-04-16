<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Leaves Types</h1>
        <a href="./index.php?page=leaveType-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Leave Type</a>
    </div>
    <div class="row  scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Leaves Type </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Leave Type</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $con->query("SELECT * FROM  leavestype;");
                                $i = 1;
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $row['leave_type'] ?></td>
                                        <td><?php echo $row['leave_description'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                    <a type="button" class="dropdown-item" href="./index.php?page=leaveType-edit&typeId=<?php echo $row['leave_type_id'] ?>">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a type="button" class="dropdown-item" id="deleteLeaveType" href="#" data-id="<?php echo $row['leave_type_id'] ?>">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="openModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; background:#4e73df;color:#fff">
                <h5 class="modal-title" id="addStatusModalLabel">Delete Leave Types</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to remove Leave Type permanently?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal">No</button>
                <button type="button" class="btn btn-primary" id="submitModel">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let leaveTypeId = '';
        $('#openModal').hide();
        $(document).on('click', '#deleteLeaveType', function(e) {
            e.preventDefault();
            leaveTypeId = $(this).data('id');
            $('#openModal').show();
        });
        $('.closeModal').click(() => {
            $('#openModal').hide();
        });

        $('#submitModel').click(() => {
            $('#openModal').hide();
            $.ajax({
                url: './php/actions.php?action=delete_leaveType',
                method: 'POST',
                data: {
                    leave_type_id: leaveTypeId
                },
                success: function(res) {
                    res = JSON.parse(res);
                    if (res.status == 200) {
                        toastr.success(res.message);
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function(res) {
                    res = JSON.parse(res);
                    toastr.error(res.message);
                }
            });
        });
    });
</script>