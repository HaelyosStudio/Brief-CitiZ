<?php

class DriverRepository extends Database {
    public function getAll() {
        $data = $this->getDb()->query('SELECT * FROM driver');

        return $data->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }

    public function findById($studentId) {
        $req = $this->getDb()->prepare('SELECT * FROM student WHERE id = :id');

        $req->execute(["id" => $studentId]);

        return $req->fetchAll(PDO::FETCH_CLASS, Driver::class);
    }

    public function createStudent($studentName, $studentSurname, $studentBirthdate, $studentEmail, $studentDepartment_id) {
        $query = 'INSERT INTO student (name, surname, birthdate, email, department_id) VALUES (:name, :surname, :birthdate, :email, :department_id)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'name' => $studentName,
            'surname' => $studentSurname,
            'birthdate' => $studentBirthdate,
            'email' => $studentEmail,
            'department_id' => $studentDepartment_id,
        ]);
    }

    public function deleteStudent($studentId) {
        $query = 'DELETE FROM student WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute(['id' => $studentId]);
    }
}