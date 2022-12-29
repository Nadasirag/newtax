<?php
require "conn.php";
if(!empty($_GIT['user_id'])){
    $user_id="$_GIT[user_id]"
}
if (isset ($_POST ['add']))
{
    $username = $_POST ["username"];
    $password = $_POST ["password"];
    $phone = $_POST ["phone"];
    $address = $_POST ["address"];
   $q="insert into users(user_name,user_password,phone,address) values(?,?,?,?)";
        $r=$conn->prepare($q);
        $r->bind_param("ssis",$username,$password,$phone, $address);
       $e= $r->execute();
       if($e){
          $msg = "<has not been saved>";

       }else{
       $msg = "<has not been saved>";

       }

        $rr=$r->get_result();
        $row=$rr->fetch_assoc();
       
        if($row['num_rows'] > 0){
            echo"<script>location.href='home.php';</script>";
        }
        else {
           echo" username and password are  not incorrect"; 
      }  
      ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
     home page
        </title>
        <meta charset="UTF-8">
        <meta name="description" content="home page">
        <meta name="keywords" content="my first name">
       <link href="./css/style.css" rel="stylesheet">

        </head>
  <body>
   <div class="header">
     MY Home page
   </div>
    <div class="page">
        <form method="post" action ="home.php">
        <?php
        echo $smg;
        ?>
            <table border="0" width="50%">
                <tr>
                    <td>username:</td>
                <td><input type="text" name="user_name" required></td>
                </tr>
                <tr>
                <td>password:</td>
                <td><input type="password" name="user_password" required></td>
                </tr>
                <tr>
                    <td>phone:</td>
                    <td><input type="number" name="phone" required></td>
                </tr>
                <tr>
                    <td>address:</td>
                    <td><input type="text" textarea cols="10" rows="5" name="address"></td>
                </tr>
                <tr>
<td>
                <td colspan="2"> <input type="submit" name="add"  value="add"> </td>
                </tr>

                </table>
        <div class="left">
        <ul>
            <li>Home</li> 
            <li>user</li> 
            
        </ul>
    </div>


    <div class="right">
<table width="50%"; class="table";>
<tr>
<td>user name</td>
<td>passworad</td>
<td>phone</td>
<td>address</td>
<td>edit</td>
<td>delete</td>
<td></td>
</tr>
<?php
$sgl="select * from users";
$result=$conn->prepare($sql);
$result->execute();
$Getresult=$Getresult->get_result();
$i=0;
while ($row=$Getresult->fetch_assoc(){
    ?>
<tr>
<td><?php  echo ++$i;?> </td>
<td><?php  echo  ;?></td>
<td><?php  echo  ;?></td>
<td><?php  echo  ;?></td>
<td><?php  echo  ;?>e</td>
<td><?php  echo  ;?></td>
</tr>

</table>
    </div>
</div>

</body>
      </body>
</html>