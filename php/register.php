<?php


$Uname=$_POST['Uname'];
$Email=$_POST['Email'];
$passward1=$_POST['passward1'];
$passward2=$_POST['passward2'];

if(!empty($Uname)||!empty($Email)||!empty($passward1)||!empty($passward2)){
    $host="localhost";
    $dbusername="root";
    $dbpassward="";
    $dbname="siteuser";



    $con=new mysqli($host,$dbusername,$dbpassward,$dbname);
    if(mysqli_connect_errno()){
        die('Connect Error ('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT="SELECT Email From usertable Where Email=? Limit 1 ";
        $INSERT="INSERT Into usertable (Uname,Email,passward1,passward2) values(?,?,?,?)";

        //Prepare statement
     $stmt = $con->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $con->prepare($INSERT);
      $stmt->bind_param("ssss", $Uname,$Email,$passward1,$passward2);
      $stmt->execute();
      echo '<script>alert("hi");</script>';
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $con->close();
    }
}else { 
 echo "All field are required";
 die();
}
    




?>