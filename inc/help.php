<?
/*
*
*  This file contains help rendering functions for RackTables.
*
*/

// Generate a link to the help tab.
function genHelpLink ($tabno)
{
	global $root;
	return "${root}?page=help&tab=${tabno}";
}

// Checks if a topic is present for page and tab and render a hinting element;
// do nothing otherwise.
function lookupHelpTopic ($pageno, $tabno)
{
	global $helptab;
	if (!isset ($helptab[$pageno][$tabno]))
		return;
	echo "<td><a href='" . genHelpLink ($helptab[$pageno][$tabno]);
	echo "' alt='Help' title='Help is available for this page'>";
	printImageHREF ('helphint');
	echo '</a></td>';
	return;
}

// Prints the help page content.
function renderHelpTab ($tabno)
{
	switch ($tabno)
	{
//------------------------------------------------------------------------
		case 'default':
			startPortlet ('Hello there!');
			echo '
This is the help system of a working RackTables installation. Select one of the
tabs above to find information on specific topics. If you are new to this
software, just follow to the next tab.
';
			finishPortlet();
			break;
//------------------------------------------------------------------------
		case 'quickstart':
			echo
'
The datacenter world is built up from resources. The first resource to start
with is rackspace, which in turn is built up from racks. To create yur first
rack, open Configuration->Dictionary page and go to "Edit words" tab.
<p>
Here you see a bunch of portlets, each holding some odd data. The one you need
right now is called "RackRow (3)". The only thing you need to do now is to think
about the name you want to assign to the first group of your racks and to type
it into the form and press OK. This can be changed later, so a simple "server
room" is Ok.
<p>
Now get back to the main page and head into Rackspace page. You will see you
rack row with zero racks. Click it and go to "Add new rack" tab. This is the
moment where you create the rack itself, supplying its name and height.
<p>
To populate the rack, you need some stuff called objects. See the next page.
';
			break;
//------------------------------------------------------------------------
		case 'rackspace':
			startPortlet ('Rack design');
			echo
				"Rack design defines the physical layout of a rack cabinet. " .
				"Most common reason to use the tab is absence of back rails, although " .
				"any other design can be defined.<p>" .
				"In this tab you can change mounting atoms' state between 'free' and 'absent'.<br>" .
				"A selected checkbox means atom presence.";
			finishPortlet();
			startPortlet ('Rackspace problems');
			echo
				"Rack problems prevent free rackspace from being used for mounting. Such rackspace is considered " .
				"unusable. After the problem is gone, the atom can become free again. " .
				"In this tab you can change atoms' state from free to unusable and back.<br>" .
				"A selected checkbox means a problem.";
			finishPortlet();
			break;
//------------------------------------------------------------------------
		default:
			startPortlet ('Oops!');
			echo "There was no help text found for help tab '${tabno}' in renderHelpTab().";
			finishPortlet();
			break;
//------------------------------------------------------------------------
	}
}

?>
