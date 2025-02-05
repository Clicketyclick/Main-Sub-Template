/**
 *   @file       screen.js
 *   @brief      Calling sub functions and updating screen elements
 *   @details    
 *   
 *   @copyright  http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 *   @author     Erik Bachmann <ErikBachmann@ClicketyClick.dk>
 *   @since      2025-02-03T21:53:14 / ErBa
 *   @version    2025-02-03T22:17:33
 */

const d = new Date();		// Date element
//let text = d.toISOString();	// Now

/*subframe*/
function call_sub(f, id) {
    url = "src/"+id+".php";

    console.log( 'f:'+f);
    console.log(url);
    document.getElementById(f).src   = url;
}   // call_sub()

//----------------------------------------------------------------------

function data_log( f, data ) {
    //top.document.getElementById( f ).innerHTML += data;
	elt	= top.document.getElementById( f );
	if ( 'DIV' == elt.nodeName )
		elt.innerHTML += data ;
	else
		elt.value += data ;
}

//----------------------------------------------------------------------

function data_report( f, data ) {
	elt	= top.document.getElementById( f );
	if ( 'DIV' == elt.nodeName )
		elt.innerHTML = data ;
	else
		elt.value = data ;
}

//----------------------------------------------------------------------

function upd_progress( key, width, size = 100 ) {
	var elem = top.document.getElementById(key);

	elem.value	= width * 100 / size;
	//console.log("ratio: "+width+"*100/"+size);
	elem.innerHTML = width + "%";
}	// upd_progress()

//----------------------------------------------------------------------

console.log( this + "loaded" );