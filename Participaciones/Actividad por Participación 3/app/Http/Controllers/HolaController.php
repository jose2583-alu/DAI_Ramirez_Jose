<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function saludoSimple()
    {
        return '¡Hola bienvenido !';
    }
    public function saludoConNombre($nombre)
    {
        return '¡Hola, ' . $nombre . '!';
    }
    public function saludoConNombreApellido($nombre, $apellido)
    {
        return '¡Hola, ' . $nombre . ' ' . $apellido . '!';
    }
    public function saludoConNombreApellidoEdad($nombre, $apellido, $edad)
    {
        return '¡Hola, ' . $nombre . ' ' . $apellido . ', tienes ' . $edad . ' años!';
    }
    public function calcularIMC($peso, $altura, $nombre){
    $imc = $peso / ($altura * $altura);
    return '¡Hola, ' . $nombre . '! Tu IMC es: ' . $imc;
}
}
