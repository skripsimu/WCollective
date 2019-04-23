<?php 

// connect to the database
require_once ("dbcontroller.php");
$db_handle = new DBController();
$db_connect = $db_handle->connectDB();
$compName = "";


if(isset($_POST["search"])){
     if(isset($_POST['company'])) $company = $_POST['company'];
     if($company != 0){

          // query select company (multiple or one)
          $q_user_reg = "SELECT COUNT(id_user) as total FROM user WHERE id_company = '$company'";
          $q_user_actv = "SELECT COUNT(id_user) as total FROM user WHERE status ='1' and id_company = '$company'";
          $q_msg_sender = "SELECT COUNT(m.id_sender) as total FROM message m, company c, user u WHERE m.id_sender = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company'";
          $q_msg_receiver = "SELECT COUNT(m.id_receiver) as total FROM message m, company c, user u WHERE m.id_receiver = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company'";
          $q_voip_sender = "SELECT COUNT(vo.id_sender) as total FROM voip vo, company c, user u WHERE vo.id_sender = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company' ";
          $q_voip_receiver = "SELECT COUNT(vo.id_receiver) as total FROM voip vo, company c, user u WHERE vo.id_receiver = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company'";
          $q_vid_sender = "SELECT COUNT(vid.id_sender) as total FROM vidio vid, company c, user u WHERE vid.id_sender = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company'";
          $q_vid_receiver = "SELECT COUNT(vid.id_receiver) as total FROM vidio vid, company c, user u WHERE vid.id_receiver = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company' ";
          $q_ls_sender = "SELECT COUNT(ls.id_sender) as total FROM live_streaming ls, company c, user u WHERE ls.id_sender = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company' ";
          $q_ls_receiver = "SELECT COUNT(ls.id_receiver) as total FROM live_streaming ls, company c, user u WHERE ls.id_receiver = u.id_user AND u.id_company = c.id_company AND c.id_company = '$company'";
          $q_company_name = "SELECT name FROM company WHERE id_company = '$company'";
          $company_name = $db_handle->runQ($q_company_name);
          $compName = $company_name['name'];
     }
     elseif($company == 0){

          // query all company
          $q_user_reg = "SELECT COUNT(id_user) as total FROM user ";
          $q_user_actv = "SELECT COUNT(id_user) as total FROM user WHERE status ='1' ";
          $q_msg_sender = "SELECT COUNT(id_sender) as total FROM message ";
          $q_msg_receiver = "SELECT COUNT(id_receiver) as total FROM message ";
          $q_voip_sender = "SELECT COUNT(id_sender) as total  FROM voip ";
          $q_voip_receiver = "SELECT COUNT(id_receiver) as total FROM voip ";
          $q_vid_sender = "SELECT COUNT(id_sender) as total FROM vidio ";
          $q_vid_receiver = "SELECT COUNT(id_receiver) as total FROM vidio ";
          $q_ls_sender = "SELECT COUNT(id_sender) as total FROM live_streaming ";
          $q_ls_receiver = "SELECT COUNT(id_receiver) as total FROM live_streaming ";
     }
}else{
     $q_user_reg = "SELECT COUNT(id_user) as total FROM user ";
     $q_user_actv = "SELECT COUNT(id_user) as total FROM user WHERE status ='1' ";
     $q_msg_sender = "SELECT COUNT(id_sender) as total FROM message ";
     $q_msg_receiver = "SELECT COUNT(id_receiver) as total FROM message ";
     $q_voip_sender = "SELECT COUNT(id_sender) as total  FROM voip ";
     $q_voip_receiver = "SELECT COUNT(id_receiver) as total FROM voip ";
     $q_vid_sender = "SELECT COUNT(id_sender) as total FROM vidio ";
     $q_vid_receiver = "SELECT COUNT(id_receiver) as total FROM vidio ";
     $q_ls_sender = "SELECT COUNT(id_sender) as total FROM live_streaming ";
     $q_ls_receiver = "SELECT COUNT(id_receiver) as total FROM live_streaming ";
}
// result
$msg_sender = $db_handle->runQueryA($q_msg_sender);
$msg_receiver = $db_handle->runQueryA($q_msg_receiver);
$voip_sender = $db_handle->runQueryA($q_voip_sender);
$voip_receiver = $db_handle->runQueryA($q_voip_receiver);
$ls_sender = $db_handle->runQueryA($q_ls_sender);
$ls_receiver = $db_handle->runQueryA($q_ls_receiver);
$vid_sender = $db_handle->runQueryA($q_vid_sender);
$vid_receiver = $db_handle->runQueryA($q_vid_receiver);
$user_reg = $db_handle->runQueryA($q_user_reg);
$user_actv = $db_handle->runQueryA($q_user_actv);

// show result example
// echo $user_actv['total'];
// loop trough row to get chart data
$r_msg_sender = "";
$r_msg_receiver = "";
$r_voip_sender = "";
$r_voip_receiver = "";
$r_ls_sender = "";
$r_ls_receiver = "";
$r_vid_sender = "";
$r_vid_receiver = "";
$r_user_reg = "";
$r_user_actv = "";

foreach ($msg_sender as $msg1)
{
     $r_msg_sender = $r_msg_sender.' '.$msg1['total'].', ';
}

foreach ($msg_receiver as $msg2)
{
     $r_msg_receiver = $r_msg_receiver.' '.$msg2['total'].', ';
}

foreach ($voip_sender as $voip1)
{
     $r_voip_sender = $r_voip_sender.' '.$voip1['total'].', ';
}

foreach ($voip_receiver as $voip2)
{
     $r_voip_receiver = $r_voip_receiver.' '.$voip2['total'].', ';
}

foreach ($ls_sender as $ls1)
{
     $r_ls_sender = $r_ls_sender.' '.$ls1['total'].', ';
}

foreach ($ls_receiver as $ls2)
{
     $r_ls_receiver = $r_ls_receiver.' '.$ls2['total'].', ';
}

foreach ($vid_sender as $vid1)
{
     $r_vid_sender = $r_vid_sender.' '.$vid1['total'].', ';
}

foreach ($vid_receiver as $vid2)
{
     $r_vid_receiver = $r_vid_receiver.' '.$vid2['total'].', ';
}

foreach ($user_reg as $usr1)
{
     $r_user_reg = $r_user_reg.' '.$usr1['total'].', ';
}

foreach ($user_actv as $usr2)
{
     $r_user_actv = $r_user_actv.' '.$usr2['total'].', ';
}

if($compName == ""){
     $compName = "All Company";
}








?>