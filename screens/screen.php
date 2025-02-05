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
				<span title='{$GLOBALS['config']['system']['level']} {$GLOBALS['config']['system']['revision']}'>
					{$GLOBALS['config']['icons'][ $GLOBALS['config']['system']['level'] ]} 
					r.{$GLOBALS['config']['system']['release']}
				</span> 
			</span>
		</footer>
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
                >{$screen_data['menu']['button1'][ $config['system']['language'] ]}
                </button>
<!--
                <button 
                    id="button2" 
                    class='menu_buttonsearch' 
                    type='button' 
                    onClick="this.removeAttribute('href');call_sub('subframe', 'find');"
                >{$screen_data['menu']['button2'][ $config['system']['language'] ]}
                </button>
-->
            </fieldset>
        </nav>
EOF


,   'data' => <<<EOF
        <!-- >>> DATA >>>-------------------------------------------------- -->
        <div>
            <fieldset>
                <legend>DATA</legend>
                <progress id="progress" value="0" max="100" style="width: 100%;">1</progress>
                <br>
                <textarea id="review" name="w3review" rows="4" cols="50"></textarea>
                <br>
                    
                <div id="start_field">start</div>
                <div id="end_field">end</div>

            </fieldset>
        </div>
EOF



,   'sub' => <<<EOF
        <!-- >>> SUB >>>-------------------------------------------------- -->
        <div>
                <details open>
                    <summary>Debug</summary>
                         <!--div id="debug"></div-->
                         <textarea id="debug" name="w3review" rows="4" cols="50"></textarea>
                </details>
                <details>
                    <summary>Subfunction</summary>
                         <iframe id="subframe" src="" title="Sub process frame" onload="this.width=screen.width-50;this.height=screen.height/2;"> </iframe> 
                </details>
        </div>
EOF

];



foreach( $screen_template as $screen_key => $screen_element )
{
    echo $screen_template[$screen_key];
}

?>