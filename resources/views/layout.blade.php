<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #007bff;
  padding: 1px;
  text-align: center;
  font-size: 25px;
  color: white;
}


nav {
  float: left;
  width: 30%;
  height: 100%; /* only for demonstration, should be removed */
  background: #343a40;
  padding: 20px;
}


nav ul {
  list-style-type: none;
  padding: 0;
}
nav ul li a{
    color:white;
    font-size:14px;
    text-decoration: none;
}
article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 100%; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>
<header>
  <h2>ADMIM</h2>
</header>

<section>
  <nav>
    <ul>
    @hasrole('admin')
        <li><a href="#" id="myDetails">
            <span>Users</span></a>
            <ul style="display:none" id="sub">
                <li><a href="{{URL::to('/add-user')}}">Thêm người dùng</a></li>
                <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
            </ul>
      </li>
      @endhasrole
      <li><a href="{{URL::to('/logout-auth')}}">Đăng xuất</a></li>
    </ul>
  </nav>
  
  <article>
  @yield('admin_content')  </article>
</section>

<footer>
  <p>Footer</p>
</footer>
<script>
    document.getElementById("myDetails").onclick = function() {myFunction()};
    function myFunction() {
        if(document.getElementById("sub").style.display == "none")
        document.getElementById("sub").style.display="block";
        else{
            document.getElementById("sub").style.display="none";
        }
}
</script>
</body>
</html>