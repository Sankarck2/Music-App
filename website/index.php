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
                          <a class="nav-link" ></i>Home <span class="sr-only">(current)</span></a>
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
		
	}else if($_REQUEST['data']=="myear"){
		
		$result = mysqli_query($db,"SELECT * FROM year order by year desc" );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=year&id=".$row['year']."'>" . $row['year'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}else if($_REQUEST['data']=="allartist"){
		
		$result = mysqli_query($db,"SELECT * FROM music_directors order by id desc" );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=artist&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="artist"){
    
    echo "put dat div here";

		$result = mysqli_query($db,"SELECT * FROM music_directors where id=".$_REQUEST['id']." order by id desc" );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=artist&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
	
	else if($_REQUEST['data']=="actor"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT * FROM actor where id=".$_REQUEST['id'] );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=newactor&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
	else if($_REQUEST['data']=="singer"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT * FROM singer where id=".$_REQUEST['id'] );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=newsinger&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
	
		else if($_REQUEST['data']=="nsinger"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT * FROM singer " );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=newsinger&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
		else if($_REQUEST['data']=="song"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT * FROM song where id=".$_REQUEST['id'] );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=newsinger&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
		else if($_REQUEST['data']=="nsong"){
		
		echo "put dat div here";
		
		$result = mysqli_query($db,"SELECT * FROM song " );

while($row = mysqli_fetch_array($result))
{
	
	
echo "<div class='card'>";

echo " <img src=../". $row['img'] ."  height='150px' width='180px'>";
echo "<h4 > <a href='index.php?data=newsinger&id=".$row['id']."'>" . $row['name'] . "</a></h4>";

echo " </div>";


}


mysqli_close($con);
		
	}
	
	else{
		
$result = mysqli_query($db,"SELECT * FROM song_details ORDER BY date desc" );

while($row = mysqli_fetch_array($result))
{

echo "<div class='card'>";
	
echo " <a href='songlist.php?data=album&id=".$row['id']."'>";
echo " <img src=../". $row['thumb_img'] ."  height='150px' width='180px'>";
echo "<h4>" . $row['song_name'] . "</h4>";
echo "<p>". $row['movie_name'] ."</p>";
echo " </a>";
echo " </div>";


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