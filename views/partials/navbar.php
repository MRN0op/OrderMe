<ul>
    <li><a href="/">Home</a></li>
<?php

if (isset($_SESSION["user_type"])) {

    if($_SESSION["user_type"] = "branch") {

    } else {

    }
    echo "<li><a href='/logout'>Logout</a></li>";
} else {
    
    echo "<li><a href='/login'>Login</a></li>";
    echo "<li><a href='/register'>Register</a></li>";
    
}

?>
</ul>