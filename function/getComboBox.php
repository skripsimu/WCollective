<?php
require_once ('dbcontroller.php');
$db_handle = new DBController();

if (!empty($_POST['company_id'])) //pilih brand dpt motor
{
	$compId = $_POST['company_id'];
    $query = "SELECT * FROM division WHERE id_company = $compId order by name asc";
    $results = $db_handle->runQuery($query);
    $ct_br = $db_handle->numRows($query);
	
    if($ct_br>0)
    {
    	echo "<option value=''>Select Organization</option>";

        foreach ($results as $division)
        {
        	echo "<option value='".$division['id_division']."'>".$division['name']."</option>";
        }
    }

    else echo "<option value='' disabled selected>Organization not available</option>";
}