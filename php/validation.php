<?php
    $host="localhost";
    $dbusername="root";
    $dbpassward="";
    $dbname="siteuser";
$con=new mysqli($host,$dbusername,$dbpassward,$dbname);

$Uname=$_POST['Uname'];
$passward1=$_POST['passward1'];


$s = "select * from usertable where Uname = '$Uname' && passward1='$passward1' ";
$result=mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
    header('location:../html/home.html');


}
else{
    header('location:../html/login.html');

}

?>