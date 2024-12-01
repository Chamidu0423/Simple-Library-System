<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Management</title>
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
    <h2 class="topic">Book Management</h2>
    <form action="book_action.php" method="POST">
        <input type="hidden" name="action" value="add">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Author:</label>
        <input type="text" name="author" required>
        <label>ISBN:</label>
        <input type="text" name="isbn" required>
        <button type="submit">➕ Add Book</button>
    </form>
</body>
</html>
