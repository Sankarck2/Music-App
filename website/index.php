<!DOCTYPE html>


				  <?php
				  
			
require_once "config/config.php";





?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="jquery.easyPaginate.js"></script>

    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/index.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="wrapper">
    <header>
        <div class="header-container">
            <div class="header-image"></div>
            <div class="nav-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="home.php"></i>Home <span class="sr-only">(current)</span></a>
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
        <div class="showSelected">
            
        </div>
    </header>
    <section class="main">
    <?php
	 if($_REQUEST['data']=="2020"){
		

  $result = mysqli_query($db,"SELECT distinct movie_name,artist_name FROM song_details where date like '%2020%'");
  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['movie_name']."'>";

   
	  
	  $sql1 = "SELECT * FROM movie where id=". $row['movie_name'];
$result1 = $db->query($sql1);



$coursedata1 = $result1->fetch_assoc();
   echo " <img src=../". $coursedata1['img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql2 = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result2 = $db->query($sql2);



$coursedata = $result2->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="year"){
		
	

$result = mysqli_query($db,"SELECT distinct movie_name,artist_name FROM song_details where date like '%".$_REQUEST['id']."%'");
  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['movie_name']."'>";

     
	  $sql1 = "SELECT * FROM movie where id=". $row['movie_name'];
$result1 = $db->query($sql1);



$coursedata1 = $result1->fetch_assoc();
 echo " <img src=../". $coursedata1['img'] ."  height='150px' width='180px'>";
	  

      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result2 = $db->query($sql);



$coursedata = $result2->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }
      mysqli_close($con);
        }
	else if($_REQUEST['data']=="alpha"){
	
$result = mysqli_query($db,"SELECT * from movie where name like '".$_REQUEST['id']."%'");
 	
		
//$result = mysqli_query($db,"SELECT distinct sd.movie_name,sd.artist_name,sd.thumb_img,sd.id FROM song_details sd inner join movie m on m.id=sd.movie_name where m.name like '".$_REQUEST['id']."%'");
  
 
  while($row = mysqli_fetch_array($result))
      {
        
        	  $sql = "SELECT distinct movie_name,artist_name,id FROM song_details where movie_name=". $row['id'];
$result2 = $db->query($sql);



$coursedata1 = $result2->fetch_assoc();

      echo "<div class='card'><a href='songlist.php?data=album&id=".$coursedata1['id']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
	  

       echo "<h4>" . $row['name'] . "</h4>";
	
	
	 $sql1 = "SELECT * FROM music_directors where id=". $coursedata1['artist_name'];
	 

$result1 = $db->query($sql1);



$coursedata = $result1->fetch_assoc();
      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }

mysqli_close($con);
		
	}
	
	else if($_REQUEST['data']=="search"){
		
	
		
		
$result = mysqli_query($db,"SELECT * from movie where name like '".$_POST['search']."%'");
 	
		
//$result = mysqli_query($db,"SELECT distinct sd.movie_name,sd.artist_name,sd.thumb_img,sd.id FROM song_details sd inner join movie m on m.id=sd.movie_name where m.name like '".$_REQUEST['id']."%'");
  
 
  while($row = mysqli_fetch_array($result))
      {
        
        	  $sql = "SELECT distinct movie_name,artist_name FROM song_details where movie_name=". $row['id'];
$result2 = $db->query($sql);



$coursedata1 = $result2->fetch_assoc();

      echo "<div class='card'><a href='songlist.php?data=album&id=".$coursedata1['movie_name']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
	  

       echo "<h4>" . $row['name'] . "</h4>";
	
	
	 $sql1 = "SELECT * FROM music_directors where id=". $coursedata1['artist_name'];
	 

$result1 = $db->query($sql1);



$coursedata = $result1->fetch_assoc();
      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }

mysqli_close($con);
		
	}
	
	else if($_REQUEST['data']=="search"){
		
	
$result = mysqli_query($db,"SELECT distinct movie_name,artist_name,movie_name,thumb_img,id FROM song_details where date like '%".$_POST['search']."%'");
  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['id']."'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result = $db->query($sql);



$coursedata1 = $result->fetch_assoc();

      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }
