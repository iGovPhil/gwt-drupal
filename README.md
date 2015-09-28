# Goverment Website Template (GWT) for Drupal
Authored by: Voltz Jeturian voltz.jeturian@icto.dost.gov.ph

###### Future Updates
- Fix Front page list template
- Use menu block as replacement to auxiliary menu
- implement mega menu

###### Known Bugs
- White screen error on certain installation (updates), no admin menu
- Access key missing node error
- some access keys not working properly (site map)
- ~~dynamic column panel top, panel bottom, and agency footer~~

###### CHANGE LOGS
**05-20-2014**
- created iGOv GWT Theme
  - installed foundation js/css framework

**05-21-2014**
- created some regions by basic on the GWT template guides

**05-22-2014**
- continued restyling to adapt the GWT static template design

**05-23-2014**
- created iGov GWT Theme Module that adds more functionality settings for the theme
  - created block settings for the GWT sliders
    - created custom image upload forms and image style settings

**05-24-2014**
- Created block settings for transparency seal Block, when the theme is intalled, it automatically place itself on the left sidebar by default but can be rearranged to different regions

**05-26-2014**
- ~~Deleted block settings for GWT sliders, must used content types instead~~

**05-28-2014**
- added install script that adds automatically the gwt slides content type
  - added install fields(image upload, caption and link fields) for the gwt slides content type
- added install script that creates an image style that is used to automatically resize image slides when displayed

**06-01-2014**


- added uninstall script that cleans up the fields and content types, maybe also deletes the uploaded images on unsinstallation
- added uninstall script that delete the image style

**06-05-2014**
- created and styled the banner slide show
- upon adding new gwt_slides it automatically adds to the banner slider block module

**06-06-2014**
- responsive menu is now working
- updated the fontsize of the menu

**06-13-2014**
- fixed revision
  - added dynamic regions for banner
  - added dynamic regions for agency footer

**06-18-2014**
- added bg colors to the theme settings for masthead and banner

**01-07-2015**
- Implement New 6.0 gwt design
- Added Auxiliary region
- fix theme settings for masthead and banner

**02-12-2015**
- add panel top and bottom regions
- Fix accessibility shortcuts
- smaller fontsize for regions
- added box-mode class for general blocks

**03-18-2015**
- Added default breadcrumb support

**04-10-2015**
- Updated GWT-Footer Script
- added drop shadow for dropdown menu

**04-16-2015**
- Fix compatibility issue on Drupal 7.36

**05-22-2015**
- Change the font size of the sidebar headings

**06-11-2015**
- Fix the sorting issue on GWT-slider order weight field

**07-03-2015**
- Fixed empty auxiliary on responsive layout

**08-20-2015**
- Added new Mega menu
- Added new accessibility features
  - High Contrast Mode
  - Grayscale Mode
  - Toggle font size

**09-07-2015**
- fixed the region balance error

**09-11-2015**
- fixed fatal error undeclared function error

**09-21-2015**
- removed font-resize, added accessibility statement pop-up
- restyled the breadcrumbs

**09-23-2015**
- change the accessibility widget to right side
- fix overlap top menu

**09-28-2015**
- hide header section if logo or site name is hidden
- added accessibility widget toggle theme settings
