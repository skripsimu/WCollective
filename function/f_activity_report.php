<?php

require_once ("dbcontroller.php");
#camelCase
$tableContent = '';
$company = '';
$number = 1;

$db_handle = new DBcontroller();
$db_connect = $db_handle->connectDB();

# v for value
$query_ws = "SELECT 
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

$res_ws = $db_handle -> runQueryA($query_ws);

if(isset ($_POST['search'])){
    
    if(isset($_POST['company'])) $company = $_POST['company'];
    $tableContent = '';
    
    $query_search = "SELECT 
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
                        v1.id_company = v4.id AND 
                        v1.id_company like '$company'";

    $res_search = $db_handle -> runQueryA($query_search);

    if (!empty($res_search)) foreach ($res_search as $column){
        
        $tableContent = $tableContent.'<tr>'.
        '<td align="center">'.$number.'</td>'.
        '<td align="center">'.$column[0].'</td>'.
        '<td align="center">'.$column[1].'</td>'.
        '<td align="center">'.$column[2].'</td>'.
        '<td align="center">'.$column[3].'</td>'.
        '<td align="center">'.$column[4].'</td>'.
        '<td align="center">'.$column[5].'</td>'.
        '<td align="center">'.$column[6].'</td>'.
        '</tr>';
        $number++;

    }

}

else{
    foreach($res_ws as $column){
        $tableContent = $tableContent.'<tr>'.
        '<td align="center">'.$number.'</td>'.
        '<td align="center">'.$column[0].'</td>'.
        '<td align="center">'.$column[1].'</td>'.
        '<td align="center">'.$column[2].'</td>'.
        '<td align="center">'.$column[3].'</td>'.
        '<td align="center">'.$column[4].'</td>'.
        '<td align="center">'.$column[5].'</td>'.
        '<td align="center">'.$column[6].'</td>'.
        '</tr>';
        $number++;
    }
}
?>