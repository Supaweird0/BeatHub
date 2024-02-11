<?php
require_once("config.php");
session_start();

// Check if it's a POST request
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    echo "<script>console.log('" . json_encode($data) . "');</script>";

    // Clean up the data
    $first_name = mysqli_real_escape_string($connection, trim($data->first_name));
    $last_name = mysqli_real_escape_string($connection, trim($data->last_name));
    $email = mysqli_real_escape_string($connection, trim($data->email));
    $password = mysqli_real_escape_string($connection, trim($data->password));

    // Check for empty fields
    if (empty($first_name) || empty($last_name) ||
        empty($email) || empty($password)) {
        $response = ["response" => "empty_field"];
        http_response_code(400); // Bad Request
        echo json_encode($response);
        exit();
    }

    // Check password length
    if(strlen($password) < 8) {
        $response = ["response" => "short_password"];
        http_response_code(400);
        echo json_encode($response);
        exit();
    }

    // Check password expression
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $response = ["response" => "invalid_password"];
        http_response_code(400);
        echo json_encode($response);
        exit();
    }

    // Check email validity
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ["response" => "invalid_email"];
        http_response_code(400);
        echo json_encode($response);
        exit();
    }

    // Check if email already exists
    $sql = "SELECT email FROM User WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0) {
        $response = ["response" => "already_registered"];
        http_response_code(400);
        echo json_encode($response);
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database using prepared statements
    $sql2 = "INSERT INTO User (first_name, middle_initial, last_name, password, email, cellphone_number, is_manager) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql2);
    mysqli_stmt_bind_param($stmt, "ssssssi", $first_name, $middle_initial, $last_name, $hashed_password, $email, $cellphone, $is_manager);
    if(mysqli_stmt_execute($stmt)) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = mysqli_insert_id($connection);

        $response = ["response" => "successful"];
        echo json_encode($response);
    } else {
        $response = ["response" => "failed"];
        http_response_code(500); // Internal Server Error
        echo json_encode($response);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

/**
 * In summary, the choice between mysqli_real_escape_string() and stripslashes(htmlspecialchars(trim($decoded->first_name))) depends on the context and purpose of the sanitization
 * If you're dealing with data that will be inserted into SQL queries, use mysqli_real_escape_string() to prevent SQL injection attacks.
* If you're preparing user input for display on a web page or processing it for other non-SQL purposes, use stripslashes(htmlspecialchars(trim($decoded->first_name))) to ensure it's properly sanitized for HTML output and protect against XSS attacks.
 */