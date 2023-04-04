<!DOCTYPE html>
<html>
<head>
<style>
nav {
width: 100%;
background-color: #080808;
height: 50px;
position: fixed;
border-bottom: 2px solid #F0AB00;
}

ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
}

li {
float: left;
}

li a {
display: block;
color: #F0AB00;
font-size: 18px;
font-weight: bold;
text-align: center;
padding: 20px 16px;
text-decoration: none;
text-transform: uppercase;
letter-spacing: 2px;
border-right: 2px solid #F0AB00;
}

li:last-child a {
border-right: none;
}

li a:hover {
background-color: #0000;
color: green;
}
</style>
</head>
<body>

<ul>
  <li><a href="/tft/create">create</a></li>
  <li><a href="/tft">tfts</a></li>
  <li><a href="/logout">logout</a></li>
</ul>

</body>
</html>

