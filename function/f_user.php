<?php

// connect to the database
require_once ("dbcontroller.php");
$db_handle = new DBController();
$db_connect = $db_handle->connectDB();

//get list company for dropdown
$list_company = $db_handle->runQuery("SELECT  id_company,name FROM company ORDER BY id_company");

if(isset($_POST["search"])){
     if(isset($_POST['company'])) $company = $_POST['company'];
     $selectedOptionCount = count($_POST['company']);
     $selectedOption = "";
     if ($company[0] != 0){
          $i = 0;
          while ($i < $selectedOptionCount) {
              $selectedOption = $selectedOption . "'" . $_POST['company'][$i] . "'";
              if ($i < $selectedOptionCount - 1) {
                  $selectedOption = $selectedOption . ", ";
              }
              $i ++;
          }
          

          for ($j = 0; $j < $selectedOptionCount; $j++){
               //query
               $q_user_reg_sel = "SELECT COUNT(id_user) as total FROM user WHERE id_company = ". "'" . $_POST['company'][$j] . "'";
               $q_user_actv_sel = "SELECT COUNT(id_user) as total FROM user WHERE status = '1' AND id_company = ". "'" . $_POST['company'][$j] . "'";
               $q_company_name = "SELECT name FROM company WHERE id_company = ". "'" . $_POST['company'][$j] . "'";

               $user_reg_sel = $db_handle->runQ($q_user_reg_sel);
               $user_actv_sel = $db_handle->runQ($q_user_actv_sel);
               $company_name = $db_handle->runQ($q_company_name);

               $r_user_reg = $r_user_reg.' '.$user_reg_sel['total'].', ';
               $r_user_actv = $r_user_actv.' '.$user_actv_sel['total'].', ';
               $r_company_name = $r_company_name.' "'.$company_name['name'].'", ';
               $r_company_name_header = $r_company_name_header.' '.$company_name['name'].', ';


          }
              
     }
     elseif ($company[0] == 0){
          // query all company
          $q_user_reg = "SELECT COUNT(id_user) as total FROM user GROUP by id_company";
          $q_user_actv = "SELECT COUNT(id_user) as total FROM user WHERE status = '1' GROUP by id_company";
          $q_company_name = "SELECT name FROM company as name GROUP BY id_company";
          

          // result
          $user_reg = $db_handle->runQueryA($q_user_reg);
          $user_actv = $db_handle->runQueryA($q_user_actv);
          $company_name = $db_handle->runQueryA($q_company_name);

          $r_user_reg = "";
          $r_user_actv = "";
          $r_company_name = "";

          foreach ($user_reg as $usr1)
          {
               $r_user_reg = $r_user_reg.' '.$usr1['total'].', ';
          }

          foreach ($user_actv as $usr2)
          {
               $r_user_actv = $r_user_actv.' '.$usr2['total'].', ';
          }

          foreach ($company_name as $c_name){
               $r_company_name = $r_company_name.' "'.$c_name['name'].'", ';
          }

          if($r_company_name_header == ""){
               $r_company_name_header = "All Company";
          }
          
     }
             
}else{

          //default querying all company
          $q_user_reg = "SELECT COUNT(id_user) as total FROM user GROUP by id_company";
          $q_user_actv = "SELECT COUNT(id_user) as total FROM user WHERE status = '1' GROUP by id_company";
          $q_company_name = "SELECT name FROM company as name GROUP BY id_company";

          // result
          $user_reg = $db_handle->runQueryA($q_user_reg);
          $user_actv = $db_handle->runQueryA($q_user_actv);
          $company_name = $db_handle->runQueryA($q_company_name);
          $r_company_name = "";

          $r_user_reg = "";
          $r_user_actv = "";

          foreach ($user_reg as $usr1)
          {
               $r_user_reg = $r_user_reg.' '.$usr1['total'].', ';
          }

          foreach ($user_actv as $usr2)
          {
               $r_user_actv = $r_user_actv.' '.$usr2['total'].', ';
          }

          foreach ($company_name as $c_name){
               $r_company_name = $r_company_name.' "'.$c_name['name'].'", ';
          }

          if($r_company_name_header == ""){
               $r_company_name_header = "All Company";
          }
     }



?>
