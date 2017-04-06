/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * The 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */
if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'drupal',
    [
        /* Inline Styles */
        { name : 'Span'             , element : 'span' },
        { name : 'Big'              , element : 'big' },
        { name : 'Small'            , element : 'small' },

        { name : 'Computer Code'    , element : 'code' },
        { name : 'Keyboard Phrase'  , element : 'kbd' },
        { name : 'Sample Text'      , element : 'samp' },
        { name : 'Variable'         , element : 'var' },

        { name : 'Deleted Text'     , element : 'del' },
        { name : 'Inserted Text'    , element : 'ins' },

        { name : 'Cited Work'       , element : 'cite' },
        { name : 'Inline Quotation' , element : 'q' },


        /* Object Styles */
        /*
         * For images, you need to tell ckeditor it's a widget rather than element
         * Thanks: https://www.drupal.org/node/2642808#comment-10796546
         * NOTE: Using 'image' widget is dependent on having enhanced image plugin (image2)
         * http://ckeditor.com/addon/image2
         * Place in contrib/ckeditor/plugins
         */
        {
            name: 'Image on Left',
            type: 'widget',
            widget: 'image',
            attributes: {
                'class': 'align-left',
                'align' : 'left'
            }
        },
        {
            name: 'Image on Right',
            type: 'widget',
            widget: 'image',
            attributes: {
                'class': 'align-right',
                'align' : 'right'
            }
        }

    ]);
}
