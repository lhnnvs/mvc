<?php

class Home extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }
        $lockerModel = new Locker();
        $lockers = $lockerModel->findAll();
        
        $reportModel = new Report();
        $reports = $reportModel->findAllReports();

        $this->view('home', [
            'lockers' => $lockers,
            'reports' => $reports
        ]);
    }
}


