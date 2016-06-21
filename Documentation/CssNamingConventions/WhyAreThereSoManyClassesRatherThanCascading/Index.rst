.. include:: ../../Includes.txt


Why are there so many classes rather than cascading?
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Using many classes might burden the HTML output. But on the other
hand, it is a fast way for the browser to decorate elements, rather
than dealing with complicated cascades and selectors. This is
especially true when dealing with a big XML tree structure like in the
TYPO3 Backend. It is encouraged to use cascading when there is no
class defined and styling for a certain element is needed. This is
mostly true for inline elements like legend, span, a, strong,
blockquote, img, em, li, etc.

Just a few examples::

   .t3-form-fieldset legend {
           ...
   }

   .t3-form-element span {
           ...
   }

