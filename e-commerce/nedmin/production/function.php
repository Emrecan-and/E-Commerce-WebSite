<?php

function seo_friendly_url($url) {
    // Türkçe karakterleri değiştir
    $url = str_replace(array('ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ş', 'Ş', 'ö', 'Ö', 'ç', 'Ç'), array('i', 'i', 'g', 'g', 'u', 'u', 's', 's', 'o', 'o', 'c', 'c'), $url);
    
    // Diğer karakterleri değiştir
    $url = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $url);
    $url = strtolower(trim($url, '-'));
    $url = preg_replace("/[\/_|+ -]+/", '-', $url);
  
    return $url;
 }
 


?>