<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overdue Tracking</title>
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
    <h2>Overdue Books</h2>
    <?php
    include 'db_connect.php';
    $sql = "
        SELECT 
            loans.BookID, 
            books.Title AS BookName, 
            loans.MemberID, 
            members.Name AS MemberName, 
            loans.LoanDate, 
            DATE_ADD(loans.LoanDate, INTERVAL 14 DAY) AS DueDate
        FROM 
            loans
        JOIN 
            books ON loans.BookID = books.BookID
        JOIN 
            members ON loans.MemberID = members.MemberID
        WHERE 
            loans.ReturnDate IS NULL 
            AND DATE_ADD(loans.LoanDate, INTERVAL 14 DAY) < CURDATE()
    ";
    
    
    $result = $conn->query($sql);
    if (!$result) {
        echo "<p>Error: " . $conn->error . "</p>"; 
        exit();
    }

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Member ID</th>
                    <th>Member Name</th>
                    <th>Loan Date</th>
                    <th>Due Date</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['BookID']}</td>
                    <td>{$row['BookName']}</td>
                    <td>{$row['MemberID']}</td>
                    <td>{$row['MemberName']}</td>
                    <td>{$row['LoanDate']}</td>
                    <td>{$row['DueDate']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No overdue books found.</p>";  
    }

    
    $conn->close();
    ?>

</body>
</html>
