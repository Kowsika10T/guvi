<?php
$conn = new mysqli('localhost:3308','root','','login-reg');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
       
$sql = "SELECT * FROM users WHERE email=? AND password=?";
$user = $conn->execute_query($sql, [$email,$password])->fetch_assoc();
    
    if ($user) {
           
            $userDetails = new StdClass();
            $userDetails->id = $user['id'];
            echo json_encode($userDetails);
    } else {
        http_response_code(404);
        echo "Login failed. Invalid username or password.";
    }
}


$conn->close();
?>
