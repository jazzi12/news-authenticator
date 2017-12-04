<?php 
require_once('../simpletest/autorun.php');
require_once('../inc/wikipediaQuery.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/script.js"></script>

<title></title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">News Authenticator</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="./tests/tests.php">Tests</a></li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-8">
        <?php
        
        
                    class WikipediaQueryTest extends UnitTestCase {
                        function testIfQueryWasSuccessful() {
                            // @unlink('/temp/test.log');
                            // $log = new Log('/temp/test.log');
        
                            //wikipediaQuery('blue');
        
                            if($this->assertFalse(checkTwo() !== 2)){
                                //echo 'Query was not successful';
                                //return checkTwo();
                            }
                            
                        if($this->assertTrue(checkTwo() === 3)){
                            echo 'Query was successful';
                        }
                        }
                    }
                    ?>
        </div>
    </div>
    <hr>
</div>