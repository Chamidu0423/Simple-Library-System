<?php
include 'db_connect.php';

$action = $_POST['action'];

if ($action == 'add') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    
    $sql = "INSERT INTO books (Title, Author, ISBN, AvailabilityStatus) VALUES ('$title', '$author', '$isbn', 'available')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Book added successfully'); window.location.href='book_management.php';</script>";
    } else {
        echo "<script>alert('Error adding book: " . $conn->error . "'); window.location.href='book_management.php';</script>";
    }
}
$conn->close();
?>
