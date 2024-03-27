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

        header('Location: /public/register/success');
        exit;
    }

    public function registerSuccess() {
        header('Refresh: 5; URL=/public/driver');

        echo ('<div style="text-align: center; margin-top: 20%;">
        <p>You registered successfully. You will be redirected in a few seconds.</p>
        </div>');
    }
    
    public function signIn() {
        $email = $_POST['emailAddress'];
        $password = $_POST['password'];
    
        $this->driverRepository = new DriverRepository();
    
        $driverEmail = $this->driverRepository->findByEmail($email);
    
        if (!$driverEmail) {
            $this->handleSignInError('Email not found');
        }
    
        if (!password_verify($password, $this->driverRepository->getPassword($password))) {
            $this->handleSignInError('Incorrect password');
        }
    
        $_SESSION['driver_id'] = $this->driverRepository->getId($email);
    
        header('Location: ' . URL_SIGNIN_SUCCESS);
        exit;
    }
    

    public function handleRegisterError($message) {
        $_SESSION['error'] = $message;

        header('Refresh: 5; URL_REGISTER_ERROR');
        exit;
    }

    public function handleSignInError($message) {
        $_SESSION['error'] = $message;

        header('Location: ' . URL_SIGNIN_ERROR);
        exit;
    }
}