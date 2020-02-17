<?php 

     if ($_GET[EditRow] != "") {
	 
	      $Query = "SELECT * FROM ". $EditingDB. " WHERE ID =". $_GET[EditRow];	
		  $Result = mysql_query($Query,$Link);
		   
		  if ($Row = mysql_fetch_array($Result)) {

		       echo '<form action="Connect.php?action=EditRental&EditRow='. $_GET[EditRow]. '" method="post">';
		       echo 'Customer:';
			   echo '<select name="Customer">';
		                       $Result2 = mysql_query("SELECT * From Customer", $Link);
		       	               while ($Row2 = mysql_fetch_array($Result2)) { 
							   if ($Row2[ID] == $Row[Cust]) {echo "<option value=". $Row2[ID] . " selected>". $Row2[Name];}else{echo "<option value=". $Row2[ID] . ">". $Row2[Name];}}
		       echo '</select><br />	  ';
		       echo 'Contact: <input name="Contact" type="text" value="'. $Row[Contact]. '"><br />';
		       echo 'Serial Number: <input name="SNum" type="text" value="'. $Row[SNum]. '"><br />';
		       echo 'Start Date (YYYY-MM-DD): <input name="StartDate" type="text" value="'. $Row[Start]. '"><br />';
		       echo 'End Date (YYYY-MM-DD): <input name="EndDate" type="text" value="'. $Row[End]. '"><br />';
		       echo '<input value="Edit Rental" type="submit">';
		       echo '</form>';

			   
		  } else {die('Could not send query: ' . mysql_error());}

	 }
	 
?>