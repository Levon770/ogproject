<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @return string
 */
function smarty_modifier_truncate($string, $length = 80, $etc = '...',
                                  $break_words = false, $calc_etc_length = true)
{
    if ($length == 0)
        return '';

    if (mb_strlen($string) > $length) {
        $length -= ($calc_etc_length===true ? mb_strlen($etc) : $calc_etc_length);
        if (!$break_words)
            $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length+1));
      
        return mb_substr($string, 0, $length).$etc;
    } else
        return $string;
}

/* vim: set expandtab: */

?>
