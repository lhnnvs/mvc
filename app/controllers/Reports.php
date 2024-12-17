<?php

class Reports extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }
    
    $x = new Report();
    $dataValue = $_GET;
    
    if (count($dataValue) > 1) {
        $rows = $x->findAllReports($dataValue["date"]);
        $summary = $x->getReportSummary($dataValue["date"]);
    } else {
        $rows = $x->findAllReports();
        $summary = $x->getReportSummary();
    }
    
    $this->view('reports', [
      'reports' => $rows,
      'summary' => $summary
    ]);
  }
  
  public function qr()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $reportId = $_GET['report_id'] ?? null;
        $pin = $_POST['pin'] ?? '';
        
       if (!$reportId || strlen($pin) !== 6 || !is_numeric($pin)) {
            echo "Invalid data. Please provide a valid report ID and a 6-digit PIN.";
            return;
            }
            $reportModel = new Report();
            $result = $reportModel->updatePin($reportId, $pin);
        } else {
        $this->view('kiosk/qr');
        }
    }
}