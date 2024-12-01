<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Management</title>
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
    <h2>Member Management</h2>
    <h3>Add Member</h3>
    <form action="member_action.php" method="POST">
        <input type="hidden" name="action" value="add">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Membership Date:</label>
        <input type="date" name="membership_date" required>
        <label>Contact Info:</label>
        <input type="text" name="contact_info" required>
        <button type="submit">➕ Add Member</button>
    </form>

    <hr style="border: none; height: 2px; background-color: #0072ff; margin: 30px 0; box-shadow: 0 4px 6px rgba(0, 114, 255, 0.3);">

   
    <h3>Update Member</h3>
    <form action="member_action.php" method="POST">
        <input type="hidden" name="action" value="update">
        <label>Member ID:</label>
        <input type="number" name="member_id" required>
        <label>New Name:</label>
        <input type="text" name="name">
        <label>New Contact Info:</label>
        <input type="text" name="contact_info">
        <button type="submit">⬆️ Update Member</button>
    </form>

    <hr style="border: none; height: 2px; background-color: #0072ff; margin: 30px 0; box-shadow: 0 4px 6px rgba(0, 114, 255, 0.3);">

  
    <h3>Delete Member</h3>
    <form action="member_action.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <label>Member ID:</label>
        <input type="number" name="member_id" required>
        <button type="submit">🗑️ Delete Member</button>
    </form>
</body>
</html>
