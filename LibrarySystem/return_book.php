<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Return Book</title>
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
    <h2>Return Book</h2>
    <form action="return_action.php" method="POST">
        <label>Member ID:</label>
        <input type="number" name="member_id" required>
        
        <label>Book ID:</label>
        <input type="number" name="book_id" required>
        
        <label>Return Date:</label>
        <input type="date" name="return_date" required>
        
        <button type="submit">Return Book</button>
    </form>
</body>
</html>
