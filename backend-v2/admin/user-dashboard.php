<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Users</h1>
        <a href="./index.php?page=user-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add User</a>
    </div>
    <div class="row scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Access Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  users;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++ ?>
                                        </th>
                                        <td>
                                            <?php echo $row['user_first_name'] . " " . $row['user_last_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['user_email'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['user_access_type'] == 1) {
                                                echo "Admin";
                                            } else if ($row['user_access_type'] == 2) {
                                                echo "Employee";
                                            } else if ($row['user_access_type'] == 3) {
                                                echo "Engineer";
                                            } else {
                                                echo "HOD";
                                            }
                                            ?>
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                    <a type="button" class="dropdown-item" href="./index.php?page=employee-viewer&empId=<?php echo $row['emp_id'] ?>&content=user">View</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a type="button" class="dropdown-item" id="deleteUser" href="#" data-id="<?php echo $row['user_id'] ?>">Delete</a>
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
                <h5 class="modal-title" id="addStatusModalLabel">Delete User</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to remove user permanently?</p>
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
        let id = '';
        $('#openModal').hide();
        $(document).on('click', '#deleteUser', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            $('#openModal').show();
        });
        $('.closeModal').click(() => {
            $('#openModal').hide();
        });

        $('#submitModel').click(() => {
            $('#openModal').hide();
            $.ajax({
                url: './php/actions.php?action=delete_user',
                method: 'POST',
                data: {
                    user_id: id
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