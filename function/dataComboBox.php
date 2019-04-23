<?php 
include_once("dbcontroller.php");

$db_handle = new DBController();
$company = $db_handle->SFT('company');
$division = $db_handle->SFT('division');
$sub_division = $db_handle->SFT('sub_division');
$position = $db_handle->SFT('position');

function combobox($data,$case)
{
	$output = '';

	switch ($case)
	{
		case 'COMPANY':
			foreach ($data as $dt)
			{
				$output .="<option value='".$dt['id_company']."'>".$dt['name']."</option>";
			} break;

			case 'DIVISION':
			foreach ($data as $dt)
			{
				$output .="<option value='".$dt['id_division']."'>".$dt['name']."</option>";
			} break;

		default: break;
	}

	echo $output;
}
?>