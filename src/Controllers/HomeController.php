<?php

require_once __DIR__ . '/../Services/Response.php';

class HomeController
{
    use Response;

    public function index()
    {
        $title = "Citiz Home Page";

        $viewData = [
            'title' => $title
        ];

        $this->render('Homepage', $viewData);
    }

    public function pageNotFound()
    {
        $this->render('404');
    }
}
