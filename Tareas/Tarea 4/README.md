# Blog de Pesca Deportiva y Equipo

## 1. Tema del blog
Blog sobre técnicas de pesca costera, reseñas de carretes, cañas, jigs y spots de pesca.

## 2. Hoja de modelado
| Campo | Tipo | Ejemplo | Para qué sirve |
| --- | --- | --- | --- |
| nombre | string | "Lures y Señuelos" | El nombre corto que verá el lector. |
| descripcion | text | "Jigs, vinilos y kurrikán para pesca costera" | Explica qué agrupa la categoría. |

## 3. Salida de route:list
```bash
GET|HEAD categorias ........................ categorias.index › CategoriaController@index
```

## 4. Respuesta JSON (/categorias)
```json
[
  {
    "id": 3,
    "nombre": "Lugares de Pesca",
    "descripcion": "Puntos en el muelle y playa para capturas del día",
    "created_at": "2026-11-05T15:48:07.000000Z",
    "updated_at": "2026-11-05T15:48:07.000000Z"
  },
  {
    "id": 1,
    "nombre": "Lures y Señuelos",
    "descripcion": "Jigs, vinilos y kurrikán para pesca costera",
    "created_at": "2026-11-05T15:48:05.000000Z",
    "updated_at": "2026-11-05T15:48:05.000000Z"
  },
  {
    "id": 2,
    "nombre": "Equipos y Cañas",
    "descripcion": "Reseñas de carretes spinning, líneas trenzadas y cañas",
    "created_at": "2026-11-05T15:48:05.000000Z",
    "updated_at": "2026-11-05T15:48:05.000000Z"
  }
]
```

## 5. Salida de Categoria::count()
```bash
> App\Models\Categoria::count();
= 3
```

## 6. Explicación del recorrido
Al ingresar a la URL `/categorias`, Laravel busca la coincidencia registrada en `routes/web.php` y dirige la solicitud al controlador `CategoriaController`. El método `index()` llama al modelo `Categoria` mediante Eloquent para obtener las categorías de la base de datos y retorna los datos serializados en JSON directamente al navegador.

## 7. Salida de route:list (Etiquetas y Categorías)
```bash
GET|HEAD etiquetas ........................ etiquetas.index › EtiquetaController@index
GET|HEAD categorias ....................... categorias.index › CategoriaController@index
GET|HEAD categorias/{id} .................. CategoriaController@show
```

## 8. Respuesta JSON (/etiquetas)
```json
[
  {
    "id": 4,
    "nombre": "Señuelos",
    "color": "#FB8C00",
    "created_at": "2026-11-12T03:16:42.000000Z",
    "updated_at": "2026-11-12T03:16:42.000000Z"
  },
  {
    "id": 1,
    "nombre": "Spinning",
    "color": "#1E88E5",
    "created_at": "2026-11-12T03:16:35.000000Z",
    "updated_at": "2026-11-12T03:16:35.000000Z"
  },
  {
    "id": 2,
    "nombre": "Jigging",
    "color": "#E53935",
    "created_at": "2026-11-12T03:16:35.000000Z",
    "updated_at": "2026-11-12T03:16:35.000000Z"
  },
  {
    "id": 3,
    "nombre": "Pesca de Orilla",
    "color": "#43A047",
    "created_at": "2026-11-12T03:16:35.000000Z",
    "updated_at": "2026-11-12T03:16:35.000000Z"
  }
]
```

## 9. Respuesta JSON (/categorias/1)
```json
{
  "id": 1,
  "nombre": "Lures y Señuelos",
  "descripcion": "Jigs, vinilos y kurrikán para pesca costera",
  "created_at": "2026-11-05T15:48:05.000000Z",
  "updated_at": "2026-11-05T15:48:05.000000Z"
}
```

## 10. Salida de Etiqueta::count()
```bash
> App\Models\Etiqueta::count();
= 4
```

## 11. Cómo viaja la petición
Cuando se pide una URL como `/etiquetas` o `/categorias/1`, Laravel revisa `routes/web.php` y manda la petición al controlador que toca (`EtiquetaController` o `CategoriaController`). Ahí se consulta la base de datos usando el modelo con `latest()->get()` o `find($id)` para traer los datos, y al final se regresan al navegador en formato JSON.

## 12. Salida de route:list --path=categorias (Actividad 3)
```bash
GET|HEAD  categorias ..................... categorias.index › CategoriaController@index
POST      categorias ..................... categorias.store › CategoriaController@store
GET|HEAD  categorias/create .............. categorias.create › CategoriaController@create
GET|HEAD  categorias/{id} ................ CategoriaController@show

Showing [4] routes
```

## 13. Código del formulario (create.blade.php)
```html
<form action="{{ route('categorias.store') }}" method="POST">
    @csrf

    <div>
        <label for="nombre">Nombre de la categoría:</label><br>
        <input type="text" name="nombre" id="nombre" required>
    </div>
    <br>

    <div>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
    </div>
    <br>

    <button type="submit">Guardar Categoría</button>
</form>
```

