<?php
include("conn.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$role = $_POST['role'];

$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];


if($password == $cpassword){
   move_uploaded_file($tmp_name, "../upload/". $image);
   $insert = mysqli_query($conn , "INSERT INTO user
    (name,mobile,address,password,photo,role,status,votes)
    VALUES ('$name','$mobile','$address','$password','$image','$role', 0 , 0 )");
    if($insert){
          echo '
   <script>
    alert("registration successfulully");
    window.location = "../";
   </script>
   ';
}
else{
      echo '
   <script>
    alert("try again");
    window.location = "../routes/register.html";
   </script>
   ';
}
}
  

else{
   echo '
   <script>
    alert("password and cpassword does not matched");
    window.location = "../routes/register.html";
   </script>
   ';
}


?>