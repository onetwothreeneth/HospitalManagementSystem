<?php 
include "database.php";
session_start();
session_destroy();
to("../index.php");