Clean URL Params
-------------------------------------------------------------------------------

Version: 1.0.2
Author: Rowan Lewis <me@rowanlewis.com>
Build Date: 9 December 2009
Requirements: Symphony 2.0.1


Installation
-------------------------------------------------------------------------------

1.	Upload the 'cleanurlparams' folder in this archive to your Symphony
	'extensions' folder.

2.	Enable it by selecting the "Clean URL Params", choose Enable from the
	with-selected menu, then click Apply.

3.	Modify /symphony/lib/toolkit/class.frontendpage.php and replace line 262:
	
	$this->ExtensionManager->notifyMembers('FrontendPrePageResolve', '/frontend/', array('row' => &$row, 'page' => &$this->_page));
	
4.	That's it, now you can use clean URL parameters.