.. include:: ../Includes.txt


CSS Naming Conventions
----------------------

A CSS class  **name** is defined according to whatever the element
**is** or does rather than being linked to a specific context. The
purpose is to be able to reuse a name anytime in the TYPO3 Backend
while keeping a consistent look & feel.

Nevertheless, to avoid conflicts in the naming scheme, all news styles
are expected to use a "t3-" prefix. This will prevent naming
collisions when mixing up stylesheets with another application or
styles from the old skinning parts.

To be more concrete, let's give a good example of CSS class names::

   <input class="t3-form-text t3-form-field" type="text" />

At the first glance, it seems to be redundant to have multiple
classes, but in fact it allows to have very fine-grained CSS
selectors. The "t3-form-field" class is the base class for every input
elements within the TYPO3 backend, and enables TYPO3 to give a default
style to every input elements. In addition, there is the "t3-form-
text" class to make it possible to have additional decorations on the
input. Please notice the dash "-" which is used as separator inside
the names.

Now let's have a look at a  **bad** example::

   <input class="t3-input-line-table">

This is a  **bad** example as one can't guess the purpose of the "t3
-input-line-table" selector. It contains the word "table" but is used
within an input field which makes it semantically hard to understand
the purpose of the class. Furthermore it creates confusion with the
"table" HTML tag.


.. toctree::
   :maxdepth: 5
   :titlesonly:
   :glob:

   IconsNamingConventions/Index
   WhyAreThereSoManyClassesRatherThanCascading/Index
   WhenToUseAnIdRatherThanAClassAttribute/Index

