.. include:: ../../Includes.txt


When to use an id rather than a class attribute?
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

It makes sense to use the "id" attribute (additionally to a generic
class if possible), especially when JavaScript is or could be involved
in some way. Every "id" needs to be prefixed by "t3-" and should be
used rather on block element like div, form, p, etc.

Example with block tag::

   <div class="t3-module" id="t3-module-page-container" />
   <form class="t3-form t3-form-fileupload" id="t3-fileupload" />

Special cases exist where an ID is needed to reference another element
within the HTML document like "label" and "input" tags. ::

   <label class="t3-form-label" for="t3-myinput" />
   <input class="t3-form-input" id="t3-myinput" />

