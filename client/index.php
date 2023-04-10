<!DOCTYPE html>
<html>
<head>
    <title>Fast Manager</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <?php include './navbar.php'; ?>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody id="users-table">
            <!-- Users will be inserted here -->
        </tbody>
    </table>
</body>
</html>