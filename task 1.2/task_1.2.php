<?php

function getItemsFromDate($date)
{
    $date = strtotime($date);
    $filename = __DIR__ . "/data.json";
    $result = [];
    if (file_exists($filename))
        $json_decode = json_decode (file_get_contents ($filename), true);
        foreach ($json_decode as $obj) {
            $datetime = strtotime($obj['created']);
            $date_diff = $date - $datetime;
            if ($date_diff <= 0) {
                $result[] = $obj;
            }
        }
    return $result;
}

echo "<pre>";
print_r( getItemsFromDate("20.01.2020 12:00:00") );
echo "</pre>";