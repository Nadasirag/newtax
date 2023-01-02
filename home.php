<?php
require "conn.php";


    if(!empty($_GET['user_id']))
    {
        $user_id = $_GET['user_id'];
        $sql = "select * from users where user_id = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("i",$user_id);
        $result->execute();
    
        $GetResult = $result->get_result();
    
        $UserRow = $GetResult->fetch_assoc();
    }
if (isset ($_POST['Add']))
{
    $username = $_POST ["user_name"];
    $password = $_POST ["user_password"];
    $phone = $_POST ["phone"];
    $address = $_POST ["address"];
   $q="insert into users(user_name,user_password,phone,address) values(?,?,?,?)";
        $r=$conn->prepare($q);
        $r->bind_param("ssis",$username,$password,$phone, $address);
       $e= $r->execute();
       if($e){
          $msg = "<font color='green'>has been saved</font>";

       }else{
       $msg = "<font color='red'>has not been saved</font>";
       }
       }
       if (isset($_POST['Edit'])){

       $user_id = $_POST['user_id'];
       $user_name = $_POST['user_name'];
       $password = $_POST['user_password'];
       $phone = $_POST['phone'];
       $address = $_POST['address'];
   
       $sql = "update users set user_name= ?, user_password=?, phone=?, address=? where user_id=?";
       $result = $conn->prepare($sql);
       $result->bind_param("ssisi", $user_name, $password, $phone, $address, $user_id);
       $e = $result->execute();
   
       if($e){
           $msg = "<font color='green'>Has been updated</font>";
       }else {
           $msg = "<font color='red'>Has not been updated</font>";
       }
    }
    if(!empty($_GET['duser_id'])){
        $user_id = $_GET['duser_id'];

        $sql = "delete from users where user_id=?";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $user_id);
        $e = $result->execute();
    
        if($e){
            $msg = "<font color='green'>Has been deleted</font>";
        }else {
            $msg = "<font color='red'>Has not been deleted</font>";
        }
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
    <a href="home.php">Home</a>
   <a href="users.php">Users</a>
     </div>
     <div class="page">
    <div class="left">
    <ul>
        <li>Home</li>
        <li>Users</li>
    </ul>
    </div>
    <div class="right">
        
       </div>
        <form method="post" action ="home.php">
        <?php
        echo $msg;
        ?>
            <table border="0" width="50%">
            <input type="hidden" name="user_id" value="<?php echo $UserRow['user_id']; ?>">
                <tr>
                    <td>username:</td>
                <td><input type="text" name="user_name" value="<?php echo $UserRow['user_name']; ?>"></td>
                </tr>
                <tr>
                <td>password:</td>
                <td><input type="password" name="user_password" value="<?php echo $UserRow['user_password']; ?>"></td>
                </tr>
                <tr>
                    <td>phone:</td>
                    <td><input type="number" name="phone"  value="<?php echo $UserRow['phone']; ?>"></td>
                </tr>
                <tr>
                    <td>address:</td>
                   <td><textarea cols="20" rows="7" name="address"><?php echo $UserRow['address']; ?></textarea></td>
                </tr>
                <tr>
<td>
                <td colspan="2"> <?php
                 if(!empty($_GET['user_id'])){
                    ?>
                 <input type="submit" class="btn btn2" name="Edit" value="Edit" >
            <?php
            } else {
            ?>
                <input type="submit" class="btn btn1" name="Add" value="Add" >
            <?php
            }
            ?>
                 </td>
                </tr>

                </table>
                </form>
        </div>
    <div class="right">
      <table class="table";>
     <tr>
     <td>#</td>
     <td>user_name</td>
    <td>passworad</td>
    <td>phone</td>
     <td>address</td>
    <td>Edit</td>
    <td>Delete</td>
     </tr>
<?php
    $sql="select * from users order by user_id";
     $result = $conn->prepare($sql);
     $result->execute();
     $Getresult = $result->get_result();
     $i=0;
while ($row=$Getresult->fetch_assoc()){
    ?>
<tr>
<td><?php  echo ++$i; ?></td>
<td><?php  echo  $row['user_name']; ?></td>
<td><?php  echo  $row['password']; ?></td>
<td><?php  echo $row['phone']; ?></td>
<td><?php  echo  $row['address']; ?></td>
<td><a class="btn btn2" href="home.php?user_id=<?php echo $row['user_id']; ?>">Edit</a></td>
<td><a class="btn btn3" href="home.php?duser_id=<?php echo $row['user_id']; ?>">Delete</a></td>
</tr>
<?php
}
?>

</table>
    </div>
</div>

</body>
</html>      