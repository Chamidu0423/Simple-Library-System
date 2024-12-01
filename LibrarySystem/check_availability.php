<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Availability</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/check_availability.css">
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
    <h2>Book Availability</h2>
    <form action="check_availability.php" method="GET">
        <label>Search by Book ID or Title:</label>
        <input type="text" name="search" required>
        <button type="submit">Search</button>
    </form>

    <?php
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT books.BookID, books.Title, books.AvailabilityStatus, loans.MemberID, members.Name AS BorrowerName
            FROM books
            LEFT JOIN loans ON books.BookID = loans.BookID AND loans.ReturnDate IS NULL
            LEFT JOIN members ON loans.MemberID = members.MemberID
            WHERE books.BookID LIKE '%$search%' OR books.Title LIKE '%$search%'
            ORDER BY books.Title";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>Title</th><th>Availability Status</th><th>Borrower</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            if ($row["MemberID"] != NULL) {
                $statusClass = "unavailable";
                $borrowerInfo = $row["BorrowerName"] . " (ID: " . $row["MemberID"] . ")";
                $availabilityStatus = "Unavailable";
            } else {
                $statusClass = "available";
                $borrowerInfo = "Available On Library";
                $availabilityStatus = "Available";
            }

            echo "<tr><td>" . $row["Title"] . "</td><td class='$statusClass'>" . $availabilityStatus . "</td><td>" . $borrowerInfo . "</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No books found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
