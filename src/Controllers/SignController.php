<?php

require_once __DIR__ . '/../Services/Response.php';

class SignController {
    public $driverRepository;
    use Response;

    public function index()
    {
        $title = "Citiz SignIn Page";

        $viewData = [
            'title' => $title
        ];

        $this->render('SignIn', $viewData);
    }

    public function pageNotFound()
    {
        $this->render('404');
    }

    public function signUp() {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['emailAddress'];
        $driversLicense = $_POST['driversLicense'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $this->driverRepository = new DriverRepository();

        if ($password !== $confirmPassword) {
            $this->handleRegisterError('Passwords do not match');
        }

        $existingDriversByEmail = $this->driverRepository->findByEmail($email);
        if (!empty($existingDriversByEmail)) {
            $this->handleRegisterError('Email is already in use');
        }

        $existingDriversByLicense = $this->driverRepository->findDriversLicense($driversLicense);
        if (!empty($existingDriversByLicense)) {
            $this->handleRegisterError('Driver\'s license is already in use');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->driverRepository->createDriver($firstName, $lastName, $driversLicense, $age, $email, $hashedPassword);

        $_SESSION['authenticated_user'] = $email;

        header('Location: ' . URL_REGISTER_SUCCESS);
        exit;
    }
    
    public function signIn() {
        $email = $_POST['emailAddress'];
        $password = $_POST['password'];

        $this->driverRepository = new DriverRepository();
    
        $driver = $this->driverRepository->findByEmail($email);
    
        if (!$driver) {
            $this->handleSignInError('Email not found');
        }

        $dbPassword = $driver->getPassword();
    
        if (!password_verify($password, $dbPassword)) {
            $_SESSION['authenticated_user'] = null;
            $this->handleSignInError('Incorrect password');
        }
    
        $_SESSION['authenticated_user'] = $driver->getEmail();
    
        header('Location: ' . URL_SIGNIN_SUCCESS);
        exit;
    }

    public function registerSuccess() {
        header('Refresh: 3; URL=/public/driver');

        echo ('<div style="text-align: center; margin-top: 20%;">
        <p>You registered successfully. You will be redirected in a few seconds.</p>
        </div>');
    }

    public function signInSuccess() {
        header('Refresh: 3; URL=/public/driver');

        echo ('<div style="text-align: center; margin-top: 20%;">
        <p>You logged in successfully. You will be redirected in a few seconds.</p>
        </div>');
    }
    

    public function handleRegisterError($message) {
        $_SESSION['error'] = $message;

        header('Refresh: 3; URL=/public/home');

        echo ('<div style="text-align: center; margin-top: 20%;">
        <p>' . $_SESSION['error'] . '. You will be redirected in a few seconds.</p>
        </div>');
        exit;
    }

    public function handleSignInError($message) {
        $_SESSION['error'] = $message;

        header('Refresh: 3; URL=/public/signIn');

        echo ('<div style="text-align: center; margin-top: 20%;">
        <p>' . $_SESSION['error'] . '. You will be redirected in a few seconds.</p>
        </div>');
        exit;
    }
}