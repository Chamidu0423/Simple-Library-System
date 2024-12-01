<?php
include 'db_connect.php';

$action = $_POST['action'];

if ($action == 'add') {
   
    $name = $_POST['name'];
    $membership_date = $_POST['membership_date'];
    $contact_info = $_POST['contact_info'];
    
    $sql = "INSERT INTO members (Name, MembershipDate, ContactInfo) VALUES ('$name', '$membership_date', '$contact_info')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Member added successfully'); window.location.href='member_management.php';</script>";
    } else {
        echo "<script>alert('Error adding member: " . $conn->error . "'); window.location.href='member_management.php';</script>";
    }
} elseif ($action == 'update') {
   
    $member_id = $_POST['member_id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    
    $sql = "UPDATE members SET Name='$name', ContactInfo='$contact_info' WHERE MemberID='$member_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Member updated successfully'); window.location.href='member_management.php';</script>";
    } else {
        echo "<script>alert('Error updating member: " . $conn->error . "'); window.location.href='member_management.php';</script>";
    }
} elseif ($action == 'delete') {
   
    $member_id = $_POST['member_id'];
    
    $sql = "DELETE FROM members WHERE MemberID='$member_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Member deleted successfully'); window.location.href='member_management.php';</script>";
    } else {
        echo "<script>alert('Error deleting member: " . $conn->error . "'); window.location.href='member_management.php';</script>";
    }
}

$conn->close();
?>