mysqli_close($con);
		
	}
	
	else if($_REQUEST['data']=="umovies"){
		
  $result = mysqli_query($db,"SELECT distinct movie_name,artist_name FROM song_details ORDER BY date desc");

  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['movie_name']."'>";


	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result1 = $db->query($sql);



$coursedata1 = $result1->fetch_assoc();
      echo " <img src='../". $coursedata1['img'] ."'  height='150px' width='180px'>";
      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql1 = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result2= $db->query($sql1);



$coursedata = $result2->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="recent"){
		
$result = mysqli_query($db,"SELECT distinct movie_name,artist_name FROM song_details order by id desc");

  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['movie_name']."'>";

    
	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result1 = $db->query($sql);



$coursedata1 = $result1->fetch_assoc();
  echo " <img src=../". $coursedata1['img'] ."  height='150px' width='180px'>";
      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql1 = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result2 = $db->query($sql1);



$coursedata = $result2->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }

mysqli_close($con);
		
	}else if($_REQUEST['data']=="myear"){
		
		$result = mysqli_query($db,"SELECT * FROM year order by year desc" );

  while($row = mysqli_fetch_array($result))
      {
        
	
        
      echo "<div class='card'><a href='index.php?data=year&id=".$row['year']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
	  
	
      echo "<h4>" . $row['year'] . "</h4>";
	 
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}else if($_REQUEST['data']=="allartist"){
		
		$result = mysqli_query($db,"SELECT * FROM music_directors order by id desc" );

  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='index.php?data=artist&id=".$row['id']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
	  
	 

      echo "<h4>" . $row['name'] . "</h4>";
	
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="artist"){
	

  $sql = "SELECT * FROM music_directors where id=". $_REQUEST['id'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();

	  echo "<div class='completeDetails'>
		 <img src=../". $coursedata['img'] ." >
		
            <div class='alldetails'>
              <table>";
			 
					$result5 = mysqli_query($db,"SELECT * FROM song_details where artist_name=". $coursedata['id'] );

		
 
$row1 = mysqli_fetch_array($result5);

			  echo"
                <tr><td><b>Music Director</b> :  ".$coursedata['name']."</td></tr>        
    
               ";

		$mo = mysqli_query($db,"SELECT Distinct movie_name from song_details where artist_name=".$coursedata['id']);
		
		

   echo"
                     
  <tr><td><b>Total Movies</b> :  ". mysqli_num_rows($mo)."</td></tr>  ";   

	$so = mysqli_query($db,"SELECT  song_name from song_details where artist_name=".$coursedata['id']);
		
		

   echo"
                     
  <tr><td><b>Total Song</b> :  ". mysqli_num_rows($so)."</td></tr> 

  <tr><td><b>Year of Movies</b> :  ".$coursedata['name']."</td></tr>     
  <tr><td><b>Language</b> :  Tamil</td></tr>              
  <tr><td><b>Quality</b> :   Oriiginal Quality Songs</td></tr>     
  <tr><td><b>Songs Bitrates</b> : 64kbps & 320kbps</td></tr>       ";   

$result1 = mysqli_query($db,"SELECT distinct movie_name,artist_name FROM song_details where artist_name=".$_REQUEST['id']);

 while($row = mysqli_fetch_array($result1 ))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['movie_name']."'>";

  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result1 = $db->query($sql);



$coursedata1 = $result1->fetch_assoc();
    echo " <img src=../". $coursedata1['img'] ."  height='150px' width='180px'>";
	  
      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql1 = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result2 = $db->query($sql1);



$coursedata2 = $result2->fetch_assoc();

      echo "<p>". $coursedata2['name'] ."</p>";
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="nactor"){
		
		$result = mysqli_query($db,"SELECT * FROM actor order by id desc" );

  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='index.php?data=actor&id=".$row['id']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
	  
	 

      echo "<h4>" . $row['name'] . "</h4>";
	
      echo " </div></a>";
  }


mysqli_close($con);
		
	}

	
	else if($_REQUEST['data']=="actor"){
		
	
  $sql = "SELECT * FROM actor where id=". $_REQUEST['id'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();

	  echo "<div class='completeDetails'>
		 <img src=../". $coursedata['img'] ." >
		
            <div class='alldetails'>
              <table>";
			 
					$result5 = mysqli_query($db,"SELECT * FROM song_details where actor=". $coursedata['id'] );

		
 
$row1 = mysqli_fetch_array($result5);

			  echo"
                <tr><td><b>Music Director</b> :  ".$coursedata['name']."</td></tr>        
    
               ";

		$mo = mysqli_query($db,"SELECT Distinct movie_name from song_details where actor=".$coursedata['id']);
		
		

   echo"
                     
  <tr><td><b>Total Movies</b> :  ". mysqli_num_rows($mo)."</td></tr>  ";   

	$so = mysqli_query($db,"SELECT  song_name from song_details where artist_name=".$coursedata['id']);
		
		

   echo"
                     
  <tr><td><b>Total Song</b> :  ". mysqli_num_rows($so)."</td></tr> 

  <tr><td><b>Year of Movies</b> :  ".$coursedata['name']."</td></tr>     
  <tr><td><b>Language</b> :  Tamil</td></tr>              
  <tr><td><b>Quality</b> :   Oriiginal Quality Songs</td></tr>     
  <tr><td><b>Songs Bitrates</b> : 64kbps & 320kbps</td></tr>       ";   

$result1 = mysqli_query($db,"SELECT distinct movie_name,artist_name FROM song_details where artist_name=".$_REQUEST['id']);

 while($row = mysqli_fetch_array($result1 ))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['movie_name']."'>";

  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result1 = $db->query($sql);



$coursedata1 = $result1->fetch_assoc();
    echo " <img src=../". $coursedata1['img'] ."  height='150px' width='180px'>";
	  
      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql1 = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result2 = $db->query($sql1);



$coursedata2 = $result2->fetch_assoc();

      echo "<p>". $coursedata2['name'] ."</p>";
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="singer"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT * FROM singer where id=".$_REQUEST['id'] );
$result = mysqli_query($db,"SELECT distinct movie_name,artist_name,movie_name,thumb_img,id FROM song_details where date like '%".$_REQUEST['id']."%'");
  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['id']."'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result = $db->query($sql);




$coursedata1 = $result->fetch_assoc();

      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
	
		else if($_REQUEST['data']=="nsinger"){
		

		
		$result = mysqli_query($db,"SELECT * FROM singer " );

  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='specificsinger.php?id=".$row['id']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";


      echo "<h4>" . $row['name'] . "</h4>";

      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
		else if($_REQUEST['data']=="song"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT distinct movie_name,artist_name,movie_name,thumb_img,id FROM song_details where date like '%".$_REQUEST['id']."%'");
  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['id']."'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result = $db->query($sql);



$coursedata1 = $result->fetch_assoc();

      echo "<h4>" . $coursedata1['name'] . "</h4>";
	  $sql = "SELECT * FROM music_directors where id=". $row['artist_name'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();

      echo "<p>". $coursedata['name'] ."</p>";
      echo " </div></a>";


	  }


mysqli_close($con);
		
	}
		else if($_REQUEST['data']=="nsong"){
		
		
	
		
		$result = mysqli_query($db,"SELECT * FROM genre " );

  while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='specificsinger.php?id=".$row['id']."'>";

      echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";


      echo "<h4>" . $row['name'] . "</h4>";

      echo " </div></a>";



	  }


mysqli_close($con);
		
	}
	
	else{
		
		
		$result = mysqli_query($db,"SELECT distinct movie_name,artist_name,movie_name,thumb_img,id FROM song_details ORDER BY date desc" );

      while($row = mysqli_fetch_array($result))
      {
        
        
      echo "<div class='card'><a href='songlist.php?data=album&id=".$row['id']."'>";

      echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
	  
	  $sql = "SELECT * FROM movie where id=". $row['movie_name'];
$result = $db->query($sql);



$coursedata1 = $result->fetch_assoc();

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
       
    </section>
    <footer class="footer">
         &copy; 2020 All Rights Reserved
          </footer>
    </div>
</body>
</html>