<?php
session_start();
ini_set('display_errors', 1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

class Controller
{
    private $db;

    public function __construct()
    {
        ob_start();
        include '../config/db.config.php';
        $this->db = $con;
    }

    public function __destruct()
    {
        $this->db->close();
        ob_end_flush();
    }


    // Application User Login
    private function guidV4($data = null)
    {
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s%s%s%s%s%s%s', str_split(bin2hex($data), 4));
    }


    // OPT Generator
    private function generateOTP()
    {
        $result = "";
        $generator = "1357902468";
        for ($i = 1; $i <= 6; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        return $result;
    }


    // Send Email 
    private function sendOTPtoMail($email)
    {
        $otp = $this->generateOTP();
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dream.studio.ar@gmail.com';                     //SMTP username
        $mail->Password   = 'zghnyewjtblgkwfr';                               //SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('dream.studio.ar@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Password reset verification";
        $mail->Body = `
        <h4>Please use the verification code below to sign in.</h4>
        <h2><b>$otp</b></h2>
        <p>If you didn't request this. You can ignore this email.</p> 
        <h4>Thanks.</h4>
        <h4>The Dream Studio Team.</h4>
        `;

        try {
            $mail->send();
            return 1;
        } catch (Exception $e) {
            return 2;
        }
    }

    public function login_application_user()
    {
        extract($_POST);
        $query = $this->db->query("SELECT * FROM users where user_email = '" . $user_email . "' and user_password = '" . md5($user_password) . "'  ");
        if ($query->num_rows > 0) {
            foreach ($query->fetch_assoc() as $key => $val) {
                if ($key != 'user_password' && !is_numeric($key)) {
                    $_SESSION['login_' . $key] = $val;
                }
            }
            return array(
                'status' => 200,
                'message' => 'Login Successfully.'
            );
        } else {
            return array(
                'status' => 400,
                'message' => "Username or Password are incorrect."
            );
        }
    }


    public function verify_email()
    {
        extract($_POST);
        $qry = $this->db->query("SELECT * FROM users WHERE user_email='$user_email'")->num_rows;
        if ($qry == 1) {
            if ($this->sendOTPtoMail($user_email)) {
                return array(
                    'status' => 200,
                    'message' => 'OTP Sent Successfully.'
                );
            } else {
                return array(
                    'status' => 400,
                    'message' => 'Try Sometime later.'
                );
            }
        } else {
            return array(
                'status' => 400,
                'message' => 'Invalid Email.'
            );
        }
    }

    public function verify_otp()
    {
    }

    // User Password Change
    public function change_password()
    {
        extract($_POST);
        $qry = $this->db->query("SELECT user_password FROM users WHERE user_id='$user_id'");
        while ($row = $qry->fetch_assoc()) {
            if ($row['user_password'] == md5($user_old_password)) {
                $updatePassword = $this->db->query("UPDATE users SET user_password=md5('$user_password') WHERE user_id='$user_id';");
                if ($updatePassword) {
                    return array(
                        'status' => 200,
                        'message' => 'Password change Successfully.'
                    );
                } else {
                    return array(
                        'status' => 500,
                        'message' => "Value can't change,try sometimes later."
                    );
                }
            } else {
                return array(
                    'status' => 400,
                    'message' => "Your password does not match."
                );
            }
        }
    }


    // Employees Methods
    public function employee_add($para)
    {
        extract($_POST);
        $emp_data = '';
        if ($para == 'insert') {
            $empId = $this->guidV4();
            $emp_data = "emp_id='$empId'";
        } else if ($para == 'update') {
            $emp_data = "emp_id='$emp_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('oldFile', 'password', 'emp_id')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $emp_data .= ", $k='$v' ";
                }
            }
        }
        if ($emp_designation != 'HOD') {
            $getHod = $this->db->query("SELECT hod_first_name,hod_last_name FROM hod WHERE department_name='$emp_department';");
            while ($row = $getHod->fetch_assoc()) {
                $hod = $row['hod_first_name'] . " " . $row['hod_last_name'];
                $emp_data .= ", emp_hod_name='$hod' ";
            }
        } else {
            $emp_data .= ", emp_hod_name='' ";
        }
        if ($para == 'insert') {
            $checkEmpExists = $this->db->query("SELECT * FROM employees WHERE emp_email ='$emp_email' OR emp_code = '$emp_code'")->num_rows;
            if ($checkEmpExists == 0) {
                $insertEmp = $this->db->query("INSERT INTO employees SET $emp_data");
                if ($insertEmp) {
                    $hodId = $this->guidV4();
                    if ($emp_designation == 'HOD') {
                        $addHod = $this->db->query("INSERT INTO hod SET hod_id='$hodId', hod_first_name='$emp_first_name', hod_last_name='$emp_last_name', department_name='$emp_department', emp_id='$empId' ");
                        if ($addHod) {
                            return array(
                                'status' => 200,
                                'message' => 'Employee and hod added successfully.'
                            );
                        }
                    } else {
                        return array(
                            'status' => 200,
                            'message' => 'Employee added successfully.'
                        );
                    }
                } else {
                    return array(
                        'status' => 500,
                        'message' => "Employee can't added,Please try sometimes later."
                    );
                }
            } else {
                return array(
                    'status' => 400,
                    'message' => 'Employee already exists.'
                );
            }
        }
        if ($para == 'update') {
            if (isset($_FILES['emp_profile_pic']) && $_FILES['emp_profile_pic']['tmp_name'] != '') {
                $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['emp_profile_pic']['name'];
                if (file_exists('../assets/uploads/' . $oldFile)) {
                    unlink('../assets/uploads/' . $oldFile);
                } else {
                }
                $move = move_uploaded_file($_FILES['emp_profile_pic']['tmp_name'], '../assets/uploads/' . $fname);
                $emp_data .= ", emp_profile_pic='$fname'";
            } else {
                $fname = 'default_user.jpg';
            }
            $updateEmp = $this->db->query("UPDATE employees SET $emp_data WHERE emp_id='$emp_id'");
            if ($updateEmp) {
                $hodId = $this->guidV4();
                if ($emp_designation == 'HOD') {
                    $addHod = $this->db->query("INSERT INTO hod SET hod_id='$hodId', hod_first_name='$emp_first_name', hod_last_name='$emp_last_name', department_name='$emp_department', emp_id='$emp_id' ");
                    if ($addHod) {
                        return array(
                            'status' => 200,
                            'message' => 'Employee and hod updated successfully.'
                        );
                    }
                } else {
                    $deleteHod = $this->db->query("DELETE FROM hod WHERE emp_id='$emp_id' ");
                    return array(
                        'status' => 200,
                        'message' => 'Employee updated successfully.'
                    );
                }
            } else {
                return array(
                    'status' => 500,
                    'message' => "Employee can't added,Please try sometimes later."
                );
            }
        }
    }
    public function upload_emp_profile()
    {
        extract($_POST);
        if (isset($_FILES['emp_profile_pic']) && $_FILES['emp_profile_pic']['tmp_name'] != '') {
            $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['emp_profile_pic']['name'];
            $move = move_uploaded_file($_FILES['emp_profile_pic']['tmp_name'], '../assets/uploads/' . $fname);
            $updateEmp = $this->db->query("UPDATE employees SET emp_profile_pic='$fname' WHERE emp_code='$emp_code'");
            if ($updateEmp) {
                return array(
                    'status' => 200,
                    'message' => 'Profile picture upload successfully.'
                );
            } else {
                return array(
                    'status' => 500,
                    'message' => 'Something went wrong.'
                );
            }
        } else {
            return array(
                'status' => 400,
                'message' => 'Image not set.'
            );
        }
    }
    public function employee_delete()
    {
        extract($_POST);
        $query = $this->db->query("DELETE FROM employees WHERE emp_id='$emp_id'");
        if ($query) {
            $deletePic = $this->db->query("SELECT emp_profile_pic FROM employees WHERE emp_id = '$emp_id'");
            while ($row = $deletePic->fetch_assoc()) {
                $fileName = $row['emp_profile_pic'];
                if (file_exists('../assets/uploads/' . $fileName)) {
                    unlink('../assets/uploads/' . $fileName);
                }
            }
            $isHod = $this->db->query("SELECT emp_id FROM hod WHERE emp_id='$emp_id'")->num_rows;
            if ($isHod == 1) {
                $deleteHod = $this->db->query("DELETE FROM hod WHERE emp_id='$emp_id'");
            }
            return array(
                'status' => 200,
                'message' => 'Employee Delete Successfully.'
            );
        } else {
            return array(
                'status' => 400,
                'message' => 'Something went wrong.'
            );
        }
    }


    // Application User Section
    public function user_save($para)
    {
        extract($_POST);
        $user_data = '';
        if ($para == 'insert') {
            $userId = $this->guidV4();
            $user_data = "user_id='$userId'";
        } else if ($para == 'update') {
            $user_data = "user_id='$user_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('user_id', 'user_password', 'user_confirm_password', 'emp_id')) && !is_numeric($k)) {
                $user_data .= ", $k='$v' ";
            }
        }
        $userFirstName = $this->db->query("SELECT emp_first_name,emp_last_name FROM employees WHERE emp_email='$user_email'");
        while ($r = $userFirstName->fetch_assoc()) {
            $fname = $r['emp_first_name'];
            $lname = $r['emp_last_name'];
            $user_data .= ", user_first_name='$fname'";
            $user_data .= ", user_last_name='$lname'";
        }


        if (!empty($user_password)) {
            $empId = $this->db->query("SELECT emp_id FROM employees WHERE emp_email='$user_email';");
            while ($r = $empId->fetch_assoc()) {
                $id = $r['emp_id'];
                $user_data .= ", emp_id='$id' ";
            }
            $user_data .= ", user_password=md5('$user_password')";
        }

        if ($para == 'insert') {
            $checkUserExists = $this->db->query("SELECT user_email FROM users where user_email ='$user_email' ")->num_rows;
            if ($checkUserExists == 0) {
                $insertUser = $this->db->query("INSERT INTO users SET $user_data");
                if ($insertUser) {
                    return array(
                        'status' => 200,
                        'message' => 'Users Added Successfully.'
                    );
                }
            }
        } else {
            return array(
                'status' => 400,
                'message' => 'Something went wrong,please try again later.'
            );
        }
    }
    public function user_delete()
    {
        extract($_POST);
        $qry = $this->db->query("DELETE FROM users WHERE user_id='$user_id'");
        if ($qry) {
            return array(
                'status' => 200,
                'message' => 'Users Delete Successfully.'
            );
        } else {
            return array(
                'status' => 400,
                'message' => 'Something went wrong,please try again later.'
            );
        }
    }


    // Leave Type 
    public function leaveType_add($para)
    {
        extract($_POST);
        $leaveType_data = '';
        if ($para == 'insert') {
            $typeId = $this->guidV4();
            $leaveType_data = "leave_type_id='$typeId'";
        } else if ($para == 'update') {
            $leaveType_data = "leave_type_id='$leave_type_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password', 'leave_type_id')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $leaveType_data .= ", $k='$v' ";
                }
            }
        }

        if ($para == 'insert') {
            $checkType = $this->db->query("SELECT * FROM leavestype WHERE leave_type='$leave_type'")->num_rows;
            if ($checkType == 0) {
                $addType = $this->db->query("INSERT INTO leavestype SET $leaveType_data");
                if ($addType) {
                    return array(
                        'status' => 200,
                        'message' => 'Leave Type Added Successfully.'
                    );
                } else {
                    return array(
                        'status' => 400,
                        'message' => 'Something went wrong,please try again later.'
                    );
                }
            }
        }
        if ($para == 'update') {
            $updateType = $this->db->query("UPDATE leavestype SET $leaveType_data WHERE leave_type_id='$leave_type_id'");
            if ($updateType) {
                return array(
                    'status' => 200,
                    'message' => 'Leave Type Update Successfully.'
                );
            } else {
                return array(
                    'status' => 400,
                    'message' => 'Something went wrong,please try again later.'
                );
            }
        }
    }
    public function leaveType_delete()
    {
        extract($_POST);
        $query =  $this->db->query("DELETE FROM leavestype WHERE leave_type_id='$leave_type_id'");
        if ($query) {
            return array(
                'status' => 200,
                'message' => 'Leave Type Delete Successfully.'
            );
        } else {
            return array(
                'status' => 400,
                'message' => 'Something went wrong,please try again later.'
            );
        }
    }



    // Leave Management
    public function leave_add()
    {
        extract($_POST);
        $leave_data = '';
        $leaveId = $this->guidV4();
        $leave_data = "leave_id='$leaveId'";
        $today = date("Y-m-d");
        $leave_data .= ", posting_date='$today'";
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password', 'leave_id')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $leave_data .= ", $k='$v' ";
                }
            }
        }
        $checkType = $this->db->query("SELECT * FROM leaves WHERE from_date	='$from_date' OR to_date='$to_date'")->num_rows;
        if ($checkType == 0) {
            $addType = $this->db->query("INSERT INTO leaves SET $leave_data");
            if ($addType) {
                return 1;
            } else {
                return 2;
            }
        }
    }
    public function leave_action()
    {
        extract($_POST);
        $today = date("Y-m-d");
        $updateLeave = $this->db->query("UPDATE leaves SET leave_status='$leave_status',admin_remarks='$admin_remarks',admin_remarks_date='$today' WHERE leave_id='$leave_id';");
        if ($updateLeave) {
            return 1;
        } else {
            return 2;
        }
    }



    // Project Management
    public function project_add($para)
    {
        extract($_POST);
        $project_data = '';
        $status = 0;
        if ($para == 'insert') {
            $projectId = $this->guidV4();
            $project_data = "project_id ='$projectId' , project_status='$status'";
        } else if ($para == 'update') {
            $project_data = "project_id ='$project_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password', 'project_id', 'users_id', 'engineers_id', 'project_status')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $project_data .= ", $k='$v' ";
                }
            }
        }
        if (isset($engineers_id)) {
            $project_data .= ", engineers_id='" . implode(',', $engineers_id) . "' ";
        }
        if (isset($users_id)) {
            $project_data .= ", users_id='" . implode(',', $users_id) . "' ";
        }

        if ($para == 'insert') {
            $checkProjectExists = $this->db->query("SELECT project_name, project_code FROM projects WHERE project_name='$project_name' OR project_code='$project_code'")->num_rows;
            if ($checkProjectExists == 0) {
                $insertProject = $this->db->query("INSERT INTO projects SET $project_data;");
                if ($insertProject) {
                    return 1;
                } else {
                    return 2;
                }
            }
        } else if ($para == 'update') {
            $updateProject = $this->db->query("UPDATE projects SET $project_data WHERE project_id='$project_id'");
            if ($updateProject) {
                return $updateProject;
            } else {
                return 2;
            }
        }
    }



    public function task_add($para)
    {
        extract($_POST);
        $task_data = '';
        $status = 0;
        if ($para == 'insert') {
            $taskId = $this->guidV4();
            $task_data = "task_id ='$taskId' ,task_status='$status'";
        } else if ($para == 'update') {
            $task_data = "task_id ='$task_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password', 'task_id', 'task_status')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $task_data .= ", $k='$v' ";
                }
            }
        }

        if ($para == 'insert') {
            $checkTask = $this->db->query("SELECT * FROM task WHERE task_name='$task_name'")->num_rows;
            if ($checkTask == 0) {
                $insertTask = $this->db->query("INSERT INTO task SET $task_data");
                if ($insertTask) {
                    $changeProjectStatus = $this->db->query("UPDATE projects SET project_status=1 WHERE project_id='$project_id'");
                    if ($changeProjectStatus) {
                        return 1;
                    } else {
                        return 2;
                    }
                } else {
                    return 2;
                }
            }
        }
        if ($para == 'update') {
            $updateTask = $this->db->query("UPDATE task SET $task_data WHERE task_id='$task_id'");
            if ($updateTask) {
                return $updateTask;
            } else {
                return 2;
            }
        }
    }
    public function task_delete()
    {
        extract($_POST);
        $query = $this->db->query("DELETE FROM task where task_id ='$task_id'");
        if ($query) {
            $removeProductivity = $this->db->query("DELETE FROM productivity WHERE task_id='$task_id'");
            if ($removeProductivity) {
                return $removeProductivity;
            } else {
                return 2;
            }
        }
    }
    public function task_update()
    {
        extract($_POST);
        if ($process == 'start') {
            $changeStatus = $this->db->query("UPDATE task SET task_status=1 WHERE task_id='$taskId'");
            if ($changeStatus) {
                return 1;
            } else {
                return 2;
            }
        } else if ($process == 'submit') {
            $changeStatus = $this->db->query("UPDATE task SET task_status=2 WHERE task_id='$taskId'");
            if ($changeStatus) {
                $taskLength =  $this->db->query("SELECT * FROM task WHERE project_id='$projectId'")->num_rows;
                $completeTask = $this->db->query("SELECT * FROM task WHERE project_id='$projectId' AND task_status=2")->num_rows;
                if ($taskLength == $completeTask) {
                    $changeProjectStatus = $this->db->query("UPDATE projects SET project_status=2 WHERE project_id='$projectId'");
                    if ($changeProjectStatus) {
                        return 1;
                    } else {
                        return 2;
                    }
                } else {
                    return 1;
                }
            } else {
                return 2;
            }
        }
    }



    // Productivity Management
    public function productivity_add($para)
    {
        extract($_POST);
        $pro_data = '';
        if ($para == 'insert') {
            $proId = $this->guidV4();
            $pro_data = "productivity_id  ='$proId'";
        } else if ($para == 'update') {
            $pro_data = "productivity_id  ='$productivity_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password', 'productivity_id', 'time_rendered')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $pro_data .= ", $k='$v' ";
                }
            }
        }
        $duration = abs(strtotime("2023-01-01 " . $end_time)) - abs(strtotime("2023-01-01 " . $start_time));
        $pro_data .= ", time_rendered  ='$duration'";
        if ($para == 'insert') {
            $checkPro = $this->db->query("SELECT * FROM productivity WHERE productivity_subject='$productivity_subject'")->num_rows;
            if ($checkPro  == 0) {
                $insertPro = $this->db->query("INSERT INTO productivity SET $pro_data");
                if ($insertPro) {
                    return 1;
                } else {
                    return 2;
                }
            }
        }
        if ($para == 'update') {
            $updatePro = $this->db->query("UPDATE productivity SET $pro_data WHERE productivity_id='$productivity_id'");
            if ($updatePro) {
                return $updatePro;
            } else {
                return 2;
            }
        }
    }
    public function productivity_delete()
    {
        extract($_POST);
        $deleteProductivity = $this->db->query("DELETE FROM productivity WHERE productivity_id='$productivity_id'");
        if ($deleteProductivity) {
            return 1;
        } else {
            return 2;
        }
    }



    // Client Management
    public function client_add($para)
    {
        extract($_POST);
        $client_data = '';
        if ($para == 'insert') {
            $clientId = $this->guidV4();
            $client_data = "client_id='$clientId'";
        } else if ($para == 'update') {
            $client_data = "client_id='$client_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $client_data .= ", $k='$v' ";
                }
            }
        }

        if ($para == 'insert') {
            $checkClientExists = $this->db->query("SELECT * FROM clients where client_email ='$client_email' ")->num_rows;
            if ($checkClientExists == 0) {

                $addClient = $this->db->query("INSERT INTO clients SET $client_data");
                if ($addClient) {
                    return $addClient;
                } else {
                    return $addClient;
                }
            } else {
                return 2;
            }
        } else if ($para == 'update') {
            $updateClient = $this->db->query("UPDATE clients SET $client_data WHERE client_id='$client_id'");
            if ($updateClient) {
                return $updateClient;
            }
        }
    }

    public function client_delete()
    {
        extract($_POST);
        $query =  $this->db->query("DELETE FROM clients WHERE client_id='$client_id'");
        if ($query) {
            return 1;
        } else {
            return $query;
        }
    }


    public function exp_add($para)
    {
        extract($_POST);
        $exp_data = '';
        $expId = '';
        if ($para == 'insert') {
            $expId = $this->guidV4();
            $exp_data = "exp_id='$expId'";
        } else if ($para == 'update') {
            $exp_data = "exp_id='$exp_id'";
        }
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('password', 'exp_id', 'oldFile'))) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $exp_data .= ", $k='$v' ";
                }
            }
        }

        if ($para == 'insert') {
            $checkExpExists = $this->db->query("SELECT * FROM expenses WHERE exp_name ='$exp_name' AND exp_amount =$exp_amount ")->num_rows;
            if ($checkExpExists == 0) {
                if (isset($_FILES['exp_bill_photo']) && $_FILES['exp_bill_photo']['tmp_name'] != '') {
                    return 1;
                    // $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['exp_bill_photo']['name'];
                    // $exp_data .= ", exp_bill_photo='$fname'";
                    // $move = move_uploaded_file($_FILES['exp_bill_photo']['tmp_name'], '../assets/Expenses/' . $fname);
                } else {
                    $fname = 'default_user.jpg';
                }
                $addExp = $this->db->query("INSERT INTO expenses SET $exp_data");
                if ($addExp) {
                    return $expId;
                } else {
                    return $addExp;
                }
            } else {
                return 2;
            }
        }

        if ($para == 'update') {
            if (isset($_FILES['exp_bill_photo']) && $_FILES['exp_bill_photo']['tmp_name'] != '') {
                $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['exp_bill_photo']['name'];
                if (file_exists('../assets/Expenses/' . $oldFile)) {
                    unlink('../assets/Expenses/' . $oldFile);
                }
                $move = move_uploaded_file($_FILES['exp_bill_photo']['tmp_name'], '../assets/Expenses/' . $fname);
                $exp_data .= ", exp_bill_photo='$fname'";
            } else {
                $fname = 'default_user.jpg';
            }
            // $updateEmp = $this->db->query("UPDATE employees SET emp_first_name='$emp_first_name', emp_last_name='$emp_last_name', emp_description='$emp_description', emp_gender='$emp_gender', emp_dob='$emp_dob', emp_mob=$emp_mob, emp_email='$emp_email', emp_address='$emp_address', emp_department='$emp_department', emp_designation='$emp_designation', emp_hod_name='$emp_hod_name', emp_joining_date='$emp_joining_date', emp_confirmation_date='$emp_confirmation_date', emp_leaving_date='$emp_leaving_date', emp_working_hours='$emp_working_hours', emp_profile_pic='$fname' WHERE emp_id='$emp_id'");
            $updateExp = $this->db->query("UPDATE expenses SET $exp_data WHERE exp_id='$exp_id'");
            if ($updateExp) {
                return $updateExp;
            } else {
                return 2;
            }
        }
    }

    public function upload_exp_profile()
    {
        extract($_POST);
        if (isset($_FILES['exp_bill_photo']) && $_FILES['exp_bill_photo']['tmp_name'] != '') {
            $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['exp_bill_photo']['name'];
            $move = move_uploaded_file($_FILES['exp_bill_photo']['tmp_name'], '../assets/expenses/' . $fname);
            $updateExp = $this->db->query("UPDATE expenses SET exp_bill_photo='$fname' WHERE exp_id='$exp_id'");
            if ($updateExp) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 2;
        }
    }

    public function exp_delete()
    {
        extract($_POST);
        $deletePic = $this->db->query("SELECT exp_bill_photo FROM expenses WHERE exp_id = '$exp_id'");
        while ($row = $deletePic->fetch_assoc()) {
            $fileName = $row['exp_bill_photo'];
            if (file_exists('../assets/Expenses/' . $fileName)) {
                unlink('../assets/Expenses/' . $fileName);
            }
            $query = $this->db->query("DELETE FROM expenses where exp_id ='$exp_id'");
            if ($query) {
                return 1;
            } else {
                return 2;
            }
        }
    }
}
