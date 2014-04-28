Eat My Gif
======
## Drop in, upload gifs, eat pie.
Dead simple drop in php script for publishing an animated gif archive. 
[Take a look](http://redgarrett.com/lab/gifs/)

![Yay!](http://redgarrett.com/lab/gifs/a/25_yay2.gif "Yay!")

 * Animated Gifs!
 * Lots of them! 
 * CDN-hosted javascript
 * [Isotope.js](https://github.com/desandro/isotope) support by @desandro
 * Pagination
 * Drop-in directory scanning
 * Only basic styling
 * Order by modified date
 * Info on when files were uploaded


Installation
----------
Requires Apache, php and somewhere to stick it.

![Sweet Jesus](http://redgarrett.com/lab/gifs/a/JmBkN.gif "Sweet Jesus!")


Usage
-----
I have this script [installed on my server](http://redgarrett.com/lab/gifs/). 
Index.php is in the `gifs` directory and my files are stored in `gifs/a`. 
If you just want to drop it in I suggest replicating the same setup. 

![Beep boop](http://redgarrett.com/lab/gifs/a/ii_1409c53d1b4a339b.gif "Beep boop")


Configure
---------
You change some configuration instructions in the index.php file.

So far you have the ability to change 
* Your gif directory relative to index.php
* The gif you want to start with
* How many gifs per page
* The page you want to start on
* Your twitter username (for contact info)

![Developer](http://redgarrett.com/lab/gifs/a/tumblr_ml1br7CRm51rwydguo1_500.gif "Like a Developer")


Development Recommendations
----------
Give your own spin. I **highly** encourage people to stick in their own js and css to make it their own. 

Don't make it ugly. 

![Angry face](http://redgarrett.com/lab/gifs/a/ypbDynK.gif "Angry face")


Changelog
-------------
### v0.2 2013-09-07 - What the Hell is Going on? (W.H.i.G.)
- Moved the logic to the top and the output to the bottom
- Added a version number so you know what's going on
- Added in page and item numbers
- Check to make sure you actually added files to the directory you said you would

![W.H.i.G.](http://redgarrett.com/lab/gifs/a/tumblr_lnkmp1Chn61qd10pyo1_500.gif "W.H.i.G.")


### v0.1 2013-09-07 - Small Mad Angel Child (S.M.A.C.)
- Get gifs, order by modified (latest first), output modified date on image
- Add jQuery and Isotope via CDN, use base Isotope settings
- HTML5 markup
- Pagination + settings
- Basic, basic error handling
- Awesome readme file

![S.M.A.C.](http://redgarrett.com/lab/gifs/a/tumblr_mo0c30KGtG1rcy99do1_500.gif "S.M.A.C.")


License (Simplified BSD)
-------------

Copyright (C) 2013 Mike Garrett

	All rights reserved.
	
	Redistribution and use in source and binary forms, with or without
	modification, are permitted provided that the following conditions are met: 
	
	1. Redistributions of source code must retain the above copyright notice, this
	   list of conditions and the following disclaimer. 
	2. Redistributions in binary form must reproduce the above copyright notice,
	   this list of conditions and the following disclaimer in the documentation
	   and/or other materials provided with the distribution. 
	
	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
	ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
	ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
	
	The views and conclusions contained in the software and documentation are those
	of the authors and should not be interpreted as representing official policies, 
	either expressed or implied, of Mike Garrett.
	
![Well done](http://redgarrett.com/lab/gifs/a/tumblr_li8ic3BwYu1qz8x7f.gif "Well done!")


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/MikeNGarrett/eat-my-gif/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

