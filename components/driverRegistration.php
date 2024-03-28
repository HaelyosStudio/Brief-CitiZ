<section class="registrationSection">
        <form action="<?php echo URL_TREATMENT_REGISTER ?>" method="POST">
            <h1>Driver registration</h1>

            <div class="formInputs">
                <label for="firstName">First Name</label><br>
                <input type="text" id="firstName" name="firstName" minlength="3" maxlength="50">
            </div>

            <div class="formInputs">
                <label for="lastName">Last Name</label><br>
                <input type="text" id="lastName" name="lastName" minlength="3" maxlength="50" required>
            </div>

            <div class="formInputs">
                <label for="age">Age</label><br>
                <input type="number" id="age" name="age" min="18" max="80" required>
            </div>

            <div class="formInputs">
                <label for="driversLicense">Drivers License</label><br>
                <input type="text" id="driversLicense" name="driversLicense" minlength="9" maxlength="9" required>
            </div>

            <div class="formInputs">
                <label for="emailAddress">Email Address</label><br>
                <input type="email" id="emailAddress" name="emailAddress" minlength="3" maxlength="80" required>
            </div>

            <div class="formInputs">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" minlength="7" required>
            </div>

            <div class="formInputs">
                <label for="confirmPassword">Confirm Password</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword" minlength="7" required>
            </div>

            <input class="registerButton" type="submit" value="Register">
        </form>
    </section>