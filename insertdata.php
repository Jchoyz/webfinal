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
        $search = htmlspecialchars($_POST['searchterm']);
        $ip = htmlspecialchars($_SERVER['IPaddr']);

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

    mysqli_close($conn);

    header("Location: https://www.google.com/search?q= $search");
    exit();
?>
<!-- .  urlencode($search)-->