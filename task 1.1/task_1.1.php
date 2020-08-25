<?php
function convertFullName($string)
{
    $result = preg_replace('~^(\S+)\s+(\S)\S+\s+(\S)\S+$~u', '$1 $2.$3.', $string);
    return $result;
}
echo convertFullName('Иванов Иван Иванович');
?>
