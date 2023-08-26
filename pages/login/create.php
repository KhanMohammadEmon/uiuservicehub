<?php
    include "../sqlCommands/connectDb.php";

    $email_err = 0;
    $pass_err = 0;
    $success = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST["account-type"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $con_pass = $_POST["con-pass"];
        $gender = $_POST["gender"];


        $check_query = "select email from {$type} where email='{$email}'";
        $row = mysqli_fetch_assoc(mysqli_query($sql, $check_query));

        if($row == null){
            if($password == $con_pass){
                $insert_query = "insert into {$type}(first_name, last_name, email, phone_number, passwords,gender) values ('{$first_name}',  '{$last_name}', '{$email}', '{$phone}', '{$password}','{$gender}');";
                 $r= mysqli_query($sql, $insert_query);
                if($type =='forumRep')
                {  
                    
                    $active = 0;
                    

                     $name = $first_name." ".$last_name;
                     $r1 = "INSERT INTO `room1`( `forum_name`, `active`) VALUES ('{$name}','$active') ";
                     $resultY= mysqli_query($sql, $r1);
                }
                $success = 1;
            }
            else{
                $pass_err = 1;
            }
        }
        else{
            $email_err = 1;
        }
        
    }
?>