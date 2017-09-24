<?php
// Start the session
session_start();
?>
<html>
<body>
    <?php
    $i=0;
    $user='root';
    $pass='';
    $db='login';
    $db=new mysqli('localhost',$user,$pass,$db) or die("Unable to connect");
    $num = $_POST['login'];
    $_SESSION['ID1']=$num;
    $sql = "SELECT * FROM student";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         if($_POST["login"]==$row["sap_id"])
         {      
             if($_POST["password"]==$row["sap_id"])
             {
             header("Location: http://localhost/railway/originalform.php");
             break;
             }
         }
         $i++;
     }
        if($i>=3)
        {
            header("Location: http://localhost/railway/login.html");
            echo "Invalid Login Id or Password";
        }
} else {
     echo "0 results";
}
    
    ?>
    
</body>
</html>
