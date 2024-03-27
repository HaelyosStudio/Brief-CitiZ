<?php

class DriverRepository extends Database {
    public function getAll() {
        $data = $this->getDb()->query('SELECT * FROM driver');

        return $data->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }

    public function getId($driverEmail) {
        $req = $this->getDb()->prepare('SELECT driver.driver_id FROM driver WHERE email = :email');

        $req->execute(["email" => $driverEmail]);

        return $req->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }
    
    public function findByEmail($driverEmail) {
        $req = $this->getDb()->prepare('SELECT driver.email FROM driver WHERE email = :email');

        $req->execute(["email" => $driverEmail]);

        return $req->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }

    public function findDriversLicense($driversLicense) {
        $req = $this->getDb()->prepare('SELECT driver.drivers_license FROM driver WHERE drivers_license = :driversLicense');

        $req->execute(["driversLicense" => $driversLicense]);

        return $req->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }

    public function getPassword($driverPassword) {
        $req = $this->getDb()->prepare('SELECT driver.password FROM driver WHERE password = :driverPassword');

        $req->execute(["driverPassword" => $driverPassword]);

        return $req->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }
    public function createDriver($driverFirstName, $driverLastName, $driversLicense, $driverAge, $driverEmail, $driverPassword) {
        $query = 'INSERT INTO driver (first_name, last_name, drivers_license, age, email, password) VALUES (:first_name, :last_name, :drivers_license, :age, :email, :password)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'first_name' => $driverFirstName,
            'last_name' => $driverLastName,
            'drivers_license' => $driversLicense,
            'age' => $driverAge,
            'email' => $driverEmail,
            'password' => $driverPassword,
        ]);
    }

    public function deleteStudent($studentId) {
        $query = 'DELETE FROM student WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute(['id' => $studentId]);
    }
}