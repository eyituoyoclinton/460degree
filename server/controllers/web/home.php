<?php

class home extends ServerController
{
    public function __construct()
    {
        $this->checkLogin();
    }

    public function index()
    {
        $authModel = $this->loadModel('authentication_model');
        $data['users'] = $authModel->fetchUser();
        $user = $_SESSION['role'];
        if ($user === 'Super seller') {
            $this->loadView('indexSuperseller', $data);
        } elseif ($user === 'Reseller') {
            $this->loadView('indexReseller', $data);
        } elseif ($user === 'Individual') {
            $this->loadView('indexIndividual', $data);
        } elseif ($user === 'Corporate') {
            $this->loadView('indexCorporate', $data);
        } else {
            $this->loadView('index', $data);
        }
    }
}
