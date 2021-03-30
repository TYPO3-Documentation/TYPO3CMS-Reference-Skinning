.. include:: ../../Includes.txt


Use case 1: load additional stylesheets to skin the Backend
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Step 1: add following line into ext\_tables.php to register the
extension ::

   $GLOBALS['TBE_STYLES']['skins'][$_EXTKEY]['name'] = $EXTKEY;

Step2: save CSS files with your extension.The name of the CSS files
does not matter really. More importantly, CSS files need to be saved
in a specific location to be automatically added onto the Backend:

\- EXT:extension/stylesheets/structure/-
EXT:extension/stylesheets/visual/


((generated))
"""""""""""""

Example of CSS
~~~~~~~~~~~~~~

::

   table.t3-page-columns {
       width:100%; // 800px
   }

   td.t3-page-column-2 {
       min-width:200px;
       Width:20%;
       background-color:red;
   }

   td.t3-page-column-0{
       width:78%;
       min-width:400px;
   }


