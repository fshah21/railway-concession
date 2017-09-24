<?php
    session_start();
    
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "login";
	$source = $_POST['from_station'];
	$class = $_POST['class'];
	$durations = $_POST['period']; 
	$ADDRESS = $_POST['address'];
    $dateofapplication = $_POST['date'];
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$database);
$num = $_SESSION['ID1'];
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_error());
	} 
	//mysqli_select_db('print');
	$sql2=1;

	mysqli_query($conn," UPDATE form 
			SET from_station= '$source', class='$class',date=$dateofapplication,period='$durations',address='$ADDRESS'
			WHERE sap_id = $num");
   $sql = "SELECT sap_id,name,period FROM form where sap_id=$num";
   
   $retval = mysqli_query( $conn,$sql);
   
   while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	  echo "sap ID :{$row['sap_id']}  <br> ".
         "EMP NAME : {$row['name']} <br> ".
         "duration : {$row['period']} <br> ".
         "--------------------------------<br>";
		
  }
?>

<html moznomarginboxes mozdisallowselectionprint>

<body>
<input id="sub"type="button" onclick="myFunction()" value="print""></input>
<script>
var elem = document.getElementById("sub");
function myFunction() {
	elem.style.display = 'none';
    window.print();
}
</script>
</body>
</html>