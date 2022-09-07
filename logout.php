<?php

//logout.php

include('config.php');

//Destroy entire session data.
session_destroy();

header('location: main.php');

?>