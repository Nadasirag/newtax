<?php
require "conn.php";
if (isset ($_POST ['login']))
{
    $username = $_POST ["username"];
    $password = $_POST ["password"];
   $q="select count(1) as num_rows from users where user_name= ? and user_password=?";
        $r=$conn->prepare($q);
        $r->bind_param("ss",$username,$password);
        $r->execute();
        $rr=$r->get_result();
        $row=$rr->fetch_assoc();
       
        if($row['num_rows'] > 0){
            echo"<script>location.href='home.php';</script>";
        }
        else {
           echo" username and password are  not incorrect"; 
      }
            
        } 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
      my first page
        </title>
        <meta charset="UTF-8">
        <meta name="description" content=" my first bag">
        <meta name="keywords" content="my first name">
       <link href="../css/style.css" rel="stylesheet">
<!--
        <style>
    
            
                
           body{
                width: 100%;
                background-color: #fff;
                font-size: 30;
            }
            h1{
                color:#0044cc ;
            }
            img{
                padding: 10px 10px  10px  10px;
            }
            .login{
                border: 5px dashed #0044cc;
               width: 600px;
               text-align:center;
            }
            .center{
                text-align:center;
            }
            .label{
                font-size: 30px;
                color: crimson;
            }
                input[type=text],input[type=password]{
                    width: 50%;
                    height: 50px;
                   
                }
                
                input[type=submit]{
                    width: 20%;
                    height: 50px;
                    background-color: rgb(240, 34, 34);
               

                
            
        </style>
    -->
        </head>
  <body>
    <center>    <h1 class="label"> login screen</h1>
   
    <img src="images.jpg" width ="110" height="110">
    <form  method ="post" action="index.php">
    <table class="login">
        <tr>
            <td class="label">username </td>
            <td><input type="text" name="username" size="50" placeholder="username"> </td>
        </tr>
        
        <td class="label">password</td>
        <td><input type="password" name="password" size="50" placeholder="password"></td>
    </tr>
   
 <tr>
        <td>
        </td>
        <td class="center"colspan="2"> <input type="submit" name="login" size="20" value="login"> </td>
    </tr>
        </table>
        <tr>
            <td> <input type="date"></td>
            <td> <input type ="time"></td>
        </tr>
    
    </table>
    </form>


</center>
      </body>
</html>