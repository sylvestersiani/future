<?php session_start();  require_once'../control/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php isset($title)? print $title : print 'Siani Print &trade;' ; ?></title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width, height=device-height">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta property="og:description" content=".........">
	<meta itemprop="name" content="Alphabet">
	<meta itemprop="description" content=".......">
	<meta name="keywords" content=".......">
	
	<link rel="stylesheet" type="text/css" href="../view/css/main.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>


