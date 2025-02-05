<?php
/**
 *   @file       test.php
 *   @brief      Build template based page
 *   @details    
 *   
 *   @copyright  http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 *   @author     Erik Bachmann <ErikBachmann@ClicketyClick.dk>
 *   @since      2025-02-05T20:43:19 / ErBa
 *   @version    2025-02-05T22:09:14
 */

// Load general configuration (Name, version, release etc.)
$config         = json_decode( file_get_contents( './cfg/config.json'), TRUE );

// Load data elements: Naming, default values
$screen_data    = json_decode( file_get_contents( './scr/scr_data.json'), TRUE );

// Include screen element content blocks (Localised)
include_once( "./scr/scr_elements.php");

// Screen template (Loadable)
include_once('./scr/scr_layout.php');

// Merge screen template w. elements
echo $screen_layout . PHP_EOL;

?>