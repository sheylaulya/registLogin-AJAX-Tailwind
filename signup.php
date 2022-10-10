<?php

$response = array(
    'status' => 0,
    'message' => 'Form submission Failed'
);

$errorEmpty = false;
$errorEmail = false;

if(isset($_POST['firstName']) || (isset($_POST['lastName']) || (isset($_POST['email']) 
|| (isset($_POST['username']) || (isset($_POST['password'])){

    //get the submitted form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $response['message'] = "First name";
}else{
    $response['message'] = "Empty"
    $errorEmpty = true;
}

echo json_encode($response);
?>