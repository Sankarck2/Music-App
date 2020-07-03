<!DOCTYPE html>


				  <?php
				  
			
require_once "config/config.php";





?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/songlist.css"/>
    <script type="text/javascript" src="songlist.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="wrapper">
    <header>
        <div class="header-container">
            <div class="header-image"></div>
            <div class="nav-bar">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" >Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?data=2020">Tamil 2020 Movies</a>
                        </li>
                      
                        <li class="nav-item">
                          <a class="nav-link " href="index.php?data=umovies" tabindex="-1" aria-disabled="true">Upcoming Movies</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="index.php?data=recent" tabindex="-1" aria-disabled="true">Recent Updates</a>
                          </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?data=search" >
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
            </div>
        </div>
        <div class="container alphabet-list">
        </div>
    </header>
    <section class="main">
      <div class="tab1">
          <div class="completeDetails">
            <h3>MOVIE NAME</h3>
            <img src="./asset/img/sample.jpg" alt="" />
            <div class="alldetails">
                <p>starring0 : aaaa</p>
                <p>starring1 : aaaa</p>
                <p>starring2 : aaaa</p>
                <p>starring3 : aaaa</p>
                <p>starring4 : aaaa</p>
                <p>starring5 : aaaa</p>
                <p>starring6 : aaaa</p>
            </div>
          </div>
          <div class="downloadDetails">
              <div class="songDetails">
                  <h4>Song Name</h4>
                  <p>Artist :  artist name</p>
                  <p>Duration :  5:00 min</p>
                  <p>Lyrics :  David</p>
              </div>
              <div class="downloadbuttons">
                  <button>Download 128kbs</button>
                  <button>Download 320kbs</button>
              </div>
          </div>
          <div class="disclaimer"></div>
      </div>
        <div class="tab2">
          <div class="hits">Share on social media</div>
          <div class="hits">Related Movies</div>
          <div class="hits">Latest Movies</div>
          <div class="hits">Top Albums</div>
        </div>
      
    </section>
    <div class="Relatedmovies">
        <h4>Related Movies</h4>
        <div class="moviecard">
                <img src="" alt="" height='10px' width='10px'>
            <div class="tab3">
                <p>Movie Name</p>
                <p>Artist Name</p>
            </div>
        </div>  
    </div>
        <footer class="footer">
          All Rights Reserved
          </footer>
    </div>
        
</body>
</html>