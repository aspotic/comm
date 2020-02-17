<?php
          echo "<center><br /><h3>Rentals in Use</h3><table border=1 width='75%>'";
		  echo "<tr><td>Customer</td><td>Contact</td><td>Serial Number</td><td>Start Date</td><td>End Date</td></tr>";
	      $Result = mysql_query("SELECT * FROM Rental ORDER BY Cust Asc", $Link);
		  while ($Row = mysql_fetch_array($Result)) {
		       if ($Row[End] >= $Date) {
		            echo "<tr><td>";
			             echo $Row[Cust];
		            echo "</td><td>";
		                 echo $Row[Contact];
		            echo "</td><td>";
		                 echo $Row[SNum];
		            echo "</td><td>";
		                 echo $Row[Start];
		            echo "</td><td>";
		                 echo $Row[End];
		            echo "</td></tr>";
			   }
		  }
	      echo "</table></center>"; ?>