<?php
function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
}
