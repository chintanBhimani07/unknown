<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Clients</h1>
        <a href="./index.php?page=client-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Client</a>
    </div>
    <div class="row scroll-component">
        <div class="col-xl-12">
            <div class="card-12 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Client List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <?php
                                    if ($_SESSION['login_user_access_type'] == 1) { ?>
                                        <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  clients;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++ ?>
                                        </th>
                                        <td>
                                            <?php echo $row['client_first_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_last_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_address'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_contact'] ?>
                                        </td>
                                        <?php
                                        if ($_SESSION['login_user_access_type'] == 1) { ?>
                                            <td class="d-flex align-items-center justify-content-center">
                                                <div class="dropdown no-arrow">
                                                    <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                        <a type="button" class="dropdown-item" href="./index.php?page=client-edit&clientId=<?php echo $row['client_id'] ?>">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a type="button" class="dropdown-item" id="deleteClient" href="#" data-id="<?php echo $row['client_id'] ?>">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php } ?>
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
            <div class="modal-header" style="padding: 0.5rem 1rem; background:#3e64d3;color:#fff">
                <h5 class="modal-title" id="addStatusModalLabel">Delete Employee</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to remove employee permanently?</p>
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
        $(document).on('click', '#deleteClient', function(e) {
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
                url: './php/actions.php?action=delete_client',
                method: 'POST',
                data: {
                    client_id: id
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