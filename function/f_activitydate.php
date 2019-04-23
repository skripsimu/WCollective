<?php

// connect to the database
require_once ("dbcontroller.php");

$db_handle = new DBController();
$db_connect = $db_handle->connectDB();

$compId ="";
$compName = "";
$now = date('Y-m-d');
$endDates = strtotime($now);
$endDate = date('Y-m-d', $endDates);
$startDates = strtotime("-7 day", $endDates);
$startDate = date('Y-m-d', $startDates);

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


// if search button submitted
if (isset($_POST['search']))
	{
     if (isset($_POST['company'])) $compId = $_POST['company'];
     if ($compId != 0){
          if (isset($_POST['startDate'])) $startDate = $_POST['startDate'];
          if (isset($_POST['endDate'])) $endDate = $_POST['endDate'];

          // query

          $q_msg_sender = "SELECT c.name ,COUNT(m.id_sender) as total , CAST(m.date AS DATE) as date FROM message m, company c, user u WHERE m.id_sender = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_msg_receiver = "SELECT c.name ,COUNT(m.id_receiver) as total , CAST(m.date AS DATE) as date FROM message m, company c, user u WHERE m.id_receiver = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_voip_sender = "SELECT c.name ,COUNT(m.id_sender) as total , CAST(m.date AS DATE) as date FROM voip m, company c, user u WHERE m.id_sender = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_voip_receiver = "SELECT c.name ,COUNT(m.id_receiver) as total , CAST(m.date AS DATE) as date FROM voip m, company c, user u WHERE m.id_receiver = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_ls_sender = "SELECT c.name ,COUNT(m.id_sender) as total , CAST(m.date AS DATE) as date FROM live_streaming m, company c, user u WHERE m.id_sender = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_ls_receiver = "SELECT c.name ,COUNT(m.id_receiver) as total , CAST(m.date AS DATE) as date FROM live_streaming m, company c, user u WHERE m.id_receiver = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_vid_sender = "SELECT c.name ,COUNT(m.id_sender) as total , CAST(m.date AS DATE) as date FROM vidio m, company c, user u WHERE m.id_sender = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_vid_receiver = "SELECT c.name ,COUNT(m.id_receiver) as total , CAST(m.date AS DATE) as date FROM vidio m, company c, user u WHERE m.id_receiver = u.id_user AND u.id_company = c.id_company  AND c.id_company like $compId AND m.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_user_reg = "SELECT c.name, COUNT(id_user) as total, CAST(date AS DATE) as date FROM user u, company c WHERE u.id_company = c.id_company AND c.id_company like $compId AND u.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_user_actv = "SELECT c.name, COUNT(id_user) as total, CAST(date AS DATE) as date FROM user u, company c WHERE u.status = 1 AND u.id_company = c.id_company AND c.id_company like $compId AND u.date BETWEEN '$startDate' AND '$endDate' GROUP BY CAST(date AS DATE)";
          $q_company_name = "SELECT name FROM company WHERE id_company = $compId";
          $company_name = $db_handle->runQ($q_company_name);
          $compName = $company_name['name'];
          
          // date interval
          function daterange($startDate, $endDate)
               {
               $begin = new DateTime($startDate);
               $end = new DateTime($endDate);
               $interval = new DateInterval('P1D');
               $daterange = new DatePeriod($begin, $interval, $end);
               $date_range = "";
               foreach($daterange as $date)
                    {
                    echo $date->format("'Y-m-d'") . ", ";
                    }
               }
               
               // echo $q_msg_sender."</br>";
               // echo $q_msg_receiver."</br>";
               // echo $q_ls_sender."</br>";
               // echo $q_ls_receiver."</br>";
               // echo $q_user_actv."</br>";
               // echo $q_user_reg."</br>";
               // echo $q_vid_sender."</br>";
               // echo $q_vid_receiver."</br>";
               // echo $q_voip_sender."</br>";
               // echo $q_voip_receiver."</br>";
               // die;
          } else {
               // query
          $q_msg_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date FROM `message` GROUP BY CAST(date AS DATE)";
          $q_msg_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date FROM `message` GROUP BY CAST(date AS DATE)";
          $q_voip_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date  FROM `voip` GROUP BY CAST(date AS DATE)";
          $q_voip_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date  FROM `voip` GROUP BY CAST(date AS DATE)";
          $q_ls_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date  FROM `live_streaming` GROUP BY CAST(date AS DATE)";
          $q_ls_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date  FROM `live_streaming` GROUP BY CAST(date AS DATE)";
          $q_vid_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date  FROM `video` GROUP BY CAST(date AS DATE)";
          $q_vid_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date  FROM `video` GROUP BY CAST(date AS DATE)";
          $q_user_reg = "SELECT COUNT(id_user) as total, CAST(date AS DATE) as date FROM `user` GROUP BY CAST(date AS DATE)";
          $q_user_actv = "SELECT COUNT(id_user) as total, CAST(date AS DATE) as date FROM `user` WHERE status = 1 GROUP BY CAST(date AS DATE)";
          
          // default date range
          function daterange()
               {
               $begin = new DateTime();
               $begin = $begin->modify('-7 day');
               $end = new DateTime();
               $interval = new DateInterval('P1D');
               $daterange = new DatePeriod($begin, $interval, $end);
               $date_range = "";
               foreach($daterange as $date)
                    {
                    echo $date->format("'Y-m-d'") . ", ";
                    }
               }
          }
	

	}

  else
     // default query   
	{

	// query
	$q_msg_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date FROM `message` GROUP BY CAST(date AS DATE)";
	$q_msg_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date FROM `message` GROUP BY CAST(date AS DATE)";
	$q_voip_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date  FROM `voip` GROUP BY CAST(date AS DATE)";
	$q_voip_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date  FROM `voip` GROUP BY CAST(date AS DATE)";
	$q_ls_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date  FROM `live_streaming` GROUP BY CAST(date AS DATE)";
	$q_ls_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date  FROM `live_streaming` GROUP BY CAST(date AS DATE)";
	$q_vid_sender = "SELECT COUNT(id_sender) as total , CAST(date AS DATE) as date  FROM `video` GROUP BY CAST(date AS DATE)";
	$q_vid_receiver = "SELECT COUNT(id_receiver) as total , CAST(date AS DATE) as date  FROM `video` GROUP BY CAST(date AS DATE)";
	$q_user_reg = "SELECT COUNT(id_user) as total, CAST(date AS DATE) as date FROM `user` GROUP BY CAST(date AS DATE)";
     $q_user_actv = "SELECT COUNT(id_user) as total, CAST(date AS DATE) as date FROM `user` WHERE status = 1 GROUP BY CAST(date AS DATE)";
     
     // default date range
     function daterange()
		{
          $begin = new DateTime();
          $begin = $begin->modify('-7 day');
		$end = new DateTime();
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval, $end);
		$date_range = "";
		foreach($daterange as $date)
			{
			echo $date->format("'Y-m-d'") . ", ";
			}
		}

	}

