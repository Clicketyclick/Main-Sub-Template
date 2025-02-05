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

$config = [
  'system' => [
    'name' => 'Screen-template',
    'version' => '01.00',
    'revision' => '2025-02-04T13:27:20',
    'release' => '2025-02-04T13:27:30',
    'level' => 'alpha',
    'language' => 'en',
    /*
    'theme' => 'contrast',
    'display' => 'Standard',
    'favicon' => './icons/favicon.ico',
    */
  ]
];
include_once('./screens/'.($_REQUEST['screen']??'screen').'.php');
