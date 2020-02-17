<?php
          echo "<center><br /><h3>Rentals not in Use</h3><table border=1 width='75%>'";
		  echo "<tr><td>Make</td><td>Model</td><td>Serial Number</td><td>Allocation</td></tr>";
	      $Result = mysql_query("SELECT * FROM Inventory ORDER BY SNum Asc", $Link);
		  while ($Row = mysql_fetch_array($Result)) {
		       if ($Row[Allocate] == "2") {
		            echo "<tr><td>";
			             echo $Row[Make];
		            echo "</td><td>";
		                 echo $Row[Model];
		            echo "</td><td>";
		                 echo $Row[SNum];
		            echo "</td><td>";
		                 echo "Rental";
		            echo "</td></tr>";
			   }
		  }
	      echo "</table></center>"; ?>