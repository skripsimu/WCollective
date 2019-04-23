<?php 

// connect to the database
include_once ("dbcontroller.php");
$db_handle = new DBController();

$company = $db_handle->SFT('company');
$division = $db_handle->SFT('division');

function combobox($data,$case)
{
    $output = '';

    switch ($case)
    {
        case 'CASE_COMPANY':
        foreach ($data as $dt)
        {
            $output .="<option value='".$dt['id_company']."'>".$dt['name']."</option>";
        } break;

        case 'CASE_DIVISION':
        foreach ($data as $dt)
        {
            $output .="<option value='".$dt['id_division']."'>".$dt['name']."</option>";
        } break;

        default: break;
    }

    echo $output;
}
?>