<?php
/**
 *   @file       loop.php
 *   @brief      Demo sub script
 *   @details    Addressing fields in top window
 *   
 *   Queue commands for scripting
 *   And flush_all
 *   
 *   @copyright  http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 *   @author     Erik Bachmann <ErikBachmann@ClicketyClick.dk>
 *   @since      2025-01-31T13:33:28 / ErBa
 *   @version    2025-02-03T22:16:53
 */

header( 'Content-type: text/html; charset=utf-8' );
while (@ob_end_flush());
echo "<script src='../js/screen.js'></script>";

loop();

echo 'Finished!';
@ob_end_flush(); //end output buffer
flush(); //-> out everything yet again


function loop($max = 50, $delay = 1 )
{
    $buffer_script = "";
    
    js_report( $buffer_script, 'field_1', date('c'). ' Start' );
    
    for( $i = 1 ; $i <= $max ; $i++ )
    {
        js_report( $buffer_script, 'review', date('c').' <br />');   // Insert closure
        js_progress( $buffer_script, 'progress', $i, $max );
        
        js_flush( $buffer_script ); // Flush js

        // Current time
        echo (new DateTime('now'))->format('H:i:s.v'), ": $i <br />\n";

        // wait for 2 milliseconds
        //usleep(2000);
        usleep(200000);
    }
    $buffer_script = "";    // Clear buffer
    js_report( $buffer_script, 'field_2', date('c').' Done');   // Insert closure
    js_flush( $buffer_script ); // Flush js
}

//----------------------------------------------------------------------

function js_flush( &$buffer_script, $buffers = 64 )
{
    echo str_pad( "<script type='text/javascript'>$buffer_script</script>", 1024*$buffers, "\x00"); 
    @ob_flush(); //force output to browser
    flush();
}   // js_flush()

//----------------------------------------------------------------------

function js_report( &$buffer_script, $key, $data )
{
    $buffer_script  .= sprintf( "data_report( '%s', '%s' );\n"
    ,   $key
    ,   $data
    );
}   // js_report()

//----------------------------------------------------------------------

function js_progress( &$buffer_script, $key, $data, $size = 100 )
{
    $buffer_script  .= sprintf( "upd_progress( '%s', '%s', %s );\n"
    ,   $key
    ,   $data
    ,   $size
    );
}   // js_progress()


//---------------------------------------------------------------------

function setStatus( $msg, $add = TRUE )
{
    if ( $add )
    {
        echo "<script>top.document.getElementById('status').innerHTML += '{$msg}';</script>";
    }
    else
    {
        echo "<script>top.document.getElementById('status').innerHTML = '{$msg}';</script>";
    }

}   // setStatus()

//---------------------------------------------------------------------

function setProgress( $max, $value = 0 )
{
    echo "<script>updateProgressbar( $max, $value );</script>";
}   // setProgress

//---------------------------------------------------------------------

function showProgress( $show = 'inline' )
{
    echo "<script>parent.document.getElementById('progress_bar').style.display= '{$show}';</script>";
}   // showStatus()

//---------------------------------------------------------------------



