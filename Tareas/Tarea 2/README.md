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