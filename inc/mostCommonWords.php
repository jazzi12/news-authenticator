<?php
function mostCommonWords($extract){
    $extract = str_replace(array('.', ',', ';', ':'), ' ' , $extract);
    $filterWords = trim( preg_replace(
        "/[^a-z0-9']+([a-z0-9']{1,3}[^a-z0-9']+)*/i",
        " ",
        $extract
    ) );

    $cloud = explode(' ', $filterWords);
    $cloud = array_filter(array_map('trim', $cloud));
    $cloud = array_filter(array_map('strtolower', $cloud));

    $cloud = array_count_values($cloud);
    arsort($cloud);
    $i = 0;
    $mostCommonHtml = '';
    foreach($cloud as $word => $num){
        
        $mostCommonHtml .= '<li class="list-group-item list-styles">';
        $mostCommonHtml .= $word;
        $mostCommonHtml .= '<span class="badge badge-pill badge-success my-badge">'.$num.'</span>';
        $mostCommonHtml .= '</li>';

        if(++$i === 10) break;
    }

    return $mostCommonHtml;
}                    