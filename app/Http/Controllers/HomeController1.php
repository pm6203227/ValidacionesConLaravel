<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController1 extends Controller{
  //<--------------------------------------------------------------------------------------------------------------------->
  //servicio 1 validators

    public function rut1Request(Request $request){
      $request -> validate([
        'name' => 'required | min:3 | max:255',           // lo que se valida es el input como "name"
        'email' => 'required | email',          //Esta parte es el area donde se realiza la validacion de datos
        'birthdate' => 'required | date',
        'date' => 'required | date',
        'gender' => 'required'
      ]);
        $name = $request->input("name");
        $email = $request->input("email");
        $birthdate = $request->input("birthdate");   //este dato tiene que ser el mismo nombre que se ingresa en el body de postman
        $Date = $request->input("date");
        $gender = $request->input("gender");


        $calc = strtotime($Date) - strtotime($birthdate);
        $edad = intval($calc/60/60/24/365.25);


        return json_encode(array(
            "El nombre ingresado al body en postman es: $name",
            "El email ingresado al body en postman es: $email",
            "La fecha de nacimiento ingresada al body en postman es: $birthdate",
            "El genero ingresado al body en postman es: $gender",
            "La edad es: $edad"
        ));
    }

    //<------------------------------------------------------------------------------------------------------------------->
    //servicio 2 request

    public function rut2Request(Request $request){
      $request -> validate([
        'name' => 'required | max:255',
        'last_name' => 'required | max:255',
        'nickname' => 'max:255',
        'age' => 'required | numeric | min:18',
        'facebook_profile' => 'required',
        'strings' => 'required',
        'numbers' => 'required'
      ]);

    $name = $request -> input("name");
    $last_name = $request -> input("last_name");
    $nickname = $request -> input("nickname");
    $age = $request -> input("age");
    $facebook_profile = $request -> input("facebook_profile");
    $strings = $request -> input("strings");
    $numbers = $request -> input("numbers");

    $count = strlen($strings);
    $numCount = strlen($numbers);

    if($nickname == false){
      $nickname=$name."_".$last_name."_".$age;    //para concatenar se utiliza el .
    }
    if ($age > 18 ){
      return json_encode(array(
          "El nombre es: $name",
          "El apellido es: $last_name",
          "El apodo es: $nickname",
          "El perfil de Facebook es: $facebook_profile",
          "La cadena de texto es: $strings",
          "Los numeros ingresados son: $numbers",
          "Las letras ingresadas al string son: $count",
          "La catidad de numeros ingresados son: $numCount"

      ));
    }elseif ($age < 18) {
      echo "la edad debe de ser mayor a 18 años";
    }
  }
  //<--------------------------------------------------------------------------------------------------------------------->
  //servicio 3 Login fake retorna los permisos Usuarios, Compra, Venta

  public function rut3Request(Request $request){ 
        $email = $request -> input("email");
        $password = $request -> input("password");
       return("Usuarios " . " Venta " . " Compra ");
    }

//<--------------------------------------------------------------------------------------------------------------------->
  //servicio 4 Login fake de ventas retorna los permisos Usuarios, Compra, Venta
  public function rut4Request(Request $request){ 
    echo "Login de ventas ";
        $email = $request -> input("email");
        $password = $request -> input("password");
       return(" Ventas ");
    }

//<--------------------------------------------------------------------------------------------------------------------->
  //servicio 5 Login fake de compras retorna los permisos Usuarios, Compra, Venta
  public function rut5Request(Request $request){ 
    echo "Login de Compras ";
        $email = $request -> input("email");
        $password = $request -> input("password");
       return(" Compra ");
    }

}
