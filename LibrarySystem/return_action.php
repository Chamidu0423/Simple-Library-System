<?php
include 'db_connect.php';

$member_id = $_POST['member_id'];
$book_id = $_POST['book_id'];
$return_date = $_POST['return_date'];


$check_loan = "SELECT * FROM loans WHERE BookID='$book_id' AND MemberID='$member_id' AND ReturnDate IS NULL";
$result = $conn->query($check_loan);

if ($result->num_rows > 0) {
  
    $sql_return = "UPDATE loans SET ReturnDate='$return_date' WHERE BookID='$book_id' AND MemberID='$member_id' AND ReturnDate IS NULL";
    
    if ($conn->query($sql_return) === TRUE) {
        
        $update_availability = "UPDATE books SET AvailabilityStatus='available' WHERE BookID='$book_id'";
        $conn->query($update_availability);

        
        $update_history = "UPDATE history SET ReturnedDate='$return_date' WHERE BookID='$book_id' AND MemberID='$member_id' AND ReturnedDate IS NULL";
        $conn->query($update_history);

        echo "<script>alert('Book returned successfully'); window.location.href='return_book.php';</script>";
    } else {
        echo "<script>alert('Error returning book: " . $conn->error . "'); window.location.href='return_book.php';</script>";
    }
} else {
   
    echo "<script>alert('No active loan found for this book and member'); window.location.href='return_book.php';</script>";
}

$conn->close();
?>
