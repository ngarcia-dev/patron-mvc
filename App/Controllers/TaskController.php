<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController
{
  public function index()
  {
    $tasks = Task::all();
    require_once __DIR__ . '/../views/tasks/index.phtml';
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $task = new Task(null, $_POST['description']);
      $task->save();
      header('Location: /tasks');
    } else {
      require_once __DIR__ . '/../views/tasks/task-form.phtml';
    }
  }

  public function edit($id)
  {
    $task = Task::find($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $task->description = $_POST['description'];
      $task->save();
      header('Location: /tasks');
    } else {
      require_once __DIR__ . '/../views/tasks/task-form.phtml';
    }
  }

  public function delete($id)
  {
    $task = Task::find($id);
    $task->delete();
    header('Location: /tasks');
  }
}
