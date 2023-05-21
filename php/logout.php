<!-- IT21260988 - Randeniya R. A. D. S. E -->

<?php

session_start();
session_unset();
session_destroy();
header('Location: login.php');
