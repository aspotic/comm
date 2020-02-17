<?php 

     if ($_GET[EditRow] != "") {
	 
	      $Query = "SELECT * FROM ". $EditingDB. " WHERE ID =". $_GET[EditRow];	
		  $Result = mysql_query($Query,$Link);
		   
		  if ($Row = mysql_fetch_array($Result)) {

		       echo '<form action="Connect.php?action=EditFrequency&EditRow='. $_GET[EditRow]. '" method="post">';
		       echo 'Name: <input name="Name" type="text" value="'. $Row[Name]. '"><br />';
		       echo 'FPosition: <input name="FPosition" type="text" value="'. $Row[FPosition]. '"><br />';
		       echo 'Rx: <input name="Rx" type="text" value="'. $Row[Rx]. '"><br />';
		       echo 'Tx: <input name="Tx" type="text" value="'. $Row[Tx]. '"><br />';
		       echo 'CSQ : <input name="CSQ" type="text" value="'. $Row[CSQ]. '"><br />';
		       echo 'TPL: <input name="TPL" type="text" value="'. $Row[TPL]. '"><br />';
		       echo 'DPL: <input name="DPL" type="text" value="'. $Row[DPL]. '"><br />';
		       echo 'Area: <input name="Area" type="text" value="'. $Row[Area]. '"><br />';
		       echo 'BW: <input name="BW" type="text" value="'. $Row[BW]. '"><br />';
		       echo 'Units: <input name="Unit" type="text" value="'. $Row[Units]. '"><br /><br />';
		       echo 'Comments<br />';
		       echo '<textarea name="Comments" rows=5 cols=23 >'. $Row[Comments]. '</textarea><br />';
		       echo '<input value="Edit Frequency" type="submit">';
		       echo '</form>';

			   
		  } else {die('Could not send query: ' . mysql_error());}

	 }
	 
?>