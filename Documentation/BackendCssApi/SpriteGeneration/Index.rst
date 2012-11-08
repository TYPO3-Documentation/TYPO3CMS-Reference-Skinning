.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


Sprite Generation
^^^^^^^^^^^^^^^^^

In version 4.4, the generation of sprites was assigned to the
developer who should shipped skin extensions with sprites already
"compiled". As from version 4.5, TYPO3 provides a mechanism that
"compile" icons into sprites automatically. The mechanism is fully
transparent and is fairly swift. The sprite generation does not modify
the quality of the icons meaning the color's depth remains unchanged.

The sprite generationprocess involves different mechanism which are
supporting by the  **Sprite Manager** and the  **Sprite Generator
Handler** .


Sprite Manager
""""""""""""""

the **Sprite Manager** is instantiated each time the Backend is loaded
and one of itsmain role is to verify whether new icons have been added
or not by comparing md5 value from the file cache with the serialized
icon list. The file cache md5 is to be found at
typo3temp/sprites/\*.inc


**Sprite Generator Handler**
""""""""""""""""""""""""""""

**Sprite Generator Handler** are configurable "workers" of the
spriteManager. Their tasks is to collect informations about icons from
extensions and have to make it usable for the Backend. In other words,
there are in charge of generating sprites and CSS files.

If new icons have been added,  **Sprite Generator Handler** is
triggered and can "enter the stage" in three different manners. Within
the install tool, there is the key " **spriteIconGenerator\_handler**
" that is used to configure the way the  **Sprite Generator Handler**
is acting. Currently it accepts:

- **simple** which turns out stylesheet in typo3temp/sprites/ butdoes
  **not** generate any sprite at all. Each image is "linked"
  independently. This handler is already present in TYPO3 v4.4.

- **auto-generating** whichextends the "simple" handler by producing a
  sprite additionally as stylesheet. This handler is present upon TYPO3
  v4.5.

- **manual auto-generating** - instead of letting TYPO3 taking care of
  the CSS / Sprite generation automatically, this option will activate a
  new icon in the Clear Cache menu that will enable to manually control
  the Sprite Manager. This handler is present upon TYPO3 v4.5.

Notice that the Sprite Generator only generate sprite from icons that
have been added afterwards through extensions. The sprite and
stylesheet shipped with the Core will  **never** be changed by the
Sprite Generator. Therefore, icons are pre-compiled into  **one**
"big" sprite for the whole Backend.

Sprites and stylesheets provided by the Core are located in
**t3skin** as follows:


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Path
         Path

   Description
         Description


.. container:: table-row

   Path
         typo3/sysext/t3skin/images/sprites/t3skin.png

         typo3/sysext/t3skin/images/sprites/t3skin.gif

   Description
         The sprites provided by t3skin for the whole backend. The gif sprite
         is for IE6 compatibility.


.. container:: table-row

   Path
         typo3/sysext/t3skin/stylesheets/sprites/t3skin.css

   Description
         Contains the CSS stylesheets that will be used for positioning the
         sprite.


.. ###### END~OF~TABLE ######


Sprites and stylesheets that are generated afterwards by the means of
the Sprite Generator Handler are located in typo3temp as follows:


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Path
         Path

   Description
         Description


.. container:: table-row

   Path
         ...

   Description
         The sprite / icons location will depend on how the handler is
         configured in the install tool under key
         "spriteIconGenerator\_handler". It may accept thre different values:
         simple – autogenerating – manual autogenerating


.. container:: table-row

   Path
         typo3temp/srpites/zextensions.css

   Description
         Contains the CSS stylesheets that will be used for positioning the
         sprite.


.. ###### END~OF~TABLE ######


Use case #2 gives a good insight of the API to be used to add new icon
in the Backend. The common way, is to call method addSingleIcons as
follows::

   // Gives the $icon array to the sprite manager
   t3lib_SpriteManager::addSingleIcons($icons, 'foo');

