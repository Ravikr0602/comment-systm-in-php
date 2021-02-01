<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment System in php</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!----------------------------------------------------------------------------------------------------------
Below the php code is send the comment in database and also check the email is already comment or not 
----------------------------------------------------------------------------------------------------------->

<?php
 
 // step 1: connect to database 

 require 'connection.php';
 
 // step 2: user send to post request and value is set

 if(isset($_POST['comment']))
 {

 // step 3: define or variable 

     $message  =  mysqli_real_escape_string($conn, $_POST['message']);
     $name =      mysqli_real_escape_string($conn, $_POST['name']);
     $email =     mysqli_real_escape_string($conn, $_POST['email']);
     $website =   mysqli_real_escape_string($conn, $_POST['website']);
 
// step 4: check user_email sent message or not

   $check = "SELECT * FROM `comment_table` WHERE `user_email` = '$email' ";
   $check_res = mysqli_query ($conn, $check);
   $num = mysqli_num_rows($check_res);

// step 5: if record is 0 then insert the data in database otherwise not inserted

   if($num == 0)

   {

// step 6: insert the data in the databse

    $sql = "INSERT INTO `comment_table` ( `user_comment`, `user_name`, `user_email`, `website`, `comment_time`) VALUES ( '$message', '$name', '$email', '$website', CURRENT_TIMESTAMP)";
     $comment_result = mysqli_query($conn, $sql);
     if($comment_result)
     {
         echo '<script>alert ("Your Message has been submited.");
                 window.location = "index.php";
         </script>';
     }
    
     }
 else
 {
     echo '<script>alert ("This email is already pass comment try another email."); </script>';
 }
 }
 
?>


<!---------------------------------------------------------------------------------------
below the html comment form box 
-----------------------------------------------------------------------------------------> 

<div class="comment_box">
    
    <img src="image/image1.jpg" class="com_img" alt="">
            
        <h1 id="head_commt">Comment System using PHP & MySQL </h1>
        <p id="note">One Email_id only one time pass comment.</p>

    <form action="" method="POST">
            
        <div class="rec1">
                
           <textarea name="message" id="record2" placeholder="Enter your comment here..." cols="30"rows="10"></textarea>
        </div>
            
        <div class="rec1">
                    
            <input type="text" id="record1" name="name" placeholder="Your Name" requried>
            <input type="email" id="record1" name="email" placeholder="Your Email_id" requried>
            <input type="text" id="record1" name="website" placeholder="Website">
        </div>
             
            <input type="submit" id="comm_btn" name="comment" value="Drop Comment">
    </form>

</div>

<!-----------------------------------------------------------------------------------------------------
below the display all comment passed by user:-
------------------------------------------------------------------------------------------------------>

<!------this below php code display the all comment ------> 

<?php 

// step 1: connect the database

require 'connection.php';

// step 2: select all record 

$display = "SELECT * FROM `comment_table`";
$result = mysqli_query($conn, $display);

// step 3: fetch all record 

while($record = mysqli_fetch_array($result))
{

?>

<!---------------------------------------------------------
this is display comment box 
-----------------------------------------------------------> 

<div class="user_comment">
           
    <img src="image/image2.webp" class="us_img" alt="" >
           
    <div class="who_comment">
        
        <h1><i class="fa fa-user"></i> <span><?php echo $record['user_name'] ; ?> </span><i class="fa fa-calendar"></i>
                <?php echo $record['comment_time'] ; ?></h1>
            
    </div>
            
        <h3 id=reply><?php echo $record['user_comment'] ; ?></h3>

</div>
 
<?php
}
?>       

</body>
</html>