<?php
$productivityId = $_GET['productivityId'];
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-600">Update Progress For:
            <?php
            $projectNameQry = $con->query("SELECT project_id FROM productivity WHERE productivity_id ='$productivityId'");
            while ($p = $projectNameQry->fetch_assoc()) {
            ?> <span class="h3 text-gray-900">
                    <?php
                    $projectId = $p['project_id'];
                    $projectName = $con->query("SELECT project_name FROM projects WHERE project_id='$projectId'");
                    while ($project = $projectName->fetch_assoc()) {
                        echo $project['project_name'];
                    }
                    ?>
                </span>
            <?php
            }
            ?>
        </h1>
    </div>
    <?php
    $productivityData = $con->query("SELECT * FROM productivity WHERE productivity_id='$productivityId'");
    while ($prod = $productivityData->fetch_assoc()) { ?>
        <div class="row add-employee-form scroll-component">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit_productivity_form">
                            <input type="hidden" class="form-control" id="productivity_id" name="productivity_id" value="<?php echo $prod['productivity_id'] ?>" autocomplete="off">
                            <div class="form-group">
                                <label for="productivity_subject" class="col-form-label mr-1">Subject</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="productivity_subject" name="productivity_subject" value="<?php echo $prod['productivity_subject'] ?>" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="productivity_date" class="col-form-label mr-1">Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="productivity_date" name="productivity_date" value="<?php echo $prod['productivity_date'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="start_time" class="col-form-label mr-1">Start Time</label><span class="text-danger">*</span>
                                <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $prod['start_time'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="end_time" class="col-form-label mr-1">End Time</label><span class="text-danger">*</span>
                                <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $prod['end_time'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="productivity_comments" class="col-form-label mr-1">Comment/Progress Description</label><span class="text-danger">*</span>
                                <textarea type="text" class="form-control" id="productivity_comments" name="productivity_comments" autocomplete="off"><?php echo $prod['productivity_comments'] ?></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="./index.php?page=project-viewer&projectId=<?php echo $projectId; ?>" class="btn btn-warning btn-user btn-block text-dark">Back to Project</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>