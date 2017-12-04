<?php 
require_once('../simpletest/autorun.php');
require_once('../inc/wikipediaQuery.php');
require_once('../inc/mostCommonWords.php');
        
class WikipediaQueryTest extends UnitTestCase {
    function testIfWikipediaQueryWasSuccessful() {
        $this->assertTrue(wikipediaQuery('michael jordan'));
        echo 'Wikipedia query was successful</br></br>';
    }
    
    function testIfMostCommonWordsFunctionReturnedData() {
        $this->assertTrue(mostCommonWords('News Authenticator connects to Wikipedia’s API and fetches the data
        from keyword(s) chosen by the user. In this particular example I have chosen to connect to Wikipedia’s
        API because it hosts millions of articles from many different fields so that most searches will
        fetch requested information.'));

        echo 'mostCommonWords function returned data</br></br>';
    }
}