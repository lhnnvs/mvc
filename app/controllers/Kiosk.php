<?php

class Kiosk extends Controller
{
    public function index()
    {
        $lockerModel = new Locker();
        $lockers = $lockerModel->findAll();

        $this->view('kiosk/index', [
            'lockers' => $lockers
        ]);
    }

    public function rent()
    {
        $this->view('kiosk/rent');
    }

    public function gcash($id = null)
    {
        $errors = [];
        $report = new Report();

        if (count($_POST) > 0 && $id == null) {
            if ($report->validate($_POST)) {
                $report->insert($_POST);
            } else {
                $errors = $report->errors;
            }
        }

        $this->view('kiosk/gcash', [
            'errors' => $errors,
            'report' => $report->findLast()
        ]);
    }

    public function setpin($id = null)
    {
        $row = null;
        if ($id != null) {
            $report = new Report();
            $arr['id'] = $id;
            $row = $report->first($arr);

            if (count($_POST) > 0) {
                $report->update($id, $_POST);

                redirect('kiosk');
            }
        }

        $this->view('kiosk/setpin', [
            'report' => $row
        ]);
    }

    public function qr()
    {
        $reportId = $_GET['report_id'] ?? null;

        if ($reportId !== null) {
            $report = new Report();
            $reportData['id'] = $reportId;
            $row = $report->first($reportData);

            if (!$row) {
                // If no report is found, set $row to null
                $row = null;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $pin = $_POST['pin'] ?? '';

                // Validate PIN before updating
                if (strlen($pin) !== 6 || !is_numeric($pin)) {
                    echo "Invalid PIN.";
                    return;
                }

                // Round off the minutes and seconds of the given date
                $d = $row->date;
                // $roundedDate = (strtotime($d) % 3600 >= 1800)
                    // ? date('Y-m-d H:00:00', strtotime($d) + 3600) // Round up if >= 30 minutes
                    // : date('Y-m-d H:00:00', strtotime($d)); // Otherwise, round down

                // Calculate the expiration time by adding the specified number of hours
                $expiration = date('Y-m-d H:i:s', strtotime($roundedDate . " + " . $row->hours . " hours"));

                // Update PIN and locker details
                $report->updatePin($reportId, $pin, $row->locker_id, "Occupied", $expiration);

                redirect('kiosk/qr?id='.$reportId);
            }
        } else {
            // Handle case where no report ID is provided
            $row = null;
        }

        $this->view('kiosk/qr', [
            'report' => $row
        ]);
    }
}
