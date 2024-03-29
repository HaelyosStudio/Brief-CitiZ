<?php
if (!empty($_SESSION['reservations'])) {
    echo '<section class="reservations">';
    foreach ($_SESSION['reservations'] as $reservation) {
        $imageSource = strtolower($reservation['brand'] . '-' . $reservation['model'] . '.png');

        echo '<div class="reservationCard">';
        echo '<div class="reservationDates">';
        echo '<h3>Reservation Details</h3>';
        echo '<p><strong>Start Date:</strong> ' . $reservation['start_date'] . '</p>';
        echo '<p><strong>End Date:</strong> ' . $reservation['end_date'] . '</p>';
        echo '</div>';
        echo '<div class="carInfo">';
        echo '<h4>Car infos</h4>';
        echo '<div class="carImg"><img src="./../../assets/carpictures/' . $imageSource . '" alt="'. $reservation['brand'] . " " . $reservation['model'] . '"></div>';
        echo '<p><strong>Brand:</strong> ' . $reservation['brand'] . '</p>';
        echo '<p><strong>Model:</strong> ' . $reservation['model'] . '</p>';
        echo '<p><strong>Doors:</strong> ' . $reservation['car_doors'] . '</p>';
        echo '<p><strong>Boot:</strong> ' . $reservation['car_boot'] . '</p>';
        echo '<p><strong>Seats:</strong> ' . $reservation['seats'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</section>';
} else {
    echo '<p>No reservations found.</p>';
}

?>
