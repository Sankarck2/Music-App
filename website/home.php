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
    
    <link rel="stylesheet" href="css/home.css"/>
    <script type="text/javascript" src="js/home.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="wrapper">
    <header>
        <div class="header-container">
            <div class="header-image"></div>
            <div class="nav-bar">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="home.php" >Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?data=2020">Tamil 2020 Movies</a>
                        </li>
                      
                        <li class="nav-item">
                          <a class="nav-link " href="index.php?data=umovies" tabindex="-1" aria-disabled="true">Upcoming Movies</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="index.php?data=recent" tabhome="-1" aria-disabled="true">Recent Updates</a>
                          </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0" method="POST" action="home.php?data=search" >
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
            </div>
        </div>
        <div class="container alphabet-list">
        </div>
        <div class="showSelected">
            
        </div>
    </header>
    <section class="main">
      <div class="song-section">
      <?php
	 if($_REQUEST['data']=="2020"){
		
		$result = mysqli_query($db,"SELECT * FROM song_details where date like '%2020%'" );

      while($row = mysqli_fetch_array($result))
      {
      echo "<div class='card'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $row['song_name'] . "</h4>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div>";
      }
      mysqli_close($con);
        }
		
	
		
		 else if($_REQUEST['data']=="year"){
		
		$result = mysqli_query($db,"SELECT * FROM song_details where date like '%".$_REQUEST['id']."%'" );

      while($row = mysqli_fetch_array($result))
      {
      echo "<div class='card'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $row['song_name'] . "</h4>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div>";
      }
      mysqli_close($con);
        }
        else if($_REQUEST['data']=="alpha"){
          $result = mysqli_query($db,"SELECT * FROM song_details where movie_name like '".$_REQUEST['id']."%'");

      while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $row['song_name'] . "</h4>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div>";


      }


      mysqli_close($con);
          
        }
        
        else if($_REQUEST['data']=="search"){
          
          $result = mysqli_query($db,"SELECT * FROM song_details where movie_name like '%".$_POST['search']."%'");

      while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $row['song_name'] . "</h4>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div>";


      }


      mysqli_close($con);
          
        }
        
        else if($_REQUEST['data']=="umovies"){
          
          $result = mysqli_query($db,"SELECT * FROM song_details ORDER BY date desc" );

      while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $row['song_name'] . "</h4>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div>";


      }
      mysqli_close($con);
        }
        else if($_REQUEST['data']=="recent"){
          
          $result = mysqli_query($db,"SELECT * FROM song_details order by id desc" );

      while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $row['song_name'] . "</h4>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div>";


      }


      mysqli_close($con);
          
        }
        
        else{
          
      $result = mysqli_query($db,"SELECT distinct movie_name,artist_name,movie_name,thumb_img,id FROM song_details ORDER BY date desc" );

      while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['id']."'>";

     

	
	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result = $db->query($sql);



$coursedata1 = $result->fetch_assoc();

 echo " <img src=../". $coursedata1['img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


      }


      mysqli_close($con);
          
        }
        ?>
    <!-- </div><div class="card">
      <img src="./assets/img/sample.jpg" alt="" height='150px' width='180px'>
      <h4>fsadfs</h4>
      <p>sdfsf</p>
    </div> -->
    </div>
        <div class="hitlist">
          <div class="hits"><h4>Tamil Yearly Hits</h4>
		  
		  <?php
		      $result = mysqli_query($db,"SELECT * FROM year ORDER BY id desc" );

     $row =mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	      if(mysqli_num_rows($result)<6){
			
	 for($i=0;$i<mysqli_num_rows($result);$i++)
      {
		  
        echo "<p>";
      echo "<a href='index.php?data=year&id=".$row[$i]['year']."'>Tamil". $row[$i]['year'] ."Movies</a></br>";
      echo "</p>";

	

      }
	   echo "<a href='index.php?data=myear' id='more'>More..</a>";
		  }else{
		  for($i=0;$i<=6;$i++)
      {
		  
        echo "<p>";

       echo "<a href='index.php?data=year&id=".$row[$i]['year']."'>Tamil". $row[$i]['year'] ."Movies</a></br>";
       echo "</p>";

	

      }
		    echo "<a href='index.php?data=myear' id='more'>More..</a>";
		  
	  }
		  
		  ?>
		
		  
		  </div>
          <div class="hits"><h4>Music Director Hits</h4>
		    <?php
		      $result1 = mysqli_query($db,"SELECT * FROM music_directors ORDER BY name desc" );

     $row1 =mysqli_fetch_all($result1, MYSQLI_ASSOC);
		
	  
	      if(mysqli_num_rows($result1)<6){
	  for($j=0;$j<mysqli_num_rows($result1);$j++)
      {
		  
        echo "<p>";

      echo "<a href='index.php?data=artist&id=".$row1[$j]['id']."'>". $row1[$j]['name'] ."</a></br>";
      echo "</p>";

	

      }
	   echo "<a href='index.php?data=allartist' id='more'>More..</a>";
		  }else{
		  for($j=0;$j<=6;$j++)
      {
		  
        echo "<p>";

         echo "<a href='index.php?data=artist&id=".$row1[$j]['id']."'>". $row1[$j]['name'] ."</a></br>";
         echo "</p>";


      }
		    echo "<a href='index.php?data=allartist' id='more'>More..</a>";
		  
	  }
		  
		  ?>
		
		  
		  </div>
          <div class="hits"><h4>Tamil Actors Hits</h4>
		  
		   <?php
		      $result = mysqli_query($db,"SELECT * FROM actor ORDER BY id desc" );

     $row =mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	      if(mysqli_num_rows($result)<6){
			
	 for($i=0;$i<mysqli_num_rows($result1);$i++)
      {
		  
        echo "<p>";

      echo "<a href='index.php?data=actor&id=".$row[$i]['id']."'>". $row[$i]['name'] ."</a></br>";
      echo "</p>";

	

      }
	   echo "<a href='index.php?data=nactor' id='more'>More..</a>";
		  }else{
		  for($i=0;$i<=6;$i++)
      {
		  
        echo "<p>";

       echo "<a href='index.php?data=actor&id=".$row[$i]['id']."'>". $row[$i]['name'] ."</a></br>";
 
       echo "</p>";


      }
		    echo "<a href='index.php?data=nactor' id='more'>More..</a>";
		  
	  }
		  
		  ?>
		
		  </div>
      <div class="hits"><h4>Tamil Singers Hits</h4>
		  
		   <?php
		      $result = mysqli_query($db,"SELECT * FROM singer ORDER BY id desc" );

     $row =mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	      if(mysqli_num_rows($result)<6){
			
	 for($i=0;$i<mysqli_num_rows($result);$i++)
      {
		  
        echo "<p>";

      echo "<a href='index.php?data=singer&id=".$row[$i]['id']."'>". $row[$i]['name'] ."</a></br>";
      echo "<//p>";

	

      }
	   echo "<a href='index.php?data=nsinger' id='more'>More..</a>";
		  }else{
		  for($i=0;$i<=6;$i++)
      {
		  
        echo "<p>";

       echo "<a href='index.php?data=singer&id=".$row[$i]['id']."'>". $row[$i]['name'] ."</a></br>";
 
       echo "</p>";


      }
		    echo "<a href='index.php?data=nsinger' id='more'>More..</a>";
		  
	  }
		  
		  ?>
		  </div>
          <div class="hits"><h4>Special Collection</h4>
		   <?php
		      $result = mysqli_query($db,"SELECT DISTINCT genre FROM song_details ORDER BY id desc" );

     $row =mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	      if(mysqli_num_rows($result)<6){
			
	 for($i=0;$i<count($row);$i++)
      {
		  
        echo "<p>";

      echo "<a href='index.php?data=song&id=".$row[$i]['id']."'>". $row[$i]['genre'] ."Songs</a></br>";
      echo "</p>";

	

      }
	   echo "<a href='index.php?data=nsong' id='more'>More..</a>";
		  }else{
		  for($i=0;$i<=6;$i++)
      {
		  
        echo "<p>";

       echo "<a href='index.php?data=song&id=".$row[$i]['id']."'>". $row[$i]['genre'] ."Songs</a></br>";
 
       echo "</p>";


      }
		    echo "<a href='index.php?data=nsong' id='more'>More..</a>";
		  
	  }
		  
		  ?>
		  
		  </div>
        </div>
      
    </section>
        <footer class="footer">
          All Rights Reserved
          </footer>
    </div>
        
</body>
</html>