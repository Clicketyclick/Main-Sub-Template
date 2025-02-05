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

/*

echo "<pre>";

var_export( $gitInfo );
var_export( $gitInfo['version'] );

echo "</pre>";


/*
$gitVersion     = getGitVersion();
$gitCommitInfo  = getGitCommitInfo();

//echo "<pre>";
$gitRepoName    = getGitRepoName();
var_export( $gitRepoName );
var_export( $gitVersion );
var_export( $gitCommitInfo );
*/

$config = [
  'system' => [
    'name'      => $gitRepoName ?? basename( __FILE__ ),
    'version'   => implode( '.', array_slice($gitInfo['version'] ?? ['?','?','?','?'] , 0, 3) ),
    'revision'  => $gitInfo['commit']['commitdate'] ?? 'unknown rev',
    'release'   => $gitInfo['commit']['commitdate'] ?? 'unknown rel.',
    'level'     => array_pop($gitInfo['version']) ?? 'alpha',
    'language'  => 'en',
    ],
    'icons'     => [
        'alpha' => "&#x1F9EB;",
        'beta'  => "&#x1F9EA;",
        'prod'  => "&#x1F3ED;",
    ],
    
    

    /*
    	"alpha": { "key": "Petri Dish (level)", "html": "&#x1F9EB;", "char": "🧫" },
	"beta": { "key": "Test tube (level)", "html": "&#x1F9EA;", "char": "🧪" },
	"_prod": { "key": "Libra (level)", "html": "&#x264E;", "char": "♎" },
	"prod": { "key": "Factory (level)", "html": "&#x1F3ED;", "char": "🏭" },

    'theme' => 'contrast',
    'display' => 'Standard',
    'favicon' => './icons/favicon.ico',
    */
];

include_once('./screens/'.($_REQUEST['screen']??'screen').'.php');

?>