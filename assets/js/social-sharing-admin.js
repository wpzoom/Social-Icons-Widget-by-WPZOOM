/**
 * Social Sharing Admin JavaScript
 *
 * Simple file to prevent 404 errors in the console
 */
(function($) {
    'use strict';
    
    // This file is intentionally minimal
    // It's required to prevent 404 errors since it's enqueued in the PHP
    
    // Initialize when document is ready
    $(document).ready(function() {
        // Custom admin behaviors can be added here in the future
        
        // Apply any custom admin UI behaviors for the meta boxes
        initMetaBoxBehaviors();
    });
    
    /**
     * Initialize meta box behaviors
     */
    function initMetaBoxBehaviors() {
        // Make the meta box title more prominent
        const metaBoxTitle = document.querySelector('#wpzoom_sharing_settings h2.hndle');
        if (metaBoxTitle) {
            metaBoxTitle.style.fontWeight = '600';
        }
        
        // Make the description text nicer
        const descriptionText = document.querySelector('#wpzoom_sharing_settings .description p');
        if (descriptionText) {
            descriptionText.style.fontStyle = 'italic';
            descriptionText.style.color = '#646970';
        }
    }
})(jQuery); 