## 14. Salida de Categoria::count() (Antes y después)
```bash
# Antes de crear desde el formulario:
> App\Models\Categoria::count();
= 3

# Después de guardar desde el formulario:
> App\Models\Categoria::count();
= 4
```

## 15. Recorrido form POST → store → redirect
Al enviar el formulario por método `POST`, Laravel valida el token `@csrf` y manda los datos al método `store()` de `CategoriaController`. Ahí se verifica que los campos cumplan las reglas de validación y se guarda el nuevo registro en la base de datos con el modelo `Categoria`. Por último, hace un `redirect()` hacia la lista `/categorias` mostrando el mensaje de confirmación en pantalla.

---

## 16. Tarea 3 — Sección Etiquetas

### Salida de route:list --path=etiquetas
```bash
GET|HEAD   etiquetas .................... etiquetas.index › EtiquetaController@index
POST       etiquetas .................... etiquetas.store › EtiquetaController@store
GET|HEAD   etiquetas/create ............. etiquetas.create › EtiquetaController@create

Showing [3] routes
```

### Código del formulario (`resources/views/etiquetas/create.blade.php`)
```html
<form action="{{ route('etiquetas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre de la etiqueta:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
    </div>

    <div class="form-group">
        <label for="color">Color:</label>
        <input type="color" name="color" id="color" value="#0284c7" required>
    </div>

    <button type="submit" class="btn">Guardar Etiqueta</button>
</form>
```

### Evidencia de registro creado
* **Nombre:** `hola`
* **Color:** `#bf614a`
* **Total de registros (`Etiqueta::count()`):** `5`

### Explicación del recorrido
Al entrar a `/etiquetas/create` se muestra el formulario con protección `@csrf` para capturar el nombre y color de la etiqueta. Al enviarlo por `POST` hacia `etiquetas.store`, `EtiquetaController@store` valida que ambos campos sean obligatorios y guarda el registro con `Etiqueta::create()`. Finalmente redirige a `/etiquetas` donde se muestra la lista actualizada con su etiqueta de color y mensaje de confirmación.

---

## 17. Tarea 3 — Sección Posts

### Salida de route:list --path=posts
```bash
GET|HEAD   posts ........................ posts.index › PostController@index
POST       posts ........................ posts.store › PostController@store
GET|HEAD   posts/create ................. posts.create › PostController@create

Showing [3] routes
```

### Código del formulario (`resources/views/posts/create.blade.php`)
```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Título (mínimo 5 caracteres):</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label for="body">Contenido:</label>
        <textarea name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
    </div>

    <button type="submit" class="btn">Publicar Post</button>
</form>
```

### Evidencia de registro creado
* **Título (`title`):** `hola esto es una prueba`
* **Contenido (`body`):** `esta es una prueba`
* **Mensaje en pantalla:** `Post publicado correctamente.`

### Explicación del recorrido
Cuando el usuario llena el formulario en `/posts/create` y envía la petición `POST` a `posts.store`, `PostController@store` verifica el token `@csrf` y aplica las reglas de validación (`required` y longitud mínima `min:5` en el título). Si los datos son válidos, crea el registro en la tabla `posts` mediante el modelo `Posts`. Al terminar, redirige a `/posts` mostrando el artículo recién publicado junto con una alerta verde de éxito.

---

## 18. Tarea 3 — Sección Contacto

### Salida de route:list --path=contacto
```bash
GET|HEAD   contacto ..................... contacto.index › ContactoController@index
POST       contacto ..................... contacto.store › ContactoController@store
GET|HEAD   contacto/create .............. contacto.create › ContactoController@create

Showing [3] routes
```

### Código del formulario (`resources/views/contacto/create.blade.php`)
```html
<form action="{{ route('contacto.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Tu nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" rows="4" required>{{ old('mensaje') }}</textarea>
    </div>

    <button type="submit" class="btn">Enviar Mensaje</button>
</form>
```

### Evidencia de registro creado
* **Nombre:** `jose`
* **Email:** `mezaibarra323@gmail.com`
* **Mensaje:** `hola:)`
* **Mensaje en pantalla:** `Mensaje enviado correctamente.`

### Explicación del recorrido
Al enviar el formulario desde `/contacto/create` por `POST` hacia `contacto.store`, Laravel valida el token `@csrf` y ejecuta `ContactoController@store`, donde se comprueba que el nombre, el formato de correo (`email`) y el mensaje cumplan las reglas de validación. Una vez validados, guarda el registro en la tabla `mensajes` mediante el modelo `Mensaje`. Por último, redirige a `/contacto` mostrando el mensaje en la vista y la notificación de confirmación.

---

## 19. Actividad por Participación 4 — Categorías (CRUD Completo)

### Salida de route:list --path=categorias
```bash
GET|HEAD  categorias ..................... categorias.index › CategoriaController@index
POST      categorias ..................... categorias.store › CategoriaController@store
GET|HEAD  categorias/create .............. categorias.create › CategoriaController@create
PUT       categorias/{id} ................ categorias.update › CategoriaController@update
DELETE    categorias/{id} ................ categorias.destroy › CategoriaController@destroy
GET|HEAD  categorias/{id} ................ CategoriaController@show
GET|HEAD  categorias/{id}/edit ........... categorias.edit › CategoriaController@edit

Showing [7] routes
```

### Salida de Categoria::count() (Antes y después de borrar)
```bash
# Antes de borrar desde la lista:
> App\Models\Categoria::count();
= 4

# Después de borrar la categoría:
> App\Models\Categoria::count();
= 3
```

### Evidencia de categoría editada
* **Categoría editada:** `Lugares de Pesca`
* **Descripción anterior:** `Puntos en el muelle y playa para capturas del día`
* **Descripción actualizada:** `Puntos en el muelle y playa`
* **Mensaje de confirmación:** `Categoría actualizada correctamente.`

---

## 20. Tarea 4 — CRUD Completo en Todas las Secciones

### A) Sección Etiquetas

#### Salida de route:list --path=etiquetas
```bash
GET|HEAD  etiquetas .................... etiquetas.index › EtiquetaController@index
POST      etiquetas .................... etiquetas.store › EtiquetaController@store
GET|HEAD  etiquetas/create ............. etiquetas.create › EtiquetaController@create
PUT       etiquetas/{id} ............... etiquetas.update › EtiquetaController@update
DELETE    etiquetas/{id} ............... etiquetas.destroy › EtiquetaController@destroy
GET|HEAD  etiquetas/{id}/edit .......... etiquetas.edit › EtiquetaController@edit

Showing [6] routes
```

#### Evidencia de registro editado y borrado
* **Registro editado:** Etiqueta `hola` actualizada a `holab1` (Color `#bf614a`) con mensaje `Etiqueta actualizada correctamente.`
* **Registro borrado:** Etiqueta de prueba eliminada mediante formulario `DELETE` en `/etiquetas/{id}` con redirección y mensaje `Etiqueta eliminada correctamente.`

#### Explicación del recorrido
Al pulsar **Editar** en una etiqueta, Laravel abre `/etiquetas/{id}/edit` precargando su nombre y color actuales; al enviar el formulario con `@method('PUT')`, `EtiquetaController@update` valida los datos y actualiza el registro. Para eliminar, el botón **Borrar** envía una petición `@method('DELETE')` a `etiquetas.destroy`, borra la fila con Eloquent y redirige a `/etiquetas`.

---

### B) Sección Mensajes (Contacto)

#### Salida de route:list --path=contacto
```bash
GET|HEAD  contacto ..................... contacto.index › ContactoController@index
POST      contacto ..................... contacto.store › ContactoController@store
GET|HEAD  contacto/create .............. contacto.create › ContactoController@create
PUT       contacto/{id} ................ contacto.update › ContactoController@update
DELETE    contacto/{id} ................ contacto.destroy › ContactoController@destroy
GET|HEAD  contacto/{id}/edit ........... contacto.edit › ContactoController@edit

Showing [6] routes
```

#### Evidencia de registro editado y borrado
* **Registro editado:** Nombre cambiado de `jose` a `jose enrique` (`mezaibarra323@gmail.com`) con mensaje `Mensaje actualizado correctamente.`
* **Registro borrado:** Mensaje de prueba eliminado desde `/contacto/{id}` con redirección y mensaje `Mensaje eliminado correctamente.`

#### Explicación del recorrido
Cuando se accede a `/contacto/{id}/edit`, el controlador busca el mensaje con `findOrFail($id)` y precarga el formulario con `old()`. Al guardar mediante `PUT` en `contacto.update`, se validan nombre, correo y texto antes de actualizar la tabla `mensajes` y redirigir a `/contacto`. De igual forma, el botón **Borrar** ejecuta `destroy($id)` vía `DELETE` y regresa a la lista con confirmación.

---

### C) Sección Posts (Validación Reforzada y CRUD Completo)

#### Salida de route:list --path=posts
```bash
GET|HEAD  posts ........................ posts.index › PostController@index
POST      posts ........................ posts.store › PostController@store
GET|HEAD  posts/create ................. posts.create › PostController@create
PUT       posts/{id} ................... posts.update › PostController@update
DELETE    posts/{id} ................... posts.destroy › PostController@destroy
GET|HEAD  posts/{id}/edit .............. posts.edit › PostController@edit

Showing [6] routes
```

#### Evidencia de validación, edición y borrado
* **Validación reforzada:** Título configurado con `required|string|min:5|max:120` y contenido con `required|string|min:10|max:2000`; si falla, conserva lo escrito con `old()` y muestra la alerta de errores.
* **Registro editado y borrado:** Artículo actualizado vía `PUT` en `/posts/{id}` con mensaje `Post actualizado correctamente.` y eliminado vía `DELETE` con mensaje `Post eliminado correctamente.`

#### Explicación del recorrido
Tanto al crear como al editar un artículo en `/posts/{id}/edit`, `PostController` exige que el título cumpla la longitud mínima de 5 caracteres y máxima de 120 antes de guardar. Si la validación falla, Laravel redirige de vuelta conservando los valores ingresados en los campos y mostrando los errores en pantalla. Al completar la edición o el borrado con `DELETE`, redirige a `/posts` con su alerta de éxito.