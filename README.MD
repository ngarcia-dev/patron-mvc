# Modelo de ejemplo arquitectura MVC

El patron de arquitectura MVC (Model, View, Controller) es una forma de organizar el código de una aplicación para que sea más facil de desarrollar, mantener, y probar. Divide la apliacación en tres partes interconectadas:

| Modelo                                                                 |
| :--------------------------------------------------------------------- |
| Representa los datos de la aplicación y la logica de negocio.          |
| Se encarga de acceder, gestionar y modificar los datos.                |
| Es independiente de la forma en que se presentan los datos al usuario. |
| `Ejemplos: una base datos, un archivo XML, una API REST.`              |

| Vista                                                                                |
| :----------------------------------------------------------------------------------- |
| Se encarga de mostrar la información al usuario.                                     |
| Es la interfaz de usuario de la aplicación.                                          |
| No contiene lógica de negocio ni acceso a datos.                                     |
| Recibe la información que debe mostrar del controlador.                              |
| `Ejemplos: una página web, una aplicación móvil, una interfaz de línea de comandos.` |

| Controlador                                                        |
| :----------------------------------------------------------------- |
| Actúa como intermediario entre el modelo y la vista.               |
| Recibe las peticiones del usuario (a través de la vista).          |
| Interactúa con el modelo para obtener o modificar los datos.       |
| Envía la información a la vista para que la muestre al usuario.    |
| Gestiona el flujo de la aplicación y la lógica de la presentación. |

## ¿Cómo funciona MVC?

El usuario interactua con la vista (por ejemplo hace click en un boton). La vista notifica al
controlador sobre la acción del usuario, el controlador interactúa con el metodo del modelo
para procesar la petición (por ejemplo, obtener los datos de la base de datos), el controlador
actualiza la vista con la información del modelo. en consecuencia el usuario ve la información actualizada en la vista.

```php
// VIEW
<a href="index.php?action=edit&id=<?php echo $task->id; ?>">Editar</a> // <--- click button

```
```php
// FRONT CONTROLLER
$controller = new TaskController();
switch ($_GET['action']) {
  case 'edit':
    $controller->edit($_GET['id']);
    break;
  // resto de casos ...
}

```
```php
// CONTROLLER
class TaskController
{
  public function edit($id)
  {
    $task = Task::find($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $task->description = $_POST['description'];
      $task->save();
      header('Location: index.php');
    } else {
      require_once 'views/tasks/task-form.phtml';
    }
  }
  // resto de metodos
}

```
```php
// MODEL
class Task
{
  // resto de codigo
  public function save()
  {
    $db = Database::getInstance();
    if ($this->id) {
      $db->query("UPDATE tasks SET description = '$this->description' WHERE id = $this->id");
    } else {
      $db->query("INSERT INTO tasks (description) VALUES ('$this->description')");
    }
  }
  // resto de metodos
}
```

| $                                    | Beneficios de usar MVC                                                                         |
| :----------------------------------- | :--------------------------------------------------------------------------------------------- |
| **Separación de responsabilidades**: | _cada componente tiene una función específica, lo que facilita el desarrollo y mantenimiento._ |
| **Reusabilidad**:                    | _los componentes se pueden reutilizar en diferentes partes de la aplicación._                  |
| **Facilidad de prueba**:             | _cada componente se puede probar de forma independiente._                                      |
| **Mayor flexibilidad**:              | _facilita la modificación de la aplicación sin afectar a otros componentes._                   |
