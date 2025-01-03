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

El usuario interactua cons la vista (por ejemplo hace click en un boton). La vista notifica al
controlador sobre la acción del usuario, el controlador interactúa con el metodo para procesar
la petición (por ejemplo, obtener los datos de la base de datos), el controlador actualiza la
vista con la información del modelo, el usuario ve la información actualizada en la vista.


```php
// Vista
<a href="index.php?action=edit&id=<?php echo $task->id; ?>">Editar</a> // <--- clicl button

// Front Controller


// Controller


```