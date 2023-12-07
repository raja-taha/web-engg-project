<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_projects";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = substr($_POST["name"], 0, 255); // Truncate to 255 characters
    $desc = $_POST["desc"];
    $date = $_POST["date"];
    $submitTo = substr($_POST["submitTo"], 0, 100); // Truncate to 100 characters

    $sql = "INSERT INTO projects (name, description, date, submitTo) VALUES ('$name', '$desc', '$date', '$submitTo')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
    <link rel="stylesheet" href="./styles/add-project.css">
</head>

<body>

    <h1>Add New Project</h1>
    <form action="" method="post">
        <label for="name">Project Name: </label>
        <input type="text" name="name" id="name" maxlength="255" onkeyup="textCounter(this,'counter',255)" required>

        <label for="desc">Project Description: </label>
        <textarea name="desc" id="desc" cols="30" rows="10" required></textarea>

        <label for="date">Project Date: </label>
        <input type="date" name="date" id="date" required>

        <label for="submitTo">Submit To: </label>
        <input type="text" name="submitTo" id="submitTo" maxlength="100" onkeyup="textCounter(this,'counter',100)" required>

        <div id="buttons">
            <button type="submit" id="submit">Submit</button>
            <button id="cancel" onclick="window.location.href='./index.php'">Back</button>
        </div>

        <?php if (!empty($successMessage)) : ?>
            <p id="success-message"><?php echo $successMessage; ?></p>
            <script>
                setTimeout(function() {
                    document.getElementById("success-message").style.display = "none";
                }, 5000);
            </script>
        <?php endif; ?>
    </form>
    <script>
        function textCounter(field, field2, maxlimit) {
            var countfield = document.getElementById(field2);
            if (field.value.length > maxlimit) {
                field.value = field.value.substring(0, maxlimit);
                return false;
            } else {
                countfield.value = maxlimit - field.value.length;
            }
        }
    </script>
</body>

</html>