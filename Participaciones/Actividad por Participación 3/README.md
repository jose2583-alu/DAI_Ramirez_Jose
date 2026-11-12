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
Al ingresar a la URL `/categorias`, Laravel busca la coincidencia registrada en `routes/web.php` y dirige la solicitud al controlador `CategoriaController`. El método `index()` llama al modelo `Categoria` mediante Eloquent para obtener las categorías de la base de datos y retora los datos serializados en JSON directamente al navegador.

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