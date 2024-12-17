<?php

class Mobile extends Controller
{
  public function index()
  {
    $row = null;
    $reportId = $_GET['id'] ?? null;
      
    if ($reportId !== NULL) {
        $report = new Report();
        $reportData['id'] = $reportId;
        $row = $report->first($reportData);
    }
    
    $this->view('mobile/index', [
        'user' => $row,
        'id' => $reportId
    ]);
  }

  public function userinfo()
  {
    $row = null;
    $report = new Report();

    if (count($_POST) > 0) {
        $reportData['id'] = $_POST['reportId'];
        $row = $report->first($reportData);
    }
    
    $this->view('mobile/userinfo', [
        'user' => $row    
    ]);
  }
  
  public function terms()
  {
    $row = null;
    $id = $_POST['id'];
    
    if (count($_POST) > 0) {
        $report = new Report();
        $arr['id'] = $_POST['id'];
        $row = $report->first($arr);

        if (count($_POST) > 0) {
            $report->update($id, $_POST);
        }
    }

    $this->view('mobile/terms', [
        'id' => $id
    ]);
  }

  public function home()
  {
      $row = null;
      $id = $_POST['id'];
      // set this ID as session
      
      if (count($_POST) > 0) {
        $report = new Report();
        if (isset($_POST['access'])) {
            // Update locker access
            $row = $report->updateLocker($id, $_POST["access"]);
        } else {
            $row = $report->getUserDetails($id);
        }
    }

    $this->view('mobile/home', [
        'user' => ($row !== null) ? $row[0] : $row
    ]);
  }
  
  public function returnhome()
  {
      $row = null;
      $id = $_POST['id'];
      // set this ID as session
      
      if (count($_POST) > 0) {
        $report = new Report();
        if (isset($_POST['access'])) {
            // Update locker access
            $row = $report->updateLocker($id, $_POST["access"]);
        } else {
            $row = $report->getUserDetails($id);
        }
    }

    $this->view('mobile/home', [
        'user' => ($row !== null) ? $row[0] : $row
    ]);
  }
    
 
  public function notifications()
  {
    $this->view('mobile/notifications');
  }

  public function terminate()
  {
    $this->view('mobile/terminate');
  }

  public function access()
  {
    $row = null;
    $id = $_GET["id"];
      
    if (count($_GET) > 0) {
        $report = new Report();
        $row = $report->getUserDetails($id);
    }

    $this->view('mobile/access', [
        'user' => ($row !== null) ? $row[0] : $row
    ]);
  }

  public function verify()
  {
    $this->view('mobile/verify');
  }

  public function expired()
  {
    $this->view('mobile/expired');
  }
}