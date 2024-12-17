<?php

class Report extends Model
{
    public function validate($data)
    {
        $this->errors = [];

        if (count($this->errors) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateLocker($id, $access)
    {
        $query = "UPDATE reports r JOIN lockers l ON l.id = r.locker_id SET l.access = :access WHERE r.id = :id";
        $data = [
            'id' => $id,
            'access' => $access
        ];

        return $this->query($query, $data);
    }

    public function getUserDetails($id)
    {
        $query = NULL;
        if ($id !== NULL) {
            $query = "SELECT *, r.id AS id FROM reports r JOIN lockers l ON r.locker_id = l.id WHERE r.id = " . $id . " LIMIT 1";
        }
        return $this->query($query);
    }

    public function updatePin($reportId, $pin, $lockerId, $status, $expiration)
    {
        $query = "UPDATE reports r JOIN lockers l ON l.id = r.locker_id SET r.pincode = :pin, l.status = :status, r.date_end = :date_end WHERE r.id = :report_id";
        $data = [
            'pin' => $pin,
            'report_id' => $reportId,
            'status' => $status,
            'date_end' => $expiration
        ];

        return $this->query($query, $data);
    }
}
