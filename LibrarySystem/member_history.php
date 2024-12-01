<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrowing History</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/book_management.css">
    <style>
        * {
            margin: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <h2>Borrowing History</h2>
    <form action="member_history.php" method="GET">
        <label>Search by MemberID:</label>
        <input type="text" name="member_id" required>
        <button type="submit">Search</button>
    </form>
    <?php
    include 'db_connect.php';
    
    if (isset($_GET['member_id'])) {
        $member_id = $_GET['member_id'];
        
        $sql = "
            SELECT 
                books.Title AS BookName, 
                loans.LoanDate, 
                loans.DueDate, 
                loans.ReturnDate
            FROM 
                loans
            JOIN 
                books ON loans.BookID = books.BookID
            WHERE 
                loans.MemberID='$member_id'
        ";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr><th>Book Name</th><th>Borrowed Date</th><th>Due Date</th><th>Returned Date</th></tr>";
            while($row = $result->fetch_assoc()) {
                $return_date = $row['ReturnDate'] ? $row['ReturnDate'] : "Not Returned";
                echo "<tr>
                        <td>{$row['BookName']}</td>
                        <td>{$row['LoanDate']}</td>
                        <td>{$row['DueDate']}</td>
                        <td>$return_date</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No history found for MemberID: $member_id</p>";
        }
    }
    $conn->close();
    ?>
</body>
</html>
