Math input for 'Textpattern' content management system

1) Before use, you must first you must copy the accompanying 'mimetex.cgi' file to a folder called 'cgi-bin' your server, and rename it to 'math.cgi' (Or you could edit the php file and get it to point to a different filename and/or location).

2) Within the article editor, place any LaTeX commands between the tags <txp:math> and </txp:math>. For example:

<txp:math>x+y=z</txp:math>

3) When the article is published, you should see a computed PNG image of the mathematical formula in a nicely centered position.
