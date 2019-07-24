<?php
$domain = \app\super\Server::getDomain();
?>

<nav id = "nav" class = "navbar navbar-light pt-3 pb-3" style = "background-color: #0099CC;">
    <div id = "header" class = "container d-flex justify-content-around">
        <a href = '<?php echo $domain; ?>/'><button class = 'btn btn-white text-dark'>Home</button></a>
        <a href = '<?php echo $domain; ?>/user_management'><button class = 'btn btn-white text-dark'>Management</button></a>
        <a href = '<?php echo $domain; ?>/user_myaccount'><button class = 'btn btn-white text-dark'>MyAccount</button></a>
        <a href = '<?php echo $domain; ?>/user_logout'><button class = 'btn btn-white text-dark'>Logout</button></a>
    </div>
</nav>