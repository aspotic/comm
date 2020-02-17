<?php 

     if ($_GET[EditRow] != "") {
	 
	      $Query = "SELECT * FROM ". $EditingDB. " WHERE ID =". $_GET[EditRow];	
		  $Result = mysql_query($Query,$Link);
		   
		  if ($Row = mysql_fetch_array($Result)) {

		       echo '<form action="Connect.php?action=EditModel&EditRow='. $_GET[EditRow]. '" method="post">';
		       echo 'Model Name: <input name="Model" type="text" value="'.$Row[Model] . '"><br />';
		       echo 'Price: <input name="Price" type="text" value="'.$Row[Price] . '"><br /><br />';
		       echo 'Description:<br /><textarea name="Description" rows=5 cols=23 >'.$Row[Descr] . '</textarea><br />';
		       echo '<input value="Edit Model" type="submit"></form>';
  
		  } else {die('Could not send query: ' . mysql_error());}

	 }
	 
?>