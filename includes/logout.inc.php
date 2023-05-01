<?php

session_start();
session_unset();
destroy();
header("location: ../index.php?error=none");