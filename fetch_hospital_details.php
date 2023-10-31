<?php
require('Includes/config.php');

if (isset($_GET['id'])) {
    $hospital_id = $_GET['id'];
    $sql = "SELECT * FROM `doctors` WHERE `id` = '$hospital_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <a href="doctors.php" style="text-decoration: none;">
            <br><br>
            <div class="card" style="width: 30rem; transition: transform 0.2s;"
                onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1.00)';">
                <img src="<?php echo 'doctors/doctorimg/' . $row['Dimage']; ?>" class="card-img-top mt-5"
                    style="height: 250px; width:450px; margin: 0 auto 0 auto; border:2px solid black;" alt="Doctor Image">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo 'Doctor Name:- <br>' . $row['Dusername']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo 'Specialization:- ' . '' . $row['specialization']; ?>
                    </p>
                    <p class="card-text">
                        <?php echo 'City:- <br>' . $row['Dcity']; ?>
                    </p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        </a>
        <?php
    } else {
        echo "Doctor details not found";
    }
}

$connection->close();
?>