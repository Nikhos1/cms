<?php
session_start();

// Function to establish database connection
function connectToDatabase()
{
    $servername = "localhost"; // Change this to your servername
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "cms"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = connectToDatabase();

    // Get username and password from the form
    $username = $conn->real_escape_string($_POST['username']); // Sanitize input to prevent SQL injection
    $password = $conn->real_escape_string($_POST['password']);

    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result) {
        // Check if user exists
        if ($result->num_rows > 0) {
            // Fetch user data
            $row = $result->fetch_assoc();
            // Verify hashed password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables
                $_SESSION['username'] = $username;
                echo "Login successful!";
                // Redirect to a protected page or perform other actions
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }
    } else {
        // Handle query error
        echo "Query failed: " . $conn->error;
    }

    $conn->close();
}

// Check if the user clicked the logout link
if (isset($_GET['logout'])) {
    // If so, destroy the session and redirect to the login page
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card-container {
            margin: 20px auto;
            /* Center horizontally */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            /* Use flexbox */
            flex-direction: column;
            /* Arrange items in a column */
            justify-content: center;
            /* Center the content horizontally */
            align-items: center;
            /* Center the content vertically */
        }

        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            color: #fff;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }

        /* Style the logout button differently */
        .logout {
            background-color: #f44336;
        }

        .logout:hover {
            background-color: #d32f2f;
        }

        .row {
            display: flex;
            /* Use flexbox for the row */
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .column {
            flex: 1;
            /* Expand to fill available space */
            padding: 0 15px;
            /* Add some spacing between columns */
        }

        .card {
            margin-bottom: 20px;
            /* Add space between cards */
        }

        .main-container {
            margin: 0 auto;
            /* Center horizontally */
            max-width: 1200px;
            /* Set maximum width for better readability */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="login.php">Digital Enrollment</a>
        <a href="#classroom">Classroom</a>
        <a href="#inbox">Inbox</a>
        <a href="?logout" class="logout">Logout</a>
        <!-- Notice the addition of "?logout" in the logout link -->
    </div>

    <!-- Modal -->
    <div class="main d-flex justify-content-center align-items-center">
    <div class="card text-center">
        <div class="card-body">
            <h1 class="card-title">Update Logo</h1>
            <form action="config/addlogo.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="myfile" class="form-label">Select a file:</label>
                    <input type="file" class="form-control" id="myfile" name="myfile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>




    </div>
</body>

</html>