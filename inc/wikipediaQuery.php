<?php
function wikipediaQuery($searchValue){
    $searchValue = str_replace(' ', '_', ucwords(trim(strtolower(htmlentities($searchValue, ENT_QUOTES)))));
    $url = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$searchValue.'';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'MyBot/1.0 (http://www.mysite.com/)');
    
    $result = curl_exec($ch);
    
    if (!$result) {
      exit('cURL Query Error: '.curl_error($ch));
    }
    
    $queryResult = json_decode($result, true);
    return $queryResult;
}