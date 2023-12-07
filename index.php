<?php
session_start();

// Check if the user has a visit cookie
$visitCookie = 'user_visited';
if (!isset($_COOKIE[$visitCookie])) {
    // Set the visit cookie
    setcookie($visitCookie, 'visited', time() + 86400, "/"); // Cookie valid for 1 day (86400 seconds)

    // Read the current count from the counter file
    $counterFile = './assets/counter.txt';
    $count = (file_exists($counterFile)) ? (int)file_get_contents($counterFile) : 0;

    // Increment the count for each new visit
    $count++;

    // Update the counter file with the new count
    file_put_contents($counterFile, $count);
} else {
    // If the user has visited before, load the count from the file
    $counterFile = './assets/counter.txt';
    $count = (file_exists($counterFile)) ? (int)file_get_contents($counterFile) : 0;
}

// Get the user type from the session
$userType = isset($_SESSION["userType"]) ? $_SESSION["userType"] : "User";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>My Webpage</title>
</head>

<body>
    <div id="content">
        <div id="nav">
            <img src="./assets/Logo.jpg" alt="logo" id="logo" />
            <div id="menu">
                <h1>Code Breakers</h1>
                <ul>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/about.html">About</a></li>
                    <li id="add-projects"><a href="/add-project.php">Add Project</a></li>
                    <li id="add-conferences"><a href="/add-conference.php">Add Conference</a></li>
                </ul>
            </div>
            <div id="user">
                <p>Logged in as:</p>
                <p id="userType"><?php echo $userType; ?></p>
                <a href="/login.php">Switch User</a>
            </div>
            <p id="visitors">No. of users visited: <b><?php echo $count; ?></b></p>
        </div>

        <div id="main">
            <div id="info">
                <div>
                    <h1>Skills</h1>
                    <ul>
                        <li>C++</li>
                        <li>Java</li>
                        <li>Python</li>
                        <li>HTML/CSS</li>
                        <li>JavaScript</li>
                    </ul>
                </div>
                <div>
                    <h1>Experience</h1>
                    <ul>
                        <li>C++</li>
                        <li>Java</li>
                        <li>Python</li>
                        <li>HTML/CSS</li>
                        <li>JavaScript</li>
                    </ul>
                </div>
            </div>
            <div id="work">
                <div>
                    <h1>Projects</h1>
                    <div>
                        <?php include('projects.php'); ?>
                    </div>
                </div>
                <div>
                    <h1>Conferences</h1>
                    <div>
                        <?php include('conferences.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <h1 id="founders">Founders</h1>
        <div>
            <div>
                <img src="./assets/talha.jpg" alt="Talha" />
                <h1>Muhammad Talha</h1>
                <div>
                    <a href="facebook.com"><img src="./assets/facebook.svg" alt="fb" class="icons"></a>
                    <a href="instagram.com"><img src="./assets/instagram.svg" alt="fb" class="icons"></a>
                    <a href="twitter.com"><img src="./assets/twitter.svg" alt="fb" class="icons"></a>
                    <a href="linkedin.com"><img src="./assets/linkedin.svg" alt="fb" class="icons"></a>
                </div>
            </div>
            <div>
                <img src="./assets/taha.jpg" alt="Taha" />
                <h1>Muhammad Taha</h1>
                <div>
                    <a href="facebook.com"><img src="./assets/facebook.svg" alt="fb" class="icons"></a>
                    <a href="instagram.com"><img src="./assets/instagram.svg" alt="fb" class="icons"></a>
                    <a href="twitter.com"><img src="./assets/twitter.svg" alt="fb" class="icons"></a>
                    <a href="linkedin.com"><img src="./assets/linkedin.svg" alt="fb" class="icons"></a>
                </div>
            </div>
            <div>
                <img src="./assets/saif.jpg" alt="Saif" />
                <h1>Saif Ullah</h1>
                <div>
                    <a href="facebook.com"><img src="./assets/facebook.svg" alt="fb" class="icons"></a>
                    <a href="instagram.com"><img src="./assets/instagram.svg" alt="fb" class="icons"></a>
                    <a href="twitter.com"><img src="./assets/twitter.svg" alt="fb" class="icons"></a>
                    <a href="linkedin.com"><img src="./assets/linkedin.svg" alt="fb" class="icons"></a>
                </div>
            </div>
        </div>
        <p>The Code Breakers. © All Rights Reserved!</p>
    </footer>
    <script src="./scripts/script.js"></script>
</body>

</html>