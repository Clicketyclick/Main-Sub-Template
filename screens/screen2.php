<?php
/**
 *   @file       screen2.php
 *   @brief      Template for building screens
 *   @details    Key elements are: header, footer, menu, data, sub
 *   http://localhost:8081/test/screen-template/index.php?screen=screen2
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

$screen_data = json_decode( file_get_contents( __DIR__.'/screen_data.json'), TRUE );

$screen_template    = [
    'header' => <<<EOF
        <!-- >>> HEADER >>>------------------------------------------------ -->
        <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-cache">


        <script src="./js/screen.js"></script>
        <link href="./css/screen.css" rel="stylesheet">
        </head>
        <!-- <<< HEADER <<<------------------------------------------------ -->
EOF

//----------------------------------------------------------------------

,   'footer' => <<<EOF
        <!-- >>> FOOTER >>>------------------------------------------------ -->
        <footer class="fixed-bottom bg-white footer">
                            <span title='Version'>{$GLOBALS['config']['system']['name']} v. {$GLOBALS['config']['system']['version']}</span> <span title='Level'> 
                                <span title='{$GLOBALS['config']['system']['level']} {$GLOBALS['config']['system']['revision']}'>&#x1F9EB; r.{$GLOBALS['config']['system']['release']}</span> 
                            </span>
                            {<span  id='foot_recno' title='Record no in current set'>1</span> 
                            / <span id='foot_reccount' title='No of records in current set'>1197</span> 
                            = <span  id='foot_rowid' title='Record no in database'>1</span> 
                            : S<span  id='foot_setno' title='Set no. (0 = entire database)'>0</span>
                            }
                            <span title='Language: en'>
                                <!--img src='icons/flags/iso/png/16x16/flag-gb.png'-->
                            </span><span class='user' title='[en][]'>[&#x2047;/&#x29EF;icon:&#x2047;&#x29EF;]</span> ??  <!-- Database -->
                            <span 
                                id='footer_database_name' 
                                class='menu_databases' 
                                title='Database: test'>[test</span>]
                            <!-- Display -->
                            <span id='footer_display_name' 
                                class='menu_display' 
                                title='Display: Standard'
                                >[&#x1F5BD;Standard</span>]
        </footer> <!-- section-header.// -->
        <!-- <<< FOOTER <<<------------------------------------------------ -->
EOF

,   'menu' => <<<EOF
        <!-- >>> MENU >>>-------------------------------------------------- -->
        <nav id="top_menu" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <fieldset>
                <legend>MENU</legend>
                <button id="button1" 
                    class='menu_buttonsearch' 
                    type='button' 
                    onClick="this.removeAttribute('href');call_sub('subframe', 'loop');"
                >{$screen_data['menu']['button1']}
                </button>
                <button 
                    id="button2" 
                    class='menu_buttonsearch' 
                    type='button' 
                    onClick="this.removeAttribute('href');call_sub('subframe', 'find');"
                >{$screen_data['menu']['button2']}
                </button>
            </fieldset>
        </nav>
EOF


,   'data' => <<<EOF
        <!-- >>> DATA >>>-------------------------------------------------- -->
        <div>
            <fieldset>
                <legend>DATA</legend>
                <progress id="progress" value="1" max="100">1</progress>
                <input id="ccl" name="find" class="ccl_field">
                <input id="returned" name="find" class="ccl_field">

                <br>
                <textarea id="review" name="w3review" rows="4" cols="50"></textarea>
                <br>
                
                <div id="field_1">field_1 start</div>
                <div id="field_2">field_2 end</div>
            </fieldset>
        </div>
EOF



,   'sub' => <<<EOF
        <!-- >>> SUB >>>-------------------------------------------------- -->
        <div>
            <fieldset>
                <legend>subframe</legend>
                <details>
                    <summary>sub</summary>
                         <iframe id="subframe" src="" title="Sub process frame" onload="this.width=screen.width-50;this.height=screen.height/2;"> </iframe> 
                </details>
            </fieldset>
        </div>
EOF

];



foreach( $screen_template as $screen_key => $screen_element )
{
    echo $screen_template[$screen_key];
}

?>