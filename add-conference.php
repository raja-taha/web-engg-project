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
    $title = substr($_POST["title"], 0, 255);
    $work = substr($_POST["work"], 0, 500);
    $date = $_POST["date"];

    $sql = "INSERT INTO conferences (title, work, date) VALUES ('$title', '$work', '$date')";

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
    <title>Add New Conference</title>
    <link rel="stylesheet" href="./styles/add-conference.css">
</head>

<body>

    <h1>Add New Conference</h1>

    <form action="" method="post">
        <label for="title">Conference Title: </label>
        <input type="text" name="title" id="title" maxlength="255" onkeyup="textCounter(this,'counter',255)" required>

        <label for="work">Work Produced: </label>
        <textarea name="work" id="work" cols="30" rows="10" maxlength="500" required onkeyup="textCounter(this,'counter',500)"></textarea>

        <label for="date">Conference Date: </label>
        <input type="date" name="date" id="date" required>

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