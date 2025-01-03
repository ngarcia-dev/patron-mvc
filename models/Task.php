<?php
require_once 'db/db.php';

class Task
{
  public $id;
  public $description;

  public function __construct($id = null, $description = '')
  {
    $this->id = $id;
    $this->description = $description;
  }

  public static function all()
  {
    $db = Database::getInstance();
    $tasks = $db->query('SELECT * FROM tasks')->fetchAll();
    return array_map(function ($task) {
      return new Task($task['id'], $task['description']);
    }, $tasks);
  }

  public static function find($id)
  {
    $db = Database::getInstance();
    $task = $db->query("SELECT * FROM tasks WHERE id = $id")->fetch();
    return new Task($task['id'], $task['description']);
  }

  public function save()
  {
    $db = Database::getInstance();
    if ($this->id) {
      $db->query("UPDATE tasks SET description = '$this->description' WHERE id = $this->id");
    } else {
      $db->query("INSERT INTO tasks (description) VALUES ('$this->description')");
    }
  }

  public function delete()
  {
    $db = Database::getInstance();
    $db->query("DELETE FROM tasks WHERE id = $this->id");
  }
}
