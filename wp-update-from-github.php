<?php 
/*
  Plugin Name: Update From Github
  Author: Figoli Quinn & Associates
  Description: Update WordPress plugins from a github repository.
  Version: 1.0
*/	

if ( !defined( 'ABSPATH' ) ) exit;

require_once __DIR__ . '/vendor/autoload.php';

use FigoliQuinn\WPUpdateFromGithub\WPUpdateFromGithub;

new WPUpdateFromGithub( 'figoli-quinn/wp-update-from-github', __FILE__, 'wp-update-from-github' );