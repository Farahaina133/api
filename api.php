<?php
header("Access-Control-Allow-Origin: *"); // Allow FlutterFlow to access API
header("Content-Type: application/json");

$host = "localhost";  // Use "127.0.0.1" if localhost fails
$user = "root";
$pass = "";
$dbname = "user";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Fetch users from database
$sql = "SELECT * FROM user_detail";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["message" => "No users found"]);
}

$conn->close();
?>
