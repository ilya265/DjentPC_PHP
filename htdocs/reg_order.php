<?php

    include('../settings.php');

    $email = $_POST['email'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $problem = $_POST['problem'];

    header('Content-type: application/json');

    if (boolval($email & $name & $tel & $problem)){  
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo json_encode(array('status'=>'error'));
            die;
        }

        if (!ctype_digit($tel) or strlen($tel) != 11){
            echo json_encode(array('status'=>'error'));
            die;
        }

        $sql_request =
        "INSERT INTO orders
        (email, name,tel, problem)
        VALUES
        ('$email', '$name','$tel','$problem')";

        try{
            $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
            $result = mysqli_query($connection, $sql_request);
            echo json_encode(array('status' => 'success'));
        }catch (Throwable $e){
            echo json_encode(array('status'=>'error'));
        }

    }
    else{
        echo json_encode(array('status'=>'error'));
        die;
    }

?>