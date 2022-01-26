<?php
// include "/configuration/connection.php";
$email="";
$subject="";
$content="";
$email_err="";
$subject_err="";
$content_err="";
$notification="";
if(isset($_POST["send"])){
    $email=$_POST["email"];
    $subject=$_POST["subject"];
    $content=$_POST["content"];
    if(empty($email)){
        $email_err="<p class='w3-text-red'>E-mail is required</p>";
    }
    elseif(empty($subject)){
        $subject_err="<p class='w3-text-red'>Subject is required</p>";
    }
    elseif(empty($content)){
        $content_err="<p class='w3-text-red'>Content is required</p>";
    }
    else{
       $query="INSERT INTO `message`( `Email`, `Subject`, `content`,readState) VALUES('$email','$subject','$content','Unread')";
       try {
           $connection->exec($query);
           $notification="<script class='w3-text-green'>alert('Message sent successfully!!')</script>";
       } catch (PDOException $th) {
            $notification="".$th->getMessage();
       }

    }

}

?>