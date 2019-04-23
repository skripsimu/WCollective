<?php   
include ("function/dbcontroller.php");
$output = '';
$no=1;

$db_handle = new DBController();
$db_connect = $db_handle->connectDB();
if(isset($_POST["details"]))
{
 $query = "SELECT 
                c.name,
                d.name,
                s.name,
                p.name,
                u.name,
                u.phone_number,
                u.email,
                u.status
             FROM
                company c,
                division d,
                sub_division s,
                position p,
                user u
             WHERE
                c.id_company = u.id_company 
                and d.id_division = u.id_division
                and s.id_sub_division = u.id_sub_division
                and p.id_position = u.id_position";
 $result = $db_handle -> runQueryA($query);
 $ct_br = $db_handle->numRows($query);
 if($ct_br > 0)
 {
  $output .= '
  <table class="table" bordered="1" >  
  <tr>  
  <th bgcolor="#0762f4" class="text-center">No</th>
  <th bgcolor="#0762f4" class="text-center">Perusahaan</th>
  <th bgcolor="#0762f4" class="text-center">Organisasi</th>
  <th bgcolor="#0762f4" class="text-center" >Sub Organisasi</th>
  <th bgcolor="#0762f4" class="text-center">Posisi</th>
  <th bgcolor="#0762f4" class="text-center">Nama</th>
  <th bgcolor="#0762f4" class="text-center">No. Handphone</th>
  <th bgcolor="#0762f4" class="text-center">Email</th>
  <th bgcolor="#0762f4" class="text-center">Status</th>
  </tr>
  ';
  foreach ($result as $column)
    {
        if ($column['status']==1){
            $statusvalid = 'Aktif';
        }
        else{
            $statusvalid = 'Tidak Aktif';
        }
        $output .=
        '<tr>'.
        '<td style="text-align:center" bgcolor="#e3e4e5">'.$no.'</td>'.
        '<td bgcolor="#e3e4e5">'.$column[0].'</td>'.
        '<td bgcolor="#e3e4e5" width="1000">'.$column[1].'</td>'.
        '<td bgcolor="#e3e4e5" width="700">'.$column[2].'</td>'.
        '<td bgcolor="#e3e4e5">'.$column[3].'</td>'.
        '<td bgcolor="#e3e4e5">'.$column[4].'</td>'.
        '<td bgcolor="#e3e4e5">'.$column[5].'</td>'.
        '<td bgcolor="#e3e4e5">'.$column[6].'</td>'.
        '<td bgcolor="#e3e4e5">'.$statusvalid.'</td>';
        $no++;
    }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=membership-reporting.xls');
  echo $output;
 }
}
if(isset($_POST["activity"]))
{
 $query = "SELECT 
 v1.name, 
 v2.id_sender, 
 v2.id_receiver, 
 v3.id_sender, 
 v3.id_receiver, 
 v4.id_sender, 
 v4.id_receiver 
FROM company v1, 
 voip v2, 
 vidio v3, 
 live_streaming v4 
WHERE v1.id_company = v2.id AND 
 v1.id_company = v3.id AND 
 v1.id_company = v4.id";
 $result = $db_handle -> runQueryA($query);
 $ct_br = $db_handle->numRows($query);
 if($ct_br > 0)
 {
  $output .= '
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">Perusahaan</th>
                          <th style="text-align:center">Voip In</th>
                          <th style="text-align:center">Voip Out</th>
                          <th style="text-align:center">V-call In</th>
                          <th style="text-align:center">V-call Out</th>
                          <th style="text-align:center">Stream In</th>
                          <th style="text-align:center">Stream Out</th>
                        </tr>
  ';
  foreach ($result as $column)
  {
   $output .= 
   '<tr>'.
        '<td align="center">'.$no.'</td>'.
        '<td align="center">'.$column[0].'</td>'.
        '<td align="center">'.$column[1].'</td>'.
        '<td align="center">'.$column[2].'</td>'.
        '<td align="center">'.$column[3].'</td>'.
        '<td align="center">'.$column[4].'</td>'.
        '<td align="center">'.$column[5].'</td>'.
        '<td align="center">'.$column[6].'</td>'.
        '</tr>';
        $no++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=activity-reporting.xls');
  echo $output;
 }
}
if(isset($_POST["users"]))
{
 $query = "SELECT 
                company.name, 
                COUNT(user.id_user), 
                COUNT(CASE WHEN user.status = 1 THEN 1 ELSE null END)
            FROM company, 
                user 
            WHERE company.id_company = user.id_company 
            GROUP BY company.name";
 $result = $db_handle -> runQueryA($query);
 $ct_br = $db_handle->numRows($query);
 if($ct_br > 0)
 {
  $output .= '
  <table class="table" bordered="1">  
  <tr>  
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">Perusahaan</th>
                          <th style="text-align:center">Sudah Registrasi</th>
                          <th style="text-align:center">Aktif</th>
  </tr>
  ';
  foreach ($result as $column)
  {
   $output .= 
   '<tr>'.
        '<td align="center">'.$no.'</td>'.
        '<td align="center">'.$column[0].'</td>'.
        '<td align="center">'.$column[1].'</td>'.
        '<td align="center">'.$column[2].'</td>'.
        '</tr>';
        $no++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=user_reporting.xls');
  echo $output;
 }
}
?>