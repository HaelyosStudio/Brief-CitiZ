<section class="modifyProfileSection">
    <div class="profileContainer">
        <h1 id="h1Title">Profile</h1>
        <?php if (isset($errors) && count($errors) > 0): ?>
            <div class="errors">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form id="profileForm" class="profileForm" action="<?php echo URL_UPDATE_PROFILE; ?>" method="post">
            <div class="formGroup">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($_SESSION['driver']->getFirstName()); ?>">
            </div>
            <div class="formGroup">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($_SESSION['driver']->getLastName()); ?>">
            </div>
            <div class="formGroup">
                <label for="driversLicense">Driver's License:</label>
                <input type="text" id="driversLicense" name="driversLicense" value="<?php echo htmlspecialchars($_SESSION['driver']->getDriversLicense()); ?>">
            </div>
            <div class="formGroup">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($_SESSION['driver']->getAge()); ?>">
            </div>
            <div class="formGroup">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['driver']->getEmail()); ?>">
            </div>
            <button type="submit">Update Profile</button>
            <div class="changeButton" id="changePasswordButton">Change password</div>
        </form>
        <form id="passwordForm" class="passwordForm hidden" action="<?php echo URL_DRIVER_PROFILE_PASSWORD ?>" method="post">
            <div class="formGroup">
                <label for="currentPassword">Current Password:</label>
                <input type="password" id="currentPassword" name="currentPassword">
            </div>
            <div class="formGroup">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword">
            </div>
            <div class="formGroup">
                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
            </div>
            <button type="submit">Update Password</button>
            <div class="changeButton" id="changeInfosButton">Go back</div>
        </form>
        <div class="deleteConfirmBox hidden" id="deleteConfirmBox">
            <h2>Are you sure you want to delete your account?</h2>
            <div class="confirmButtonsBox">
                <a class="confirmButton" href=<?php echo URL_PROFILE_DELETE ?>>Confirm</a>
                <button class="cancelButton" id="cancelButton">Cancel</button>
            </div>
        </div>
        <button class="deleteButton" id="deleteButton">Delete Account</button>
    </div>
</section>
