<?php 
require_once ('./inc/wikipediaQuery.php'); 
require_once ('./inc/mostCommonWords.php'); 
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

<title>News Authenticator</title>
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
        <a class="navbar-brand" href="index.php">News Authenticator 23</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="./tests/tests.php">Tests</a></li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-8">
            <form id="wikipediaSearchForm">
            <div class="form-group">
                <label for="exampleInputEmail1">Search Wikipedia</label>
                <input type="text" class="form-control" id="mySearch" aria-describedby="emailHelp" placeholder="search...">
                <small id="emailHelp" class="form-text text-muted">Enter your search query.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <?php
            $queryresponseult = wikipediaQuery('information'); 
            $myKey = key($queryresponseult['query']['pages']);
            $extract = $queryresponseult['query']['pages'][$myKey]['extract'];
            $title = $queryresponseult['query']['pages'][$myKey]['title'];
            
            echo '<h3 class="mainTitle">Title: '.$title.'</h3>';
            echo '<p class="mainExtract"><b>Extract:</b> '.$extract.'</p>'; ?>
            <h4><a href="https://www.wikipedia.org/">All content comes from Wikipedia</a></h4>
        </div>
        
        <div class="col-md-4">
            <h3>Most Common Words:</h3>
            <ul class="list-group common-words-container">
                <?php echo mostCommonWords($extract) ;?>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3>Authenticity Progress:</h3>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                40%
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>So far <span class="number-authenticate">2</span> journalists have authenticated this article</h4>
            <button type="button" class="btn btn-success btn-authenticate">Authenticate</button>
            <button type="button" style="display:none;" class="btn btn-success btn-authenticate-2">Thank you!</button>
        </div>
    </div>
    <hr>
</div>

<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Get started</h5>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </div>
            <div class="col-sm-3 info">
                <h5>Information</h5>
                <p><a href="https://www.wikipedia.org/">Wikipedia</a></p>
            </div>
        </div>
    </div>
    <div class="second-bar">
        <div class="container">
            <h2 class="logo"><a href="index.php"> News Authenticator </a></h2>
            <div class="social-icons">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>
</footer>

<script>

$('.btn-authenticate').on('click', function(){
    var increase = 60;
    var progressBar = $('.progress-bar');
    $(progressBar).css('width', increase+'%').attr('aria-valuenow', increase); 
    $(progressBar).html(increase + '%');
    $(this).hide();
    $('.btn-authenticate-2').css('display', 'block');
    var number = Number($('.number-authenticate').html());
    $('.number-authenticate').html(number + 1);
    
})

$('#wikipediaSearchForm').submit(function(e){
    e.preventDefault();
    var searchValue = $('#mySearch').val();

    $.ajax({
        type: 'GET',
        url: 'inc/ajaxWikipediaCall.php',
        data: {searchValue: searchValue},
        success: function(response){
            $('.mainTitle').html('Title: ' + response.title)
            $('.mainExtract').html('<b>Extract:</b> ' + response.extract);
            $('.common-words-container').html(response.mostCommonWords);
        },
        error: function(response){
        },
        dataType: 'json'
    });
})       

</script>
</body>
</html>