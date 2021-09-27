<?php

function printArray($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function dateTimeFormat($date, $format = 'd-m-Y h:s A')
{
    $date_time = $date->format($format);
    return $date_time;
}


function dateFormat($data_time, $format = 'd-m-Y h:s A')
{
    $format_date = null;
    if ($data_time) {
        $format_date = date($format, strtotime($data_time));
    }
    return $format_date;
}

// Get random file name
function getRandomFileName($file, $id = null, $extension = null)
{
    $fileName = '';
    $strippedName = str_replace(' ', '', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . rand(11111, 99999);
    if (!$extension) {
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
    }
    // - MD5 of Image original name + id(user Or post id) (_) timestamp
    $fileName = md5($strippedName) . trim($id) . '_' . time() . '.' . strtolower($extension ? $extension : explode("/", $file->getmimeType())[1]);

    return $fileName;
}

// Get storage URL based on disk storage
function storage_url($file = '', $disk = '')
{
    $url = '';
    if (!$disk) {
        $url = url(Storage::url($file));
    } else {
        $url = url(Storage::disk($disk)->url($file));
    }
    return $url;
}
