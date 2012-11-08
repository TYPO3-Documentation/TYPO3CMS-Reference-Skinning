.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


Skinning API
^^^^^^^^^^^^

TYPO3 v4.4 introduces a new skinning API which enables you to load as
many stylesheets as needed in the Backend. Convention over
configuration tends to be applied when loading stylesheets. TYPO3 is
expecting to find CSS files within two directories::

   * EXT:t3skin_improved/stylesheets/structure
   * EXT:t3skin_improved/stylesheets/visual

The example below shows up the most simple way for adding stylesheets
in the Backend. Since the system assumes that CSS files are to be
found in folder "structure" and "visual", TYPO3 will automatically
load CSS files at the latest. Following lines have to be put in file
ext\_tables.php of the extension. ::

   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved'] = array();
   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved']['name'] = 'My improved t3skin';

If conventions are respected, TYPO3 will use the array as below. If no
files are found, it will be simply skipped. ::

   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved'] = array();
   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved']['name'] = 'My improved t3skin';
   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved']['stylesheetDirectories'] = array(
       'structure' => 'EXT:t3skin_improved/stylesheets/structure',
       'visual' => 'EXT:t3skin_improved/stylesheets/visual',
   );

Conventions may be changed by overriding informations in
$GLOBALS['TBE\_STYLES']. ::

   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved']['stylesheetDirectories'] = array(
       'structure' => 'EXT:t3skin_improved/other_directory/structure', // changes default directory
       'visual' => '', //removes visual stylesheet
   );

Additionally, it is possible to load extra groups of stylesheets by
completing the array like this::

   $GLOBALS['TBE_STYLES']['skins']['t3skin_improved']['stylesheetDirectories'] = array(
       'EXT:t3skin_improved/stylesheets/extjs',
       'EXT:t3skin_improved/stylesheets/ie6',
       'EXT:t3skin_improved/stylesheets/rtehtmlarea',
   );

