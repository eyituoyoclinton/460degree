<?php

class logout extends ServerController
{
    public function __construct()
    {
    }

    public function index()
    {
        session_destroy();
        $this->redirect(base_url());
    }
}
