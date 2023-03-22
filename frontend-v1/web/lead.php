<?php
include './db.config.php';


function guidV4($data = null)
{
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s%s%s%s%s%s%s', str_split(bin2hex($data), 4));
}

extract($_POST);

$id = guidV4();
$lead_data = "lead_id='$id'";

foreach ($_POST as $k => $v) {
    if (!in_array($k, array('password', 'lead_id')) && !is_numeric($k)) {
        if ($v != '0000-00-00' || !empty($v)) {
            $lead_data .= ", $k='$v' ";
        }
    }
}
$lead_data .= ", lead_status=0";

$query = $con->query("INSERT INTO lead SET $lead_data");

if($query){
    return 1;
}else{
    return 2;
}
