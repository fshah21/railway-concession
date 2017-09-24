<?php
    session_start();
    $database="login";
    $conn = mysqli_connect("localhost" , "root","" , $database);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_error());
	}
    $num = $_SESSION['ID1'];
    
	$sql = "SELECT * FROM form where sap_id=$num";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC  ))
	{     
		$name=$row['name'];
		//echo $name,"<br>";
		$sap_id = $num;
        $year = $row['year'];
		//echo $sap_id,"<br>";
		//echo $year,"<br>";
		$department = $row['department'];
		$date = $row['date'];
		$durations = $row['period'];
		//echo $department,"<br>";
    }
	$CURRdate = date("Y/m/d");
	$diff = abs(strtotime($date) - strtotime($CURRdate));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)) +1;
	
	if(($durations == 'quaterly' && $days<=83)||($durations == 'monthly' && $days<=23))
	{
		header('Location: index1.html');
	}
?>
<html>
    <head>
        <title>FORM PAGE</title>
        <link rel = "stylesheet" type="text/css" href="styles.css"/>
    </head>
    <body>
        <h1>RAILWAY CONCESSION FORM</h1>
        <h2>Please Enter Your Details</h2>
        <form action = "receipt.php" method="post">
            Name:
				<input type = "text" name = "name" value = "<?php echo $name; ?>" disabled><br>
				</input>
            Sap_id:
				<input type = "text" name = "sap_id" value = "<?php echo $num; ?>" disabled ><br>
				</input>
            Department:
				<input type = "text" name = "department" value = "<?php echo $department; ?>" disabled ><br>
				</input>
            Year:
				<input type = "text" name = "year" value = "SE" disabled ><br>
				</input>
            Address:<br>
				<textarea rows="4" cols="50" name = "address">
				</textarea>
				<br>
            From:
				<input type = "text" name = "from_station" ><br>
				</input>
            To:
				<input type = "text" name = "to" value = "Vile Parle" disabled><br>
				</input>
            Class:<br>
				<input type="radio" name="class" value="1st class"> 1st Class<br>
				<input type="radio" name="class" value="2nd class"> 2nd class<br>
            Period:
				<br>
				<input type="radio" name="period" value="quaterly"> Quaterly<br>
				<input type="radio" name="period" value="2nd class"> Monthly<br>
            Date Of Application:
				<input type = "text" name = "date" value = "<?php echo $date; ?>"><br>
				</input>
            <input type = "submit">	</input>
        </form>
    </body>
</html>