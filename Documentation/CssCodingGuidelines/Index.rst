.. include:: ../Includes.txt


CSS Coding Guidelines
---------------------

- All CSS selectors (classes or IDs) are lowercase, multiple words are
  separated with a hyphen, no underscore nor camel-case.

- All CSS definitions should take place in a CSS file or in a CSS part
  at the top of the page, inline styles are highly discouraged.

- All CSS inclusions should be done through the appropriate <style> tag
  in HTML, and not through the @import statement, they also should have
  proper "media" attributes.

- It is encouraged to use generic classes for common styling issues
  instead of "id".

- It is discouraged to prepend the HTML tag in front of a generic CSS
  selector, however if you need to specify one, write it in lowercase
  (span.t3-icon instead of SPAN.t3-icon).

- Use as little cascading as possible. "It is encourage to use cascading
  when there is no class defined"

- Also, it is strongly discouraged to use multiple class definitions in
  one selector due to a bug in Internet Explorer 6 (e.g. .t3-icon.t3
  -icon-blue).

- Attribute selectors (e.g. input[type=submit]) should be avoided also
  due to certain limitations in some browsers.

CSS statements are written as below::

   .t3-icon,
   .t3-link {
           display: inline;
           overflow: hidden;
           height: 18px;
           padding-bottom: 5px;
           padding-left: 18px;
   }


.. toctree::
   :maxdepth: 5
   :titlesonly:
   :glob:

   ((generated))/Index

