.. include:: ../Includes.txt
.. include:: Images.txt


CSS Files Organization
----------------------

All CSS files used in the Backend are in one of two following folders
" **structure** " or " **visual** ".

Every CSS file inside the " **structure** " directory deals with the
layout, positioning of elements and grid-like structure of a page.
Typical attributes are: padding, margin, height, width, position,
float, etc...

Every CSS file inside the " **visual** " directory basically deals
with colors, background images and so on. Typical attributes are:
font-size, font-weight, color, background, etc...


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Structure
         Structure

   Visual
         Visual


.. container:: table-row

   Structure
         padding, margin

         width, height

         position

         float

         display

         visibility

         top, right, bottom, left

         z-index

         clear

   Visual
         font

         color

         background

         border

         overflow

         vertical-align

         white-space

         cursor

         text

         box-shadow

         list-styleline-height


.. ###### END~OF~TABLE ######


In the TYPO3 Core itself, you will find  **mainly** styles that belong
to the structure of a page, you will find this under
typo3/stylesheets/structure/. There is  **no** visual stylesheet
because it is the purpose of a skin to "dress up" the TYPO3 Backend.
You can experiment by removing every skin extension from the Extension
Manager. You will have a "naked" but still usable TYPO3 Backend.

|img-3| Furthermore, styles should be grouped together to identify them
easily. But instead of having one big file that contains all styles,
they are in separate files according to their purpose. The stylesheets
for the TYPO3 Core are:

|img-4| For a more in-depth understanding of the structure, have a look into
the files within "typo3/stylesheets/".

In a skin extension, it makes sense to have a "visual" folder
containing all the icons, backgrounds, stylesheets etc. The
"structure" folder will contain styles that may override the default
structure styles. Normally, you should have more visual styles than
structure styles in a skin.

|img-5| #. the icons folder

#. the different group of icons

#. the stylesheets containing the sprites, structure and visual
   information


