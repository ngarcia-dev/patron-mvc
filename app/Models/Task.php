<?php
require_once __DIR__ . '/../../db/Database.php';

class Task
{
  public $id;
  public $description;

  public function __construct($id = null, $description = '')
  {
    $this->id = $id;
    $this->description = $description;
  }

  protected static function getDB()
  {
    return Database::getInstance();
  }

  public static function all()
  {
    $tasks = self::getDB()->query('SELECT * FROM tasks')->fetchAll();
    return array_map(function ($task) {
      return new Task($task['id'], $task['description']);
    }, $tasks);
  }

  public static function find($id)
  {
    $task = self::getDB()->query("SELECT * FROM tasks WHERE id = $id")->fetch();
    return new Task($task['id'], $task['description']);
  }

  public function save()
  {
    if ($this->id) {
      self::getDB()->query("UPDATE tasks SET description = '$this->description' WHERE id = $this->id");
    } else {
      self::getDB()->query("INSERT INTO tasks (description) VALUES ('$this->description')");
    }
  }

  public function delete()
  {
    self::getDB()->query("DELETE FROM tasks WHERE id = $this->id");
  }
}
