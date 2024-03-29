<section class="reservationSection">
    <div class="reservationContainer">
        <h1>Reservation</h1>
        <?php if (isset($errors) && count($errors) > 0): ?>
            <div class="errors">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form id="reservationForm" class="profileForm" action="<?php echo URL_MAKE_RESERVATION; ?>" method="post">
            <div class="formGroup">
                <label for="startDate">Start Date and Time:</label>
                <input type="datetime-local" id="startDate" name="startDate">
            </div>
            <div class="formGroup">
                <label for="endDate">End Date and Time:</label>
                <input type="datetime-local" id="endDate" name="endDate">
            </div>
            <div class="formGroup">
                <label for="car">Car:</label>
                <select id="car" name="car">
                    <option value="">Pick a car</option>
                    <?php foreach ($_SESSION['cars'] as $car): ?>
                        <option value="<?php echo $car['car_id']; ?>"><?php echo htmlspecialchars($car['brand'] . ' ' . $car['model']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Make Reservation</button>
        </form>
    </div>
</section>
