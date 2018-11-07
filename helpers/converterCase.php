<?php
namespace helpers;

/**
*
*/
class ConverterCase
{

  //to camelCaseUpper
  public static function toCamelCaseLower ($string) {
    $charsString = str_split($string);
    $charsString[0] = strtolower($charsString[0]);

    $buffer = "";

    foreach ($charsString as $key => $char) {
      if (preg_match("/_/", $char)) {
        $charsString[$key+1] = strtoupper($charsString[$key+1]);
      } else {
        $buffer .=$char;
      }
    }

    return $buffer;
  }

  //to CamelCaseUpper
  public static function toCamelCaseUpper ($string) {
    $charsString = str_split($string);
    $charsString[0] = strtoupper($charsString[0]);

    $buffer = "";

    foreach ($charsString as $key => $char) {
      if (preg_match("/_/", $char)) {
        $charsString[$key+1] = strtoupper($charsString[$key+1]);
      } else {
        $buffer .=$char;
      }
    }

    return $buffer;
  }

  //To snake_case
  public static function toSnakeCase ($string) {
    $charsString = str_split($string);
    $charsString[0] = strtolower($charsString[0]);

    $buffer = "";

    foreach ($charsString as $key => $char) {
      if (preg_match("/[A-Z]/", $char)) {
        $char = strtolower($char);
        $buffer .= "_".$char;
      } else {
        $buffer .=$char;
      }
    }

    return $buffer;
  }

  //To plural
  public static function toPlural ($string) {
    $charsString = str_split($string);

    $buffer = "";

    foreach ($charsString as $key => $char) {

      if (preg_match("/[A-Z]|_/", $char) && $key > 0) {
<<<<<<< HEAD

=======
>>>>>>> de2e847d4007c7ede05fb6fe2a49a281d40a13a5
        $lastChar = substr($buffer, -1);

        switch ($lastChar) {
          case "y":
            if ( $key > 0)
              $buffer = substr($buffer, 0, -1)."ies".$char;
            break;
          case "s":
            if ( $key > 0)
              $buffer = substr($buffer, 0, -1)."es".$char;
            break;
          case "x":
            $buffer .= $char;
            break;
          case "_":
            $buffer .= $char;
<<<<<<< HEAD
          break;
=======
            break;
>>>>>>> de2e847d4007c7ede05fb6fe2a49a281d40a13a5
          default:
            $buffer .= "s".$char;
            break;
        }
      } else {
        $buffer .= $char;
      }
    }

    $lastChar = substr($buffer, -1);

    switch ($lastChar) {
      case "y":
        $buffer = substr($buffer, 0, -1)."ies";
        break;
      case "s":
        $buffer = substr($buffer, 0, -1)."es";
        break;
      case "x":
        $buffer .= $char;
        break;
      default:
        $buffer .= "s";
        break;
    }

    return $buffer;
  }

}
