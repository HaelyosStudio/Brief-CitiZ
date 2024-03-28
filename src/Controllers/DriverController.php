<?php

require_once __DIR__ . '/../Services/Response.php';

class DriverController
{
    use Response;
    private $driverRepository;

    public function __construct()
    {
      $this->driverRepository = new DriverRepository();
    }

    public function index()
    {
        $driverRepository = new DriverRepository();
        $drivers = $driverRepository->getAll();

        $viewData = [
            'drivers' => $drivers
        ];

        $this->render('DriversPage', $viewData);
    }

    public function isLogged()
    {
      if (isset($_SESSION['authenticated_user']) && !empty($_SESSION['authenticated_user'])) {
        $email = $_SESSION['authenticated_user'];
  
        $driver = $this->driverRepository->findByEmail($email);
        if (!$driver) {
          $_SESSION['authenticated_user'] = null;
          echo '<meta http-equiv="refresh" content="0;url=' . URL_SIGNIN . '">';
          exit();
        }
      } else {
        $_SESSION['authenticated_user'] = null;
        echo '<meta http-equiv="refresh" content="0;url=' . URL_SIGNIN . '">';
        exit;
      }
    }

    public function logout()
    {
      session_destroy();
      echo '<meta http-equiv="refresh" content="0;url=' . URL_HOMEPAGE . '">';
      exit;
    }

    public function profile()
    {
        $this->isLogged();

        $email = $_SESSION['authenticated_user'];
        $driver = $this->driverRepository->findByEmail($email);

        $_SESSION['driver'] = $driver;

        $viewData = [
            'driver' => $driver
        ];

        $this->render('driverProfile', $viewData);
    }

    public function updateProfile()
    {
        $this->isLogged();

        $email = $_SESSION['authenticated_user'];
        $driver = $this->driverRepository->findByEmail($email);

        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $driversLicense = $_POST['driversLicense'] ?? '';
        $age = $_POST['age'] ?? '';
        $email = $_POST['email'] ?? '';

        $errors = [];
        $validation_success = true;

        if (empty($firstName)) {
            $errors['firstName'] = 'First name is required.';
            $validation_success = false;
        }

        if (empty($lastName)) {
            $errors['lastName'] = 'Last name is required.';
            $validation_success = false;
        }

        if ($validation_success) {
            $driver->setFirstName($firstName);
            $driver->setLastName($lastName);
            $driver->setDriversLicense($driversLicense);
            $driver->setAge($age);
            $driver->setEmail($email);

            $this->driverRepository->update($driver);

            echo '<meta http-equiv="refresh" content="0;url=' . URL_DRIVER_PROFILE . '">';
            exit();
        } else {
            $viewData = [
                'driver' => $driver,
                'errors' => $errors
            ];

            $this->render('DriverProfile', $viewData);
        }
    }

    public function changePassword()
    {
        $this->isLogged();

        $email = $_SESSION['authenticated_user'];
        $driver = $this->driverRepository->findByEmail($email);

        $currentPassword = $_POST['currentPassword'] ?? '';
        $newPassword = $_POST['newPassword'] ?? '';
        $confirmPassword = $_POST['confirmPassword'] ?? '';

        $errors = [];
        $validation_success = true;

        if (!password_verify($currentPassword, $driver->getPassword())) {
            $errors['currentPassword'] = 'Current password is incorrect.';
            $validation_success = false;
        }

        if ($newPassword !== $confirmPassword) {
            $errors['confirmPassword'] = 'New password and confirmation password do not match.';
            $validation_success = false;
        }

        if (strlen($newPassword) < 8) {
            $errors['newPassword'] = 'New password must be at least 8 characters long.';
            $validation_success = false;
        }

        if ($validation_success) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $driver->setPassword($hashedPassword);

            $driverRepository = new DriverRepository();
            $driverRepository->updatePassword($driver);

            echo '<meta http-equiv="refresh" content="0;url=' . URL_DRIVER_PROFILE . '">';
            exit();
        } else {
            $viewData = [
                'driver' => $driver,
                'errors' => $errors
            ];

            $this->render('DriverProfile', $viewData);
        }
    }
}
