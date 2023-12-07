<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_projects";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM conferences";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="conferences">';
        echo "<b>Title: </b>" . $row["title"] . "<br>";
        echo "<b>Work Produced: </b>" . $row["work"] . "<br>";
        echo "<b>Date: </b>" . $row["date"] . "<br>";
        echo '</div>';
    }
} else {
    echo "<p style='margin: 1rem; color: white;'>0 results</p>";
}

$conn->close();
