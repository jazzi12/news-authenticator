<?php
require_once ('./wikipediaQuery.php');
require_once ('./mostCommonWords.php'); 

$results = [];

if(!isset($_GET['searchValue'])) die();
$searchValue = $_GET['searchValue'];

$wikiResults = wikipediaQuery($searchValue);
$pageId = key($wikiResults['query']['pages']);
$extract = $wikiResults['query']['pages'][$pageId]['extract'];

$results['mostCommonWords'] = mostCommonWords($extract);
$results['title'] = $wikiResults['query']['pages'][$pageId]['title'];
$results['extract'] = $extract;

echo json_encode($results);