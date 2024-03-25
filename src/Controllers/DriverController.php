<?php

require_once __DIR__ . '/../Services/Response.php';

class DriverController
{
    use Response;

    public function index()
    {
        $driverRepository = new DriverRepository();
        $drivers = $driverRepository->getAll();

        $viewData = [
            'drivers' => $drivers
        ];

        $this->render('DriversPage', $viewData);
    }
}
