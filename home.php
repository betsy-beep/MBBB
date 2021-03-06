<?php session_start (); 
?>
<?php include "do-session.php"; 
$matricNo = $_SESSION["matricNo"];
?>
<!DOCTYPE html>
<html>
<head>
<title>RoomNow</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: 'Autour One';
  background-position: center;
  background-image: url("image/coffeebiru.jpg");
  box-sizing: contain;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}
.Row {
  justify-content: center;
         align-items: center;
         display: flex;
         height: 120%;
       }
       .Column {
         flex-basis: 50%;
         
       }
       h1 {
        
         color:#f1f1f1;
         font-size: 50px;
       }
       h3 {
         font-size: 28px;
         color:#f1f1f1;
       }
       p {
         font-size: 12px;
         text-align: justify;
         color:#f1f1f1;
         line-height: 15px;
       }
       h4 {
         font-size: 1vw;
         color:black;
       }
       .card {
         background-size: contain;
         background-color: white;
         position: relative;
         width: 400px;
         height: 250px;
         display: inline-table;
         border-radius: 13px;
         padding: 15px 25px;
         box-sizing: border-box;
         cursor: pointer;
         margin: 10px 15px;
         background-position: center; 
         border: 2px solid black;
         transition: transform 0.5s;
       }
       .Card1 {
        color: #FFFFCC;
         background-size:cover;
         background-image: url(image/girl.png);
       }
       .Card2 {
        background-size: cover;
        background-image: url(image/round-table.png);

       }
       .Card3 {
        background-size: contain;
        background-image: url("image/dashboard.png");
       }
       .Card4 {
        background-size: contain;
         background-image: url(image/pictures.png);
       }
       .card:hover {
        opacity: 1;
        transform: translate(-10px);
       }
       h5 {
         font-family: 'Finger Paint';
         font-size: 22px;
         color: black;
         text-shadow: 0 0 10px white;
       }
       .fa {
       justify-content: center;
       padding: 40px;
       font-size: 30px;
       width: 20px;
       text-align: center;
       text-decoration: none;
       margin: 5px 3px;
       border-radius: 50%;
       }
       .fa:hover {
       opacity: 0.7;
       }
      .fa-facebook {
       background: #3B5998;
       color: white;
       }  
       .fa-instagram {
       background: #125688;
       color: white;
       }
       .fa-twitter {
       background: #55ACEE;
       color: white;
       }

.container {
         background-size: cover;
         width: 100%;
         height: 100%;
         padding-left: 8%;
         padding-right: 8%;
         box-sizing: border-box;
       }
       hr{
        color: 2px solid white;
       }

       /* Style the footer */
    footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
  }
  #div1 {
  font-size:30px;
}
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }


</style>
</head>
<body>

<div class="header" >
  <a href="home.php" class="logo">RoomNow</a>

  <div class="header-right" >
    <a class="active" href="home.php">Dashboard</a>
    <a href="index.html">Logout</a>
  </div>
</div>

<div style="padding-left:20px">
   <div class="container">

      <!--bigtitle & description-->
      <div class="Row">
        <div class="Column">
          <h1>WELCOME TO UNIMAS FCSIT MEETING ROOM BOOKING!</h1>
          <h3>Your ideal meeting room in Kuching!</h3>
             <h4>Feel free to add us on these Social Media!</h4>
           <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
           <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
           <a href="https://twitter.com/home?lang=en" class="fa fa-twitter"></a>
        </div>

        <div class="col">
           <div class=" card Card1">
           <a href="user-profile.php"><div style=" background-color: #FFFFCC; "><h5>My Profile</h5></div></a>
          
          </div>

          <div class="card Card2">
            <div style=" background-color: #FFFFCC; "><a href="roombooking.php"><h5>Booking RoomNow</h5></a></div>
          </div>

          <div class="card Card3">
          <a href="bookinghistory.php"><div style=" background-color: #FFFFCC; "><h5>Our booking history</h5></div></a>
          </div>

          <div class="card Card4">
            <a href="meeting-room.html"><div style=" background-color: #FFFFCC;padding: 0px 2px 0px 2px;"><h5>Our Meeting Room</h5></div></a>
          </div>

        </div>
      </div>
    </div>
    </div>
    <div>
   
    <br>
<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
<br>
</body>
</html>
