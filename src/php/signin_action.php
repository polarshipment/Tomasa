<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = []; 

    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);

    if($email == '' || $password == ''){
        $isValid = false;
        $retVal = "Please fill all fields.";
    }

    if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $retVal = "Invalid email.";
    }

    if($isValid){
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $obj = mysqli_fetch_object($result); 
        $stmt->close();
        if($result->num_rows > 0){
            $isPassword = password_verify ($password , $obj->password);
            if($isPassword == true){
                $role = $obj->role;
                $status = 200;
                $retVal = "Success.";
                $data = $obj;
                $_SESSION['user_email'] = $obj->email;
                $_SESSION['user_id'] = $obj->id;
                $_SESSION['user_fname'] = $obj->fname;
                $_SESSION['user_lname'] = $obj->lname;
                $_SESSION['user_role'] = $obj->role;
                $_SESSION['user_name'] = "$obj->fname $obj->lname";
            }else{
                $retVal = "You may have entered a wrong email or password.";
            }
        }else{
            $retVal = "Account does not exist.";
        }
    }

    $myObj = array(
        'status' => $status,
        'data' => $data,
        'message' => $retVal,
        'role' => $role
    );
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;
?>