<?php

class DriverRepository extends Database {
    public function getAll() {
        $data = $this->getDb()->query('SELECT * FROM driver');

        return $data->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }
    
    public function findByEmail($driverEmail) {
        $req = $this->getDb()->prepare('SELECT * FROM driver WHERE email = :email');

        $req->execute(["email" => $driverEmail]);

        $req->setFetchMode(PDO::FETCH_CLASS, Driver::class);

        return $req->fetch();
    }

    public function findDriversLicense($driversLicense) {
        $req = $this->getDb()->prepare('SELECT driver.drivers_license FROM driver WHERE drivers_license = :driversLicense');

        $req->execute(["driversLicense" => $driversLicense]);

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

    public function update($driver) {
        $query = 'UPDATE driver SET first_name = :first_name, last_name = :last_name, drivers_license = :drivers_license, age = :age, email = :email WHERE driver_id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $driver->getDriverId(),
            'first_name' => $driver->getFirstName(),
            'last_name' => $driver->getLastName(),
            'drivers_license' => $driver->getDriversLicense(),
            'age' => $driver->getAge(),
            'email' => $driver->getEmail(),
        ]);
    }

    public function updatePassword($driver) {
        $query = 'UPDATE driver SET password = :password WHERE driver_id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $driver->getDriverId(),
            'password' => $driver->getPassword(),
        ]);
    }

    public function deleteDriver($driver) {
        $query = 'DELETE FROM driver WHERE driver_id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute(['id' => $driver->getDriverId()]);
    }
}