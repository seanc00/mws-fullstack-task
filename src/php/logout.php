<?php

require_once("../../functions.php");

$session->logout();
redirect("/login.php");