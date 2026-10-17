<?php
/**
 * Prueba: Conversión de números romanos a decimal
 *
 * Enunciado:
 * Implementa una función en PHP llamada romanToDecimal que reciba como único
 * parámetro una cadena de texto representando un número romano válido y retorne
 * su equivalente en número decimal (entero).
 *
 * La función debe cumplir lo siguiente:
 *
 * - Recibir un string con el número romano.
 * - Retornar un entero con el valor decimal correspondiente.
 * - Manejar correctamente los casos de notación sustractiva y aditiva propios
 *   del sistema de numeración romana.
 * - No se permiten librerías externas ni funciones de conversión predefinidas
 *   del lenguaje para esta tarea. Debes implementar la lógica tú mismo.
 *.
 */

  /*
  Hint:   
    • I = 1
    • V = 5
    • X = 10
    • L = 50
    • C = 100
    • D = 500
    • M = 1,000
  */

  function romanToDecimal (string $roman){
    $romanToDecimalMap = [
      "I" => 1,
      "V" => 5,
      "X" => 10,
      "L" => 50,
      "C" => 100,
      "D" => 500,
      "M" => 1000
    ];

    $result = 0;
    
    for ($char = 0; $char < strlen($roman) ; $char++){

      if (!isset($romanToDecimalMap[$roman[$char]])){
      echo "Error de entrada, " . '"'. $roman .'"' . " contiene carácter no válido";
        exit;
      }
      // Número anterior en decimal
      if ($char-1 >= 0){
        $lastRomanInDecimal = $romanToDecimalMap[$roman[$char-1]];
      }

      // Número actual en decimal
      $romanInDecimal = $romanToDecimalMap[$roman[$char]];

      if (isset($lastRomanInDecimal) && $lastRomanInDecimal < $romanInDecimal){
        $temp = - 2 * $lastRomanInDecimal + $romanInDecimal;
        $romanInDecimal = $temp;
      }
      
      // Sumamos al resultado
      $result = $result + $romanInDecimal;
    }

    echo $roman . " => " . $result . "\n";
  }

  //Pruebas
  romanToDecimal("I");          // 1
  romanToDecimal("II");         // 2
  romanToDecimal("III");        // 3
  romanToDecimal("IV");         // 4
  romanToDecimal("V");          // 5
  romanToDecimal("VI");         // 6
  romanToDecimal("IX");         // 9
  romanToDecimal("X");          // 10
  romanToDecimal("XIV");        // 14
  romanToDecimal("XIX");        // 19
  romanToDecimal("XX");         // 20
  romanToDecimal("XXVII");      // 27
  romanToDecimal("XL");         // 40
  romanToDecimal("XLIV");       // 44
  romanToDecimal("L");          // 50
  romanToDecimal("XC");         // 90
  romanToDecimal("XCIX");       // 99
  romanToDecimal("C");          // 100
  romanToDecimal("CD");         // 400
  romanToDecimal("CDXLIV");     // 444
  romanToDecimal("D");          // 500
  romanToDecimal("CM");         // 900
  romanToDecimal("M");          // 1000
  romanToDecimal("MCMXC");      // 1990
  romanToDecimal("MMXXIII");    // 2023
  romanToDecimal("MMMCMXCIX");  // 3999

?>