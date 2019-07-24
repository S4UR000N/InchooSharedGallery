<?php
$domain = \app\super\Server::getDomain();
?>

<nav id="nav" class="navbar navbar-light pt-3 pb-3" style="background-color: #0099CC;">
    <div id="header" class="container d-flex justify-content-around">
        <a href='<?php echo $domain ?>/'><button class='btn btn-white text-dark'>Home</button></a>
        <a href='<?php echo $domain ?>/user_login'><button class='btn btn-white text-dark'>Login</button></a>
        <a href='<?php echo $domain ?>/user_registration'><button class='btn btn-white text-dark'>Registration</button></a>
    </div>
</nav>