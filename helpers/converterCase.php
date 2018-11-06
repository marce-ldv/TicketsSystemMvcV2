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
    $charsString[0] = strtolower($charsString[0]);

    $buffer = "";

    foreach ($charsString as $key => $char) {
      if (preg_match("/[A-Z]|_/", $char)) {
        $buffer .= "s".$char;
      } else {
        $buffer .=$char;
      }
    }

    return $buffer."s";
  }
}
