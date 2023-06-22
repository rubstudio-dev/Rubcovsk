<?php
// Version
define('VERSION', '3.0.3.8');

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (!defined('DIR_APPLICATION')) {
	exit('Apply environment .bat file');
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

start('catalog');