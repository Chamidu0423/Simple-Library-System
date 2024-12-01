<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Management System - Main</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        * {
            margin: 10px;
            padding: 5px;
        }
        body {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h1>Library Management System</h1>
    <div>
        <button onclick="location.href='book_management.php'">📖 Book Management</button>
        <button onclick="location.href='member_management.php'">👨‍💼 Member Management</button>
        <button onclick="location.href='borrow_book.php'">📔 Borrow Book</button>
        <button onclick="location.href='return_book.php'">📑 Return Book</button>
        <button onclick="location.href='check_availability.php'">📚 Check Book Availability</button>
        <button onclick="location.href='overdue_tracking.php'">🔍 Overdue Tracking</button>
        <button onclick="location.href='member_history.php'">🔖 Member Borrowing History</button>
    </div>
    <a href="login.php" style="position: fixed; bottom: 10px; right: 10px; font-size: 16px; text-decoration: none; color: #0072ff;">
    <img src="img/logout.gif" title="Log Out" alt="Log Out" style="width: 50px; height: 50px; border-radius: 50%;"/>
</a>

</body>
</html>
