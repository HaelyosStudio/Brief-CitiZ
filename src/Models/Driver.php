<?php

class Driver {

    private $driver_id;
    private $first_name;
    private $last_name;
    private $drivers_license;
    private $age;
    private $email;
    private $password;

    public function getDriverId() {
        return $this->driver_id;
    }

    public function setDriverId($driver_id) {
        $this->driver_id = $driver_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function getDriversLicense() {
        return $this->drivers_license;
    }

    public function setDriversLicense($drivers_license) {
        $this->drivers_license = $drivers_license;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}

?>
