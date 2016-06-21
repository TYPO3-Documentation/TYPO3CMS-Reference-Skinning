.. include:: ../../Includes.txt


CSS compression
^^^^^^^^^^^^^^^

CSS compression enables to reduce drastically the size of the
exchanged data between the server and the browser.

Steps can be enabled in the Backend as follows:

#. In the module "Install" > "All configuration", set compression level
   between 1 and 9, where 1 is least compression and 9 is greatest
   compression. Suggested and most optimal value is 5. ::

      $GLOBALS['TYPO3_CONF_VARS']['BE']['compressionLevel'] = 5;


#. In a .htaccessfile or in virtual host add some configuration provided
   by file misc/advanced\_htaccess. ::

      <FilesMatch "\.js\.gzip$">
                   AddType "text/javascript" .gzip
           </FilesMatch>
           <FilesMatch "\.css\.gzip$">
                   AddType "text/css" .gzip
           </FilesMatch>
           AddEncoding gzip .gzip

Followingthose 2 steps will generate a compressed file and therefore
add a "gzip" suffix to the file. ::

   merged-43184ce406ccfb7c04df66f024414129-5c86564215e4bad82a1955b74b639532.css.gzip?1278152902

Itmay happen that the browser does not support GZIP compression for
some reason. Typically, it can be behind a proxy server which does not
support GZIP headers. In this case, the compressor will detect it and
send the un-compressed files.

