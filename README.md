placeweb
========

A fairly uninspiring placeholder page for your resting VPS instances.

##Persistence

You can define a database in database.php, or persistent storage will use data.json

##Request Variables

*set-welcome*

Set the welcome message for the page.
/?set-welcome=Hello World

*set-bgcolor*

Set the background color to a hex.

/?set-bgcolor=6688aa

*compute*

Compute X number of hashes.  These are random and useless, but simulate load.

/?compute=100

*refresh*

Time ( in seconds ) to wait before refreshing the page.

/?refresh=3

**Putting them all together**

/?set-welcome=Testing%20Testing%201.2.3&set-bgcolor=6688aa&compute=10&refresh=5