<?php
include('includes/config.php'); // Include your database connection code here

if (isset($_POST["doctorId"])) {
    $doctorId = $_POST["doctorId"];

    // Query the database to get doctor details based on $doctorId
    $query = "SELECT `specialization`, `Days`, `Dtime` FROM `doctors` WHERE `id` = '$doctorId'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Prepare the doctor details to send as JSON
        $doctorDetails = array(
            "specialization" => $row['specialization'],
            "date" => $row['Days'],
            "time" => $row['Dtime']
        );

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($doctorDetails);
    } else {
        // If doctor not found, return an empty JSON object
        echo json_encode(array());
    }
}
?>