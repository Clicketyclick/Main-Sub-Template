<?php
/**
 *   @file       Index for testing screens
 *   @brief      
 *   @details    
 *   
 *   http://localhost:8081/test/screen-template/index.php
 *   http://localhost:8081/test/screen-template/index.php?screen=screen2
 *   
 *   ┌────────────────┐
 *   │ Header         │
 *   ├────────────────┤
 *   │ Menu           │
 *   ├────────────────┤
 *   │ Data           │
 *   │                │
 *   │                │
 *   ├────────────────┤
 *   │ Sub            │
 *   ├────────────────┤
 *   │ Footer         │
 *   └────────────────┘ 
 *   
 *   @copyright  http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 *   @author     Erik Bachmann <ErikBachmann@ClicketyClick.dk>
 *   @since      2025-01-31T11:40:51 / ErBa
 *   @version    2025-02-03T22:16:08
 */

header( 'Content-type: text/html; charset=utf-8' );

include_once('./lib/getGitInfo.php');

// Load general configuration (Name, version, release etc.)
$config                         = json_decode( file_get_contents( './cfg/config.json'), TRUE );

$config['system']['name']       = $gitInfo['name'];
$config['system']['version']    = implode( '.', array_slice($gitInfo['version'] ?? ['?','?','?','?'] , 0, 3) );
$config['system']['revision']   = $gitInfo['commit']['commitdate'] ?? 'unknown rev';
$config['system']['release']    = $gitInfo['commit']['commitdate'] ?? 'unknown rel.';
$config['system']['level']      = array_pop($gitInfo['version']) ?? 'alpha';

// Load data elements: Naming, default values
$screen_data    = json_decode( file_get_contents( './scr/scr_data.json'), TRUE );

// Include screen element content blocks (Localised)
include_once( "./scr/scr_elements.php");

// Screen template (Loadable)
include_once('./scr/scr_layout.php');

// Merge screen template w. elements
echo $screen_layout . PHP_EOL;

?>