<?php

class Model extends Database
{
  public $errors = [];

  public function __construct()
  {
    if (!property_exists($this, 'table')) {

      $this->table = strtolower($this::class) . 's';
    }
  }

  public function findAll($order = null)
  {
    $query = "SELECT * FROM $this->table";

    if ($order) {
      $query .= " ORDER BY $order";
    }

    $result = $this->query($query);

    if ($result) {
      return $result;
    }
    return false;
  }
  
  public function findLast()
  {
    $query = "SELECT * FROM $this->table ORDER BY id DESC LIMIT 1";
    $result = $this->query($query);

    if ($result) {
      return $result[0]->id;
    }
    return 0;
  }

  public function where($data, $data_not = [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "select * from $this->table where ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    $query = trim($query, " && ");

    $data = array_merge($data, $data_not);
    $result = $this->query($query, $data);

    if ($result) {
      return $result;
    }
    return false;
  }

  public function first($data, $data_not = [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "select * from $this->table where ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    $query = trim($query, " && ");

    $data = array_merge($data, $data_not);
    $result = $this->query($query, $data);

    if ($result) {
      return $result[0];
    }
    return false;
  }

  public function insert($data)
  {
    $columns = implode(', ', array_keys($data));
    $values = implode(', :', array_keys($data));
    $query = "insert into $this->table ($columns) values (:$values)";

    $this->query($query, $data);

    return false;
  }

  public function update($id, $data, $column = 'id')
  {
    $keys = array_keys($data);
    $query = "update $this->table set ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . ", ";
    }

    $query = trim($query, ", ");

    $query .= " where $column = :$column";

    $data[$column] = $id;
    $this->query($query, $data);

    return false;
  }

  public function delete($id, $column = 'id')
  {
    $data[$column] = $id;
    $query = "delete from $this->table where $column = :$column";

    $this->query($query, $data);

    return false;
  }
  
  public function findAllReports($dateStr = null)
  {
    $query = "SELECT * FROM $this->table r";
    $query .= " INNER JOIN users u ON r.user_id = u.id";
    $query .= " INNER JOIN lockers l ON r.locker_id = l.id";

    if ($dateStr) {
      $query .= " WHERE r.date LIKE '".$dateStr."%'";
    }
    $query .= " ORDER BY r.date";

    $result = $this->query($query);

    if ($result) {
      return $result;
    }
    return false;
  }
  
  public function getReportSummary($dateStr = null) {
      $query = "SELECT COUNT(*) as total_rents, SUM(r.hours) as total_hours, l.price as price FROM $this->table r INNER JOIN users u on r.user_id = u.id INNER JOIN lockers l on r.locker_id = l.id";
      
        if ($dateStr) {
          $query .= " WHERE r.date LIKE '".$dateStr."%'";
        }
        
    $query .= " GROUP BY l.size ORDER BY r.date";
    $result = $this->query($query);
      
      if ($result) {
        return $result;
    }
    return false;
  }
}
