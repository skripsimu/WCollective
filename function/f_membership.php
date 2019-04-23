<?php 
// connect to the database
include ("dbcontroller.php");

$tablecontent = '';
$company = '';
$division = '';
$no=1;

$db_handle = new DBController();
$db_connect = $db_handle->connectDB();


$query_def = "SELECT 
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

$res_def = $db_handle -> runQueryA($query_def);

if(isset ($_POST['search']))
{
    if(isset($_POST['company'])) $company = $_POST['company'];
    if(isset($_POST['division'])) $division = $_POST['division'];
    $tablecontent = '';

    $query_search = "SELECT 
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
                        and p.id_position = u.id_position
                        and c.id_company like '$company' 
                        and d.id_division like '$division%'";

$res_serc = $db_handle -> runQueryA($query_search);

if (!empty($res_serc)) foreach ($res_serc as $column)
    {
        if ($column['status']==1){
            $statusvalid = 'Aktif';
        }
        else{
            $statusvalid = 'Tidak Aktif';
        }
        $tablecontent = $tablecontent.'<tr>'.
        '<td>'.$no.'</td>'.
        '<td>'.$column[0].'</td>'.
        '<td>'.$column[1].'</td>'.
        '<td>'.$column[2].'</td>'.
        '<td>'.$column[3].'</td>'.
        '<td>'.$column[4].'</td>'.
        '<td>'.$column[5].'</td>'.
        '<td>'.$column[6].'</td>'.
        '<td>'.$statusvalid.'</td>';
        $no++;
    }
}

else{
    foreach ($res_def as $column)
    {
        if ($column['status']==1){
            $statusvalid = 'Aktif';
        }
        else{
            $statusvalid = 'Tidak Aktif';
        }
        $tablecontent = $tablecontent.'<tr>'.
        '<td>'.$no.'</td>'.
        '<td>'.$column[0].'</td>'.
        '<td>'.$column[1].'</td>'.
        '<td>'.$column[2].'</td>'.
        '<td>'.$column[3].'</td>'.
        '<td>'.$column[4].'</td>'.
        '<td>'.$column[5].'</td>'.
        '<td>'.$column[6].'</td>'.
        '<td>'.$statusvalid.'</td>';
        $no++;
    }
}
?>