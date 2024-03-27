<section class="signInSection">
        <form action="<?php echo URL_TREATMENT_SIGNIN ?>" method="POST">
            <h1>Driver SignIn</h1>

            <div class="formInputs">
                <label for="emailAddress">Email Address</label><br>
                <input type="email" id="emailAddress" name="emailAddress" minlength="3" maxlength="80" required>
            </div>

            <div class="formInputs">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" minlength="7" required>
            </div>

            <input class="signInButton" type="submit" value="SignIn">
        </form>
    </section>