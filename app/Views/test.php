<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>


	
    <style>

*{
    box-sizing: border-box;
    
    margin: 0;
}

body{
    background: linear-gradient(rgba(13, 23, 37, 0.6),rgba(7, 7, 7, 0.6)),url(img.png);
    height: 100vh;
    -webkit-background-size:cover;
    background-size:cover ;
    background-position: center center;
    height: 100vh;
   }
nav{
    background:#02a1a1;
    padding: 5px 20px;
}
ul{
    list-style-type: none;
}
a{
    color: white;
    text-decoration: none;
}
.menu li{
    font-size: 20px;
    padding: 15px 5px;
    font-weight: 800;
}
.menu li a{
    display: block;
} 
.logo a{
    font-size: 30px;
}
.menu{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}

    </style>
</head>
<body>


<nav>
            <ul class="menu">
                <li class="logo"><a href="#">La banque du peuple</a></li>
                <li class="item"><a href="{$url_base}Client/add">Gestion des clients</a></li>
                <li class="item"><a href="{$url_base}Compte/add">Gestion des comptes client</a></li>
            </ul>
        </nav>

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->

</body>
</html>
