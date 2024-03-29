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

    public function findAllCars() {
        $req = $this->getDb()->prepare('SELECT * FROM car');

        $req->execute();

        return $req->fetchAll();
    }

    public function findAllReservations($driverId) {
        $req = $this->getDb()->prepare('SELECT reservation.start_date, reservation.end_date, car.brand, car.model, category.car_doors, category.car_boot,category.seats 
        FROM reservation 
        JOIN car ON reservation.car_id = car.car_id
        JOIN category ON car.category_id = category.category_id
        WHERE reservation.driver_id = :driver_id');

        $req->execute(['driver_id' => $driverId]);

        return $req->fetchAll();
    }

    public function makeReservation($startDate, $endDate, $driverId, $carId) {
        $query = 'INSERT INTO reservation (start_date, end_date, driver_id, car_id) VALUES (:start_date, :end_date, :driver_id, :car_id)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'driver_id' => $driverId,
            'car_id' => $carId,
        ]);
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
        $query = 'DELETE FROM reservation WHERE driver_id = :id;
        DELETE FROM driver WHERE driver_id = :id;';

        $req = $this->getDb()->prepare($query);

        $req->execute(['id' => $driver]);
    }
}