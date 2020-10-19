<?php
/**
 * Tranforma o texto em uma url amigável
 * @param string $string
 * @return string
 */
function str_slug(string $string): string 
{
   $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
   $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
   $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

   $remove_accents = function(string $string) use ($formats, $replace) {
      return trim(strtr(utf8_decode($string), utf8_decode($formats), $replace));
   };

   $replace_traces = function(string $string) {
      $arrWords = array_filter((explode(" ", $string)));
      return implode("-", $arrWords);
   };

   $slug = $replace_traces( $remove_accents($string) );

   return $slug;
}
