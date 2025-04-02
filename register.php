<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srs";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$middle_initial = $_POST['middle_initial'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];


$sql = "INSERT INTO basic_information (student_id, first_name, middle_initial, last_name, date_of_birth, gender, email_address, phone_number) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssss", $student_id, $first_name, $middle_initial, $last_name, $date_of_birth, $gender, $email_address, $phone_number);

if ($stmt->execute()) {
    echo "<script>alert('New record inserted successfully!'); window.location.href='student_form.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
