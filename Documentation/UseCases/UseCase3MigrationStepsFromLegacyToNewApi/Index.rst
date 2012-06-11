

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


Use case 3: migration steps from legacy to new API
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

As TYPO3 4.4 removes all hardcoded icons from the Core, all icons in
typo3/gfxhave become superfluous as from now. However they are still
present in the Core, mainly for backwards compatibility reasons. The
same happens to t3ksin with its icons/gfx.

They are due to be removed in 4.6 and so developers are strongly
encouraged to migrate the code basis to the sprite system.

As a first step, icons should be copied / pasted into your extension,
as long as there are used in a different context as the ones in the
Backend. Then, following "Use Case 2" it should be possible to call
icons by the means of the API (cf. `Chapter Icons API
<#1.3.4.Icons%20API|outline>`_ ).

Bellow, find the equivalence of legacy API versus new API.


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Legacy API > TYPO3 4.3
         Legacy API > TYPO3 4.3
   
   New API < TYPO3 4.4
         New API < TYPO3 4.4


.. container:: table-row

   Legacy API > TYPO3 4.3
         <img src="t3lib\_iconWorks::skinImg(...)" />
   
   New API < TYPO3 4.4
         t3lib\_iconWorks::getSpriteIcon('actions-document-new')


.. container:: table-row

   Legacy API > TYPO3 4.3
         t3lib\_iconWorks::getIconImage(...)
   
   New API < TYPO3 4.4
         t3lib\_iconWorks::getSpriteIconForRecord('tt\_content')


.. container:: table-row

   Legacy API > TYPO3 4.3
   
   
   New API < TYPO3 4.4
         t3lib\_iconWorks::getSpriteIconForFile('pdf')


.. ###### END~OF~TABLE ######

