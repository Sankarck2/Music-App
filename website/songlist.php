<!DOCTYPE html>


				  <?php
				  
			
require_once "config/config.php";

if(isset($_POST['submit320'])){
	
	
	$url = $_POST['320']; 
  
  
  $file_url = $_POST['320']; 
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: Binary");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);

// Use basename() function to return the base name of file  

   
// Use file_get_contents() function to get the file 
// from url and use file_put_contents() function to 
// save the file by using base name 

}
if(isset($_POST['submit128'])){
	
	
	 $file_url = $_POST['128']; 
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: Binary");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);

}
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
    <script type="text/javascript" src="js/songlist.js"></script>
    <link rel="stylesheet" href="css/songlist.css"/>

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

	   <?php

	 if($_REQUEST['data']=="album"){
		$sql = "SELECT s.*,si.name as singername,a.name as actorname,m.name as musicname FROM song_details s INNER JOIN  singer si on si.id=s.singer INNER JOIN actor a on a.id=s.actor_name INNER JOIN  music_directors  m on m.id=s.artist_name  where s.id=".$_REQUEST['id'];


$result = $db->query($sql);



$coursedata = $result->fetch_assoc();


		
	}
	
	?>
		
	
        <h4>MOVIE NAME</h4>
          <div class="completeDetails">
		  <?php
		   echo " <img src=../". $coursedata['thumb_img'] ." >";
		  ?>
        
            <div class="alldetails">
              <table>
                <tr><td><b>Starring</b> : <?php echo $coursedata['starring']?></td></tr>            
                <tr><td><b>Direction</b> :  <?php echo $coursedata['direction']?></td></tr>    
                <tr><td><b>Production</b> :  <?php echo $coursedata['production']?></td></tr>            
                <tr><td><b>Music Director</b> : <a href="#"> <?php echo $coursedata['musicname']?></a></td></tr> 
                <tr><td><b>Release Year</b> :  <?php  echo date('Y',strtotime($coursedata['date']));?></td></tr>            
            
				    <tr><td><b>Bitrates</b> : 128kbps, 320kbps</td></tr> 
              </table>
            </div>
          </div>
          <h4>SONG NAME</h4>
          <div class="downloadDetails">
		  <?php
		  
		     $result = mysqli_query($db,"SELECT * FROM song_details where movie_name='".$coursedata['movie_name']."'" );

     $row =mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	 
			
	 for($i=0;$i<mysqli_num_rows($result);$i++)
      {
		
   
     echo " <div class='songDetails'>";
   
    echo "  <p><i class='fa fa-music' aria-hidden='true'></i> Song Name : ".$row[$i]['song_name']."</p>";
	
	
			$sql = "SELECT * FROM music_directors where id='".$row[$i]['artist_name']."'";
			
		
$result = $db->query($sql);



$coursedata1 = $result->fetch_assoc();
    
	
	   echo "  <p><i class='fa fa-microphone' aria-hidden='true'></i> Artist : ".$coursedata1['name']."</p>";
  
	  echo "  <p><i class='fa fa-clock-o' aria-hidden='true'></i> Duration : 3:00min</p>";

   echo "</div>";
   

   echo "<div class='downloadbuttons'>";
	 echo "<form method='POST' action='#'>";
	 echo "<input type='hidden' name='128' value='../".$row[$i]['audio']."'/>";
	  echo "<button name='submit128'>Download 128kbs</button>";
	echo "</form>";
	 echo "<form method='POST' action='#'>";
	 echo "<input type='hidden' name='320' value='..".$row[$i]['audio320']."'/>";
	  echo "<button name='submit320'>Download 320kbs</button>";
  echo "</form>";
  echo "</div>";

               
               
   
      }
	
		  
		  
		  ?>
		  
		  
            
              
          </div>
          <div class="disclaimer"></div>
      </div>
        <div class="tab2">
          <div class="hits">
          <h4>Share on social media</h4>
            <div>
              <p>
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
              </p>
              <p>
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </p>  
              <p>
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </p>
            </div>
          </div>
          <div class="hits">
            <h4>Related Movies</h4>
            <div>
              <img src="" alt="" height='80px' width='80px'>
              <img src="" alt="" height='80px' width='80px'>
              <img src="" alt="" height='80px' width='80px'>
            </div>
            <a href="#">More..</a>
          </div>
          <div class="hits">
            <h4>Latest Movies</h4>
            <div>
              <img src="" alt="" height='80px' width='80px'>
              <img src="" alt="" height='80px' width='80px'>
              <img src="" alt="" height='80px' width='80px'>
            </div>
            <a href="#">More..</a>

          </div>
          <div class="hits"><h4>Top Albums</h4>
          <div>
              <img src="" alt="" height='80px' width='80px'>
              <img src="" alt="" height='80px' width='80px'>
              <img src="" alt="" height='80px' width='80px'>
            </div>
            <a href="#">More..</a>

        </div>
      
    </section>
    <div class="Relatedmovies">
        <h4>RELATED MOVIES</h4>
        <div class='relatedmoviecard'>
		<?php
		
		
		$result = mysqli_query($db,"SELECT * FROM song_details where date like '%2020%'" );

      while($row = mysqli_fetch_array($result))
      {
      echo "<div class='moviecard'>";

      echo " <img src=../". $row['thumb_img'] ."  height='10px' width='10px'>";
      echo "<div class='tab3'><p>" . $row['song_name'] . "</p>";
      echo "<p>". $row['movie_name'] ."</p>";
      echo " </div> </div> ";

      }
      mysqli_close($con);
		?>
		</div>
       
    </div>
        <footer class="footer">
          All Rights Reserved
          </footer>
    </div>
        
</body>
</html>