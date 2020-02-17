<?php 

     if ($_GET[EditRow] != "") {
	 
	      $Query = "SELECT * FROM ". $EditingDB. " WHERE ID =". $_GET[EditRow];	
		  $Result = mysql_query($Query,$Link);
		   
		  if ($Row = mysql_fetch_array($Result)) {
		       
		       echo '<form action="Connect.php?action=EditAllocation&EditRow='. $_GET[EditRow]. '" method="post">';
		       echo 'Name: <input name="Name" type="text" value="'. $Row[Name]. '"><br />';
		       echo '<input value="Edit Allocation" type="submit">';
		       echo '</form>';
			   
		  } else {die('Could not send query: ' . mysql_error());}

	 }
	 
?>

