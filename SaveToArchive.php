<?php


namespace SaveToArchive;

class SaveToArchive
{
  public static function onLinkerMakeExternalLink($url, $text, &$link, array &$attribs, $linktype)
  {
      
    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "https://web.archive.org/save/".$url);
    curl_setopt($ch, CURLOPT_FILETIME, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    return true;
  }
}
