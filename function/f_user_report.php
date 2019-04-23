<?php

require_once ("dbcontroller.php");
#camelCase
$tableContent = '';
$company = '';
$no = 1;

$db_handle = new DBcontroller();
$db_connect = $db_handle->connectDB();

$query_ws = "SELECT 
                company.name, 
                COUNT(user.id_user), 
                COUNT(CASE WHEN user.status = 1 THEN 1 ELSE null END)
            FROM company, 
                user 
            WHERE company.id_company = user.id_company 
            GROUP BY company.name";

$res_ws = $db_handle -> runQueryA($query_ws);

if(isset ($_POST['search'])){
    
    if(isset($_POST['company'])) $company = $_POST['company'];
    $tableContent = '';
    
    $query_search = "SELECT 
                        company.name, 
                        count(user.id_user), 
                        count(CASE WHEN user.status = 1 THEN 1 ELSE null END)
                    FROM company,
                         user 
                    WHERE company.id_company = user.id_company AND 
                         user.id_company like '$company' 
                    GROUP BY company.name";

    $res_search = $db_handle -> runQueryA($query_search);

    if (!empty($res_search)) foreach ($res_search as $column){
        
        $tableContent = $tableContent.'<tr>'.
        '<td align="center">'.$no.'</td>'.
        '<td align="center">'.$column[0].'</td>'.
        '<td align="center">'.$column[1].'</td>'.
        '<td align="center">'.$column[2].'</td>'.
        '</tr>';
        $no++;

    }

}

else{
    foreach($res_ws as $column){
        $tableContent = $tableContent.'<tr>'.
        '<td align="center">'.$no.'</td>'.
        '<td align="center">'.$column[0].'</td>'.
        '<td align="center">'.$column[1].'</td>'.
        '<td align="center">'.$column[2].'</td>'.
        '</tr>';
        $no++;
    }
}
?>