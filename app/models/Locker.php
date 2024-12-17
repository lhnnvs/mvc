<?php

class Locker extends Model
{
  public function validate($data)
  {
    $this->errors = [];
    if (empty($data['locker']) || empty($data['size']) || empty($data['price']) || empty($data['status']) || empty($data['access'])) {
      $this->errors['required_fields'] = "Please fill in all required fields.";
    }

    if (count($this->errors) == 0) {
      return true;
    } else {
      return false;
    }
  }
  
  public function updateLocker($lockerId, $status) {
        $query = "UPDATE lockers SET status = :status WHERE id = :locker_id";
        $data = [
            'locker_id' => $lockerId,
            'status' => $status
        ];
        return $this->query($query, $data);
    }
}

