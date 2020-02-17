<?php
     if ($_GET[ViewModel] != "") {
          echo "<center><br /><h3>Selected Model List</h3><table border=1 width='75%>'";
		  echo "<tr><td>Make</td><td>Model</td><td>Serial Number</td><td>Allocation</td></tr>";
	      $Result = mysql_query("SELECT * FROM Inventory ORDER BY Make Asc", $Link);
		  while ($Row = mysql_fetch_array($Result)) {
		       if ($Row[Model] == $_GET[ViewModel]) {
		            echo "<tr><td>";
			             echo $Row[Make];
		            echo "</td><td>";
					     $Result2 = mysql_query("SELECT Model From dropdown_Models WHERE ID = $Row[Model]", $Link);
		       		     if ($Row2 = mysql_fetch_array($Result2)) {echo $Row2[Model];} 
		            echo "</td><td>";
		                 echo $Row[SNum];
		            echo "</td><td>";
             		     $Result2 = mysql_query("SELECT Name From dropdown_Allocate WHERE ID = $Row[Allocate]", $Link);
		       		     if ($Row2 = mysql_fetch_array($Result2)) {echo $Row2[Name];} 		 
		            echo "</td></tr>";
			   }
		  }
	      echo "</table></center>";
     }
?>