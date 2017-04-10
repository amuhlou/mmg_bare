MMG Bare Subtheme:

This is an MMG-flavored subtheme. Inspired by Bare, but with some additions to help build out MMG
sites with more ease and efficiency.

Things to look for:

1) The logo is set as a variable in template.php, line 36

2) Check your variables! (scss/base/_variables.scss)
In scss/base/_variables.scss there are some pre-defined 'mmg' colors & fonts.
Create your own based your site's style guide.

3) Instead of having an empty page.tpl.php, mobile & desktop nav
styling is in place. It might need some tweaks for your site
but it works out of the box. The theme renders your main & secondary menus twice
for desktop vs mobile layouts.

4) The Secondary menu is currently using the 'user' menu.
Change it to whatever your secondary menu's machine name is in template.php, line 49

