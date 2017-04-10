MMG Bare Subtheme:

This is an MMG-flavored subtheme. Inspired by Bare (https://github.com/timodwhit/bare), but with some additions to help build out MMG sites with more ease and efficiency.

This theme uses Grunt (see Gruntfile.js), Compass (see _scss/base/libraries.scss), and Bundler.
You may need to install these.

Themer Tips, in no particular order:

1) The logo is set as a variable in template.php, line 36

2) Check your variables! (scss/base/_variables.scss)
In scss/base/_variables.scss there are some pre-defined 'mmg' colors & fonts.
Create your own based your site's style guide.

3) Mobile & desktop nav styling is in place. It might need some tweaks for your site
but it works out of the box. The theme renders your main & secondary menus twice
for desktop & mobile layouts. See js/mmg.js for the nav toggle functionality
& page.tpl.php for the structure.

4) The Secondary menu is currently using the 'user' menu.
Change it to whatever your secondary menu's machine name is in template.php, line 49

5) Media Query Breakpoints (scss/base/_variables.scss line 132)
We have some pre-set breakpoints but feel free to change them out to your needs

6) Breakpoints Module Breakpoints (mmg_bare.info)
Breakpoints for the Breakpoints module (to use in conjunction with the picture module)
are set in the theme .info file. If you change them, rescan for theme breakpoints at
/admin/config/media/breakpoints/groups/mmg_bare

6) Slick Slideshow Arrow Defaults (scss/base/_extandables.scss)
Some defaults for the slick slideshow arrows are in place so you can be up and running by
using a simple @extend declaration. See scss/components/slideshow/_slideshow.scss
for an example.

7) There are lots of empty SASS partials for the standard MMG components/assets (scss/components/*)
Hopefully this saves you some time.

8) If you want to use any additional compass plugins, add them at the top
of the theme's config.rb file


