<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Department Dashboard</h1>
        <a href="./index.php?page=department-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Department</a>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Departments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo ($con->query("SELECT * FROM  departments;")->num_rows); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Departments List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Department Name</th>
                                    <th>Head Of Department</th>
                                    <th>No. Of Employees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  departments;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $row['department_name'] ?></td>
                                        <td><?php echo $row['department_hod'] ?></td>
                                        <td><?php echo $row['department_employees'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-primary btn-circle mx-1" href="./index.php?page=department-viewer&empId=<?php echo $row['department_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button" class="btn btn-warning  btn-circle mx-1" href="./index.php?page=department-edit&empId=<?php echo $row['department_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle deleteDepartment  mx-1" href="#" data-id="<?php echo $row['department_id']; ?>"><i class="fa-solid fa-trash"></i></a>
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

<script>
    $(document).ready(function() {
        $('.deleteDepartment').click(function() {
            console.log('click');
            let id = $(this).attr('id');
            $.ajax({
                url: './php/actions.php?action=delete_department',
                method: 'POST',
                data: {
                    department_id: id
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload()
                        },1000)
                    }else{
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>