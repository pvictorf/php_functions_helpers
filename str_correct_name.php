<?php
/**
 * Corrige um nome ignorando as palavras (da, de, do, dos) por padrão
 *
 * @param string $value
 * @param array $ignore
 * @return string
 */
function str_correct_name(string $value, array $ignore = ['da', 'de', 'do', 'dos']): string {
   $words = explode(" ", filter_var(mb_strtolower(trim($value)), FILTER_SANITIZE_STRIPPED));

   $correctedName = array_map(function($name) use($ignore) {
      return (in_array($name, $ignore)) ? $name : ucfirst($name);
   }, $words);

   return implode(" ", $correctedName);
}
