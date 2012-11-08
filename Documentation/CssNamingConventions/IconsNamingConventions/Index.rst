.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


Icons naming conventions
^^^^^^^^^^^^^^^^^^^^^^^^

This section aims to explain how classes apply to links. As reminder,
icons are merged dynamically in sprites (cf. chapter "Sprite
Generator"). Additionally, CSS classes are generated and outputted for
each image which will be used for positioning the sprite correctly.

To put the CSS classes in context, let's consider the HTML code that
is necessary for displaying an icon. ::

   <a href="#" class="t3-link">
           <span class="t3-icon t3-icon-actions t3-icon-actions-document t3-icon-document-new"></span>
   </a>

Thetable belowclarify the purpose of each class.


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Class name
         Class name

   Description
         Description


.. container:: table-row

   Class name
         t3-link

   Description
         The base class of all links.


.. container:: table-row

   Class name
         t3-icon

   Description
         The base class of all icons.


.. container:: table-row

   Class name
         t3-icon-actions

   Description
         Defines what sprite is going to be used. In version 4.4, there is 5
         main sprites. As from version 4.5, there is only one.


.. container:: table-row

   Class name
         t3-icon-document-new

   Description
         Defines the background position of the sprite.


.. ###### END~OF~TABLE ######

