<?php
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("localhost","root", " ","tipsapp");
	
	 
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	 
	// Attempt select query execution
	$sql = "SELECT * FROM tipsreport";
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
	        echo "<table style='text-align:right'>";
	            echo "<tr>";
					echo "<th style='padding:20px; text-align:center'>Date</th>";
	                echo "<th style='padding:20px; text-align:center'>Cash</th>";
	                echo "<th style='padding:20px; text-align:center'>Credit</th>";
					
	                
	            echo "</tr>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<tr>";
					echo "<td style='padding:20px' >" . $row['date'] . "</td>";
	                echo "<td>" . $row['cash'] . "</td>";
	                echo "<td>" . $row['credit'] . "</td>";
	                
	            echo "</tr>";
	        }
	        echo "</table>";
	     
		 	// Close result set
			mysqli_free_result($result);
	    } else{
	        echo "No records matching your query were found.";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	$query = 'SELECT * FROM tipsreport';
	$query_run = mysqli_query ($link, $query);
	
	$cashTotal = 0;
	
	while ($num = mysqli_fetch_assoc($query_run)) {
		$cashTotal += $num['cash'];
	}
	
echo "<br><strong> TOTAL Cash Tips: </strong>".$cashTotal;
	
$queryCredit = 'SELECT * FROM tipsreport';
	$queryCredit_run = mysqli_query ($link, $queryCredit);
	
$creditTotal = 0;
	
	while ($num = mysqli_fetch_assoc($queryCredit_run)) {
		$creditTotal += $num['credit'];
	}
	
echo "<br><br><strong> TOTAL Credit Tips: </strong>" .$creditTotal;

$TotalTips = $cashTotal + $creditTotal;

echo "<br><br><strong> TOTAL TIPS: </strong>".$TotalTips;
	 	 
	 
	// Close connection
	mysqli_close($link);
	?>
