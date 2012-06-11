

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


About this document
^^^^^^^^^^^^^^^^^^^

This document explains how CSS classes and icons in the TYPO3 Backend
are defined. It is the basis for a consistent naming convention to
ease the skinning of the TYPO3 Backend, as well as to ensure
consistency.

The goals of the CSS naming convention are the following points:

- The designer should have a clear idea for which purpose a CSS class is
  intended to be used just by reading the name of the class. He should
  have a clear understanding which CSS selectors he can use to style
  elements.

- The developer must be aware where he should add CSS classes to the
  HTML output. When new CSS classes are required, he should know how to
  define them, since he has a document explaining the naming
  conventions.

Developers and designers should stick to these guidelines as much as
possible. Following these simple rules will make it easier to have a
consistent look and feel all around the TYPO3 Backend. Old pieces of
code are still present in TYPO3 and it will almost be impossible to
change everything but this document is considered as a starting point
for new developments.

Note that this document is provided as guidelines  **for TYPO3 v4.4
and above** . TYPO3 versions below v4.4 will stick to the old legacy
CSS stylesheet located intypo3/stylesheet.cssof the TYPO3 package.
This document does not target TYPO3 v5 either.

