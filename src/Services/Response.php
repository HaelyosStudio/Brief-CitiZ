<?php

trait Response
{
    public function render($view, $data = null)
    {
        if (is_array($data) && !empty($data)) {
            extract($data);
        }
        
        include_once __DIR__ . '/../Views/' . $view . ".php";
    }
}