// run query
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


// show result
foreach($msg_sender as $msg1)
	{
	$r_msg_sender = $r_msg_sender . ' ' . $msg1['total'] . ', ';
	}

foreach($msg_receiver as $msg2)
	{
	$r_msg_receiver = $r_msg_receiver . ' ' . $msg2['total'] . ', ';
	}

foreach($voip_sender as $voip1)
	{
	$r_voip_sender = $r_voip_sender . ' ' . $voip1['total'] . ', ';
	}

foreach($voip_receiver as $voip2)
	{
	$r_voip_receiver = $r_voip_receiver . ' ' . $voip2['total'] . ', ';
	}

foreach($ls_sender as $ls1)
	{
	$r_ls_sender = $r_ls_sender . ' ' . $ls1['total'] . ', ';
	}

foreach($ls_receiver as $ls2)
	{
	$r_ls_receiver = $r_ls_receiver . ' ' . $ls2['total'] . ', ';
	}

foreach($vid_sender as $vid1)
	{
	$r_vid_sender = $r_vid_sender . ' ' . $vid1['total'] . ', ';
	}

foreach($vid_receiver as $vid2)
	{
	$r_vid_receiver = $r_vid_receiver . ' ' . $vid2['total'] . ', ';
	}

foreach($user_reg as $usr1)
	{
	$r_user_reg = $r_user_reg . ' ' . $usr1['total'] . ', ';
	}

foreach($user_actv as $usr2)
	{
	$r_user_actv = $r_user_actv . ' ' . $usr2['total'] . ', ';
     }

if($compName == ""){
     $compName = "All Company";
}
     
?>