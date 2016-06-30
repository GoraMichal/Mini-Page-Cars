<?php
require("bazadanych.php");

session_destroy();

header('location: login.php');
?>