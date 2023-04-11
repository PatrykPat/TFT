<!DOCTYPE html>
<html>
<head>
<style>

body {
  font-family: Arial, sans-serif;
  font-size: 16px;
}

* {
  margin: 0;
  padding: 0;
}

header {
  padding: 20px;
}

nav ul {
  list-style: none;
  display: flex;
}

nav ul li {
  margin-right: 20px;
}

nav ul li a {
  color: white;
  text-decoration: none;
}

main {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

nav {
<<<<<<< Updated upstream
width: 100%;
background: rgb(251,107,33);
background: linear-gradient(180deg, rgba(251,107,33,1) 0%, rgba(251,142,80,1) 72%);
height: 70px;
border-bottom: 2px solid #F0AB00;
float: right;
=======
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(to bottom, rgb(250, 100, 33), rgb(250, 150, 80));
>>>>>>> Stashed changes
}

nav ul {
  display: flex;
  list-style-type: none;
  margin: 0;
  padding: 0;
}

<<<<<<< Updated upstream
li {
float: right;
}

li a {
display: block;
color: #F0AB00;
font-size: 18px;
font-weight: bold;
text-align: center;
padding: 0px;
text-decoration: none;
text-transform: uppercase;
letter-spacing: 2px;
}

li:last-child a {
border-right: none;
=======
nav ul li {
  margin: 0 10px;
}

nav ul li a {
  color: black;
  text-decoration: none;
>>>>>>> Stashed changes
}

li a:hover {
      color: rgba(255, 255, 255, 0.8); 
    }
.logo {
  height: 60px;
  width: auto;
}
</style>
</head>
<?php if(auth()->user()->role == "klant"): 
  echo '
  <nav>
  <a href="/" ><img src="/images/logo.png" class="logo" alt="Logo"></a>
    <ul>
<<<<<<< Updated upstream
      <li><a href="/tft"><img src="images/logo.jpg" alt="logo" width="70px" height="70px"></a></li>
      <li><a href="/create">Log In</a></li>
      <li><a href="/kalender"><img src="images/kalender.png" alt="logo" width="70px" height="70px"></a></li>
=======
    <li><a href="/">Training factory Tiel</a></li>
      <li><a href="/lessen">Lessen</a></li>
      <li><a href="/rooster">Rooster</a></li>
      <li><a href="/profiel">Profiel</a></li>
      <li><a href="/logout">Logout</a></li>
>>>>>>> Stashed changes
    </ul>
  </nav>
      ';?>

<?php elseif(auth()->user()->role == "admin" || "instructeur"):
  echo '<nav>
  <a href="/" ><img src="/images/logo.png" class="logo" alt="Logo"></a>
  <ul>
    <li><a href="/">Training factory Tiel</a></li>
  </ul>
  <ul>
    <li><a href="/create">Create</a></li>
    <li><a href="/lessen">Lessen</a></li>
    <li><a href="/admin">Admin</a></li>
    <li><a href="/rooster">Rooster</a></li>
    <li><a href="/profiel">Profiel</a></li>
    <li><a href="/logout">Logout</a></li>
  </ul>
</nav>';?>
<?php endif ?>


</body>
</html>

