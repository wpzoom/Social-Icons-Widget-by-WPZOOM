/**
 * WordPress dependencies
 */
(function() {
    wp.domReady( function() {
        
        // Add a class to the body for custom styling
        document.body.classList.add('wpzoom-social-sharing-editor');
        
        // Lock the template to prevent unwanted block manipulation
        setTimeout(function() {
            // Check if there's an "invalid block" message
            const hasInvalidBlock = document.querySelector('.block-editor-warning');
            
            if (hasInvalidBlock) {
                // Try to find the Attempt Recovery button and click it
                const recoveryButton = document.querySelector('.block-editor-warning__action button');
                if (recoveryButton) {
                    recoveryButton.click();
                } else {
                    // If recovery button not found, replace the block
                    replaceWithValidBlock();
                }
            }
            
            // Check if social sharing block exists in the editor
            const hasSocialSharingBlock = wp.data.select('core/block-editor')
                .getBlocks()
                .some(block => block.name === 'wpzoom-blocks/social-sharing');
            
            // If no social sharing block exists, insert one
            if (!hasSocialSharingBlock) {
                replaceWithValidBlock();
            }
            
            // Remove the post title field
            const titlePanel = document.querySelector('.edit-post-visual-editor__post-title-wrapper');
            if (titlePanel) {
                titlePanel.style.display = 'none';
            }
            
            // Add a custom header with instructions
            const editorCanvas = document.querySelector('.edit-post-visual-editor__content-area');
            if (editorCanvas) {
                const instructionsPanel = document.createElement('div');
                instructionsPanel.className = 'wpzoom-sharing-editor-instructions';
                instructionsPanel.innerHTML = `
                    <h2>Configure Your Social Sharing Buttons</h2>
                    <p>These buttons will automatically appear on your content based on the settings in the sidebar. Customize the buttons below, then use the "Display Settings" panel to control where they appear.</p>
                `;
                
                // Insert before the editor content
                const parent = editorCanvas.parentNode;
                parent.insertBefore(instructionsPanel, editorCanvas);
            }
            
            // Focus the editor
            wp.data.dispatch('core/block-editor').clearSelectedBlock();
        }, 500);
        
        /**
         * Replace any existing content with a valid social sharing block
         */
        function replaceWithValidBlock() {
            // Replace all blocks with a new social sharing block
            wp.data.dispatch('core/block-editor').resetBlocks([]);
            
            // Create block with default attributes
            const block = wp.blocks.createBlock('wpzoom-blocks/social-sharing', {
                platforms: [
                    { id: 'facebook', name: 'Facebook', enabled: true, color: '#0866FF' },
                    { id: 'x', name: 'Share on X', enabled: true, color: '#000000' },
                    { id: 'threads', name: 'Threads', enabled: false, color: '#000000' },
                    { id: 'linkedin', name: 'LinkedIn', enabled: true, color: '#0966c2' },
                    { id: 'pinterest', name: 'Pinterest', enabled: false, color: '#E60023' },
                    { id: 'reddit', name: 'Reddit', enabled: false, color: '#FF4500' },
                    { id: 'pocket', name: 'Pocket', enabled: false, color: '#EF3F56' },
                    { id: 'telegram', name: 'Telegram', enabled: false, color: '#0088cc' },
                    { id: 'whatsapp', name: 'WhatsApp', enabled: true, color: '#25D366' },
                    { id: 'bluesky', name: 'Bluesky', enabled: false, color: '#1DA1F2' },
                    { id: 'email', name: 'Email', enabled: true, color: '#333333' },
                    { id: 'copy-link', name: 'Copy Link', enabled: true, color: '#333333' }
                ]
            });
            
            wp.data.dispatch('core/block-editor').insertBlocks(block);
        }
    });
})(); 