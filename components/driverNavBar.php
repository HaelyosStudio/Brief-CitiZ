<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="container">
                    <a class="navbar-brand" href="./index.php">
                        <img src="./../assets/citiz-high-resolution-logo-transparent.png" alt="Citiz logo" width="120" height="26">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link button active" href=<?php echo URL_DRIVER . "/logout"?>>Disconnect</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href=<?php echo URL_DRIVER ?>>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href=<?php echo URL_DRIVER_PROFILE ?>>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Reservations</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>