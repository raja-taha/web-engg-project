<?php
session_start();

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

    // Perform more robust server-side validation
    if (empty($username) || empty($password)) {
        $response["success"] = false;
        $response["message"] = "Please enter both username and password.";
    } else {
        // Perform your authentication logic
        if ($username === "taha" && $password === "taha") {
            $_SESSION["userType"] = "Admin";
            $response["success"] = true;

            // Redirect to index.php on successful login
            header("Location: index.php");
            exit(); // Ensure that no other code is executed after the header redirect
        } else {
            $response["success"] = false;
            $response["message"] = "Incorrect username or password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
    <!-- Login Form -->
    <div id="login-form">
        <h1>Login as Admin</h1>
        <?php if (isset($_SESSION["userType"]) && $_SESSION["userType"] === "Admin") : ?>
            <?php
            // Perform automatic logout for admin user
            $_SESSION["userType"] = "User";
            header("Location: index.php");
            exit();
            ?>
        <?php elseif (isset($response["message"])) : ?>
            <p><?php echo $response["message"]; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <div>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" placeholder="Username" required />
            </div>
            <div>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password" required />
            </div>

            <div id="buttons">
                <button type="submit" id="submit">Submit</button>

                <button id="cancel" onclick="window.location.href='./index.php'">Cancel</button>
            </div>

        </form>
    </div>
</body>

</html>