<?php
    $servername = "localhost";
    $username = "chickenjr";
    $password = "voidnul0";
    $dbname = "final";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$name = htmlspecialchars($_POST['firstname']) . " " . htmlspecialchars($_POST['lastname']);
        $search = htmlspecialchars($_POST['searchterm']);
        $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);

        // Insert data into the database
        $sql = "INSERT INTO HackingUsers (searchterm, IPaddr)
        VALUES (?, ?);";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header("Location: https://www.google.com/search?q="  .  urlencode($search));
    exit();
    
    mysqli_close($conn);

?>