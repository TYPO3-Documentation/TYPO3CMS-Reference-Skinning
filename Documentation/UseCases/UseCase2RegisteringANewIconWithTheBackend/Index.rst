

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Use case 2: registering a new icon with the Backend
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Save icons within your extension whenever it makes sense. As example,
it can be placed in EXT:extension/ Resources/Public/images/icons.

Here are the steps:

1. copy icon in EXT:foo/Resources/Public/images/icons

2. declare your icon by adding following lines into
EXT:foo/ext\_tables.php

::

   // Defines $icon array()
   $pathToExtension = t3lib_extMgm::extRelPath('foo');
   $icons = array(
           'error' => $pathToExtension . 'Resources/Public/images/icons/error.png',
           'information' => $pathToExtension . 'Resources/Public/images/icons/information.png',
           'notification' => $pathToExtension . 'Resources/Public/images/icons/notification.png',
           'ok' => $pathToExtension . 'Resources/Public/images/icons/ok.png',
           'warning' => $pathToExtension . 'Resources/Public/images/icons/warning.png',
   );
   
   // Gives the $icon array to the sprite manager
   t3lib_SpriteManager::addSingleIcons($icons, 'foo');

3. Clear the "Configuration" cache to take into account the changes
done in ext\_tables.php

4. Finished! It should be possible to call the new icons like:

::

   t3lib_iconWorks::getSpriteIcon('extensions-foo-warning')

will turn out:

::

   <span class="t3-icon t3-icon-extensions t3-icon-extensions-devlog t3-icon-devlog-warning"></span>

