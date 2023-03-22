<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];

include 'controller-class.php';

$task = new Controller();

// Application User Login
if ($action == 'login_application_user') {
    $login = $task->login_application_user();
    if ($login) {
        echo json_encode($login);
    }
}


// Email Verification for reset password
if ($action == 'email_verification') {
    $verification = $task->verify_email();
    if ($verification) {
        echo json_encode($verification);
    }
}


// Email Verification for reset password
if ($action == 'otp_verification') {
    // $verification = $task->verify_otp();
    // if ($verification) {
    //     echo json_encode($verification);
    // }
}

    
// User Password Change
if ($action == 'change_password') {
    $change_password = $task->change_password();
    if ($change_password) {
        echo json_encode($change_password);
    }
}

// Employees
if ($action == 'save_employee') {
    $para = "insert";
    $save_employee = $task->employee_add($para);
    if ($save_employee) {
        echo json_encode($save_employee);
    }
}
if ($action == 'edit_employee') {
    $para = "update";
    $save_employee = $task->employee_add($para);
    if ($save_employee) {
        echo json_encode($save_employee);
    }
}
if ($action == 'delete_employee') {
    $delete_employee = $task->employee_delete();
    if ($delete_employee) {
        echo json_encode($delete_employee);
    }
}
if($action == 'upload_emp_profile'){
    $upload_emp_profile = $task->upload_emp_profile();
    if($upload_emp_profile){
        echo json_encode($upload_emp_profile);
    }
}



// User 
if ($action == 'save_user') {
    $para = "insert";
    $save_user = $task->user_save($para);
    if ($save_user) {
        echo json_encode($save_user);
    }
}
if ($action == 'delete_user') {
    $delete_user = $task->user_delete();
    if ($delete_user) {
        echo json_encode($delete_user);
    }
}



// Leave Types 
if($action == 'save_leaveType'){
    $para = "insert";
    $save_leaveType = $task->leaveType_add($para);
    if ($save_leaveType) {
        echo json_encode($save_leaveType);
    }
}
if($action == 'edit_leaveType'){
    $para = "update";
    $edit_leaveType = $task->leaveType_add($para);
    if ($edit_leaveType) {
        echo json_encode($edit_leaveType);
    }
}
if ($action == 'delete_leaveType') {
    $delete_leaveType = $task->leaveType_delete();
    if ($delete_leaveType) {
        echo json_encode($delete_leaveType);
    }
}


// Leave Management
if($action == 'save_leave'){
    $save_leave = $task->leave_add();
    if ($save_leave) {
        echo json_encode($save_leave);
    }
}
if($action == 'take_leave_action'){
    $take_leave_action = $task->leave_action();
    if ($take_leave_action) {
        echo json_encode($take_leave_action);
    }
}


// Projects
if ($action == 'save_project') {
    $para = "insert";
    $save_project = $task->project_add($para);
    if ($save_project) {
        echo json_encode($save_project);
    }
}
if ($action == 'edit_project') {
    $para = "update";
    $edit_project = $task->project_add($para);
    if ($edit_project) {
        echo json_encode($edit_project);
    }
}



// Task
if ($action == 'save_task') {
    $para = "insert";
    $save_task = $task->task_add($para);
    if ($save_task) {
        echo json_encode($save_task);
    }
}
if ($action == 'edit_task') {
    $para = "update";
    $edit_task = $task->task_add($para);
    if ($edit_task) {
        echo json_encode($edit_task);
    }
}
if ($action == 'delete_task') {
    $delete_task = $task->task_delete();
    if ($delete_task) {
        echo json_encode($delete_task);
    }
}
if($action == 'work_update'){
    $work_update = $task->task_update();
    if($work_update){
        echo json_encode($work_update);
    }
}


// Productivity
if($action == 'save_productivity'){
    $para = "insert";
    $save_productivity = $task->productivity_add($para);
    if ($save_productivity) {
        echo json_encode($save_productivity);
    }
}

if($action == 'edit_productivity'){
    $para = "update";
    $edit_productivity = $task->productivity_add($para);
    if ($edit_productivity) {
        echo json_encode($edit_productivity);
    }
}
if($action == 'delete_productivity'){
    $delete_productivity = $task->productivity_delete();
    if ($delete_productivity) {
        echo json_encode($delete_productivity);
    }
}



// Clients
if ($action == 'save_client') {
    $para = "insert";
    $save_client = $task->client_add($para);
    if ($save_client) {
        echo json_encode($save_client);
    }
}
if ($action == 'edit_client') {
    $para = "update";
    $edit_client = $task->client_add($para);
    if ($edit_client) {
        echo json_encode($edit_client);
    }
}
if ($action == 'delete_client') {
    $delete_client = $task->client_delete();
    if ($delete_client) {
        echo json_encode($delete_client);
    }
}


//Expenses
if ($action == 'save_exp') {
    $para = "insert";
    $save_exp = $task->exp_add($para);
    if ($save_exp) {
        echo json_encode($save_exp);
    }
}
if ($action == 'edit_exp') {
    $para = "update";
    $edit_exp = $task->exp_add($para);
    if ($edit_exp) {
        echo json_encode($edit_exp);
    }
}
if ($action == 'delete_exp') {
    $para = "update";
    $delete_exp = $task->exp_delete();
    if ($delete_exp) {
        echo json_encode($delete_exp);
    }
}
if($action == 'upload_exp_profile'){
    $upload_exp_profile = $task->upload_exp_profile();
    if($upload_exp_profile){
        echo json_encode($upload_exp_profile);
    }
}