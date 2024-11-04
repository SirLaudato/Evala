<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<div class="wrapper">
    <?php
    // Database connection
    $servername = "localhost"; //database server
    $username = "root"; //database username
    $password = ""; //database password
    $database = "evala_db1"; //database name
    
    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users
            JOIN iab on users.user_id = iab.user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card" data-aos="flip-right" data-aos-duration="500">';
            // echo '<img src = "' . $row['EmployeePicture'] . '" alt = ""></img>';
            echo '<h4> Name: ' . $row['first_name'] . $row['last_name'] . '</h4>';
            echo '<p> Department: ' . $row['department'] . '</p>';


            // Add other fields as needed
            echo '</div>';
        }
    } else {
        echo "No Available Employee.";
    }

    $conn->close();
    ?>

</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>