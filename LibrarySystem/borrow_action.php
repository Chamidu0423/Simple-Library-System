<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST['book_id'];
    $memberID = $_POST['member_id'];

    
    $loanDate = date('Y-m-d');

    $dueDate = date('Y-m-d', strtotime($loanDate . ' + 14 days'));

  
    $checkMemberSQL = "SELECT * FROM members WHERE MemberID = '$memberID'";
    $checkMemberResult = $conn->query($checkMemberSQL);

    if ($checkMemberResult->num_rows > 0) {
       
        $checkAvailabilitySQL = "SELECT * FROM books WHERE BookID = '$bookID' AND AvailabilityStatus = 'available'";
        $checkAvailabilityResult = $conn->query($checkAvailabilitySQL);

        if ($checkAvailabilityResult->num_rows > 0) {
            
            $borrowSQL = "INSERT INTO loans (BookID, MemberID, LoanDate, DueDate, ReturnDate) 
                          VALUES ('$bookID', '$memberID', '$loanDate', '$dueDate', NULL)";

            if ($conn->query($borrowSQL) === TRUE) {
                
                $updateBookAvailabilitySQL = "UPDATE books SET AvailabilityStatus = 'unavailable' WHERE BookID = '$bookID'";
                $conn->query($updateBookAvailabilitySQL);

                echo "<script>alert('Book borrowed successfully!'); window.location.href = 'main.php';</script>";
            } else {
                echo "<script>alert('Error borrowing book: " . $conn->error . "'); window.location.href = 'main.php';</script>";
            }
        } else {
            echo "<script>alert('Book is not available for borrowing.'); window.location.href = 'main.php';</script>";
        }
    } else {
        echo "<script>alert('Member ID not found. Please check the member ID.'); window.location.href = 'main.php';</script>";
    }
}
$conn->close();
?>
