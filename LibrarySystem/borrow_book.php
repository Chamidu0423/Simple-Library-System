<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrow Book</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/borrow_management.css">
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
    <h2>Borrow Book</h2>
    <form action="borrow_action.php" method="POST">
        <label>Member ID:</label>
        <input type="number" name="member_id" required>
        
        <label>Book ID:</label>
        <input type="number" name="book_id" required>
        
        <label>Borrow Date:</label>
        <input type="date" name="borrow_date" required>
        
        <button type="submit">Borrow Book</button>
    </form>
</body>
</html>
