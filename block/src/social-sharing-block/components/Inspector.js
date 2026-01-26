/**
 * Inspector Controls
 */

// Import block dependencies and components
import { __ } from '@wordpress/i18n';
import { 
	InspectorControls, 
	PanelColorSettings,
	__experimentalPanelColorGradientSettings as PanelColorGradientSettings,
	getColorClassName,
	useBlockProps
} from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	ToggleControl,
	SelectControl,
	CheckboxControl,
	RadioControl,
	ButtonGroup,
	Button,
	TabPanel,
	Flex,
	FlexItem,
	FlexBlock,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
	__experimentalDivider as Divider,
	__experimentalSpacer as Spacer,
	__experimentalUnitControl as UnitControl,
	Icon,
	Tooltip,
	DraggableChip,
	TextControl
} from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import { dragHandle } from '@wordpress/icons';

/**
 * Create an Inspector Controls wrapper Component
 */
export default function Inspector({ attributes, setAttributes }) {
	const {
		align,
		showLabels,
		iconColor,
		iconHoverColor,
		labelColor,
		labelHoverColor,
		iconSize,
		labelSize,
		paddingVertical,
		paddingHorizontal,
		marginVertical,
		marginHorizontal,
		borderRadius,
		backgroundStyle,
		hasBorder,
		platforms,
		oneToneColor
	} = attributes;

	// Check if we're editing the sharing config page by looking for the post type in body class
	const bodyClasses = document.body.className;
	const isEditingSharingConfig = bodyClasses.includes('post-type-wpzoom-sharing');
	
	// State for dragging
	const [isDragging, setIsDragging] = useState(false);
	const [draggedItemIndex, setDraggedItemIndex] = useState(null);
	const [dragOverItemIndex, setDragOverItemIndex] = useState(null);

	// Check styles directly from className for more reliability
	const className = attributes.className;
	const isOneToneStyle = className?.includes('is-style-one-tone');
	const isFilledSquareStyle = className?.includes('is-style-filled');
	const isRoundedStyle = className?.includes('is-style-rounded'); 
	const isOutlinedPillStyle = className?.includes('is-style-outlined-pill');
	const isOutlinedSquareStyle = className?.includes('is-style-outlined-square');
	const isMinimalStyle = className?.includes('is-style-minimal');
	
	// For backward compatibility, also check blockProps
	const blockProps = useBlockProps.save();
	const hasOneToneStyle = isOneToneStyle || blockProps.className?.includes('is-style-one-tone');
	const hasFilledSquareStyle = isFilledSquareStyle || blockProps.className?.includes('is-style-filled');
	const hasRoundedStyle = isRoundedStyle || blockProps.className?.includes('is-style-rounded');
	const hasOutlinedPillStyle = isOutlinedPillStyle || blockProps.className?.includes('is-style-outlined-pill');
	const hasOutlinedSquareStyle = isOutlinedSquareStyle || blockProps.className?.includes('is-style-outlined-square');
	const hasMinimalStyle = isMinimalStyle || blockProps.className?.includes('is-style-minimal');

	// Helper function to update border radius based on style
	const updateBorderRadiusForStyle = (styleName) => {
		let newBorderRadius = borderRadius;
		
		// Set appropriate border radius based on selected style
		if (styleName.includes('is-style-filled')) {
			newBorderRadius = 0;
		} else if (styleName.includes('is-style-rounded')) {
			newBorderRadius = 8;
		} else if (styleName.includes('is-style-default') || styleName.includes('is-style-outlined-pill')) {
			newBorderRadius = 50;
		} else if (styleName.includes('is-style-outlined-square')) {
			newBorderRadius = 0;
		}
		
		setAttributes({ borderRadius: newBorderRadius });
	};

	// Ensure oneToneColor has a value when One Tone style is selected
	useEffect(() => {
		if (hasOneToneStyle && (!oneToneColor || oneToneColor === undefined)) {
			setAttributes({ oneToneColor: '#000000' });
			
			// Set icon and label colors to white for One Tone style for better visibility
			setAttributes({ 
				iconColor: '#ffffff',
				labelColor: '#ffffff'
			});
		}
	}, [hasOneToneStyle, oneToneColor]);

	// React to className changes to detect style changes
	useEffect(() => {
		// Set colors for outlined and minimal styles
		if (className?.includes('is-style-outlined-pill') || 
		    className?.includes('is-style-outlined-square') || 
		    className?.includes('is-style-minimal')) {
		    
			// Only update if current color is white or close to it, to avoid changing custom colors
			if (iconColor === '#ffffff' || iconColor === '#fff' || !iconColor) {
				setAttributes({ iconColor: '#000000' });
			}
			
			if (labelColor === 'inherit' || labelColor === '#ffffff' || labelColor === '#fff' || !labelColor) {
				setAttributes({ labelColor: '#000000' });
			}
		} else if (className?.includes('is-style-one-tone')) {
			// Set colors to white for one tone style
			setAttributes({ 
				iconColor: '#ffffff',
				labelColor: '#ffffff'
			});
		} else if (className?.includes('is-style-default') || 
		           className?.includes('is-style-filled') || 
		           className?.includes('is-style-rounded')) {
			// Set colors to white for default, filled, and rounded styles
			setAttributes({ 
				iconColor: '#ffffff',
				labelColor: '#ffffff'
			});
		}
	}, [className, setAttributes]);

	// When block className changes, check and update border radius and colors accordingly
	useEffect(() => {
		if (blockProps.className) {
			// Update border radius based on style
			updateBorderRadiusForStyle(blockProps.className);
			
			// Set colors to black for outlined and minimal styles
			if (hasOutlinedPillStyle || hasOutlinedSquareStyle || hasMinimalStyle) {
				// Only update if current color is white or close to it, to avoid changing custom colors
				if (iconColor === '#ffffff' || iconColor === '#fff' || !iconColor) {
					setAttributes({ iconColor: '#000000' });
				}
				
				if (labelColor === 'inherit' || labelColor === '#ffffff' || labelColor === '#fff' || !labelColor) {
					setAttributes({ labelColor: '#000000' });
				}
			} else if (hasOneToneStyle) {
				// Set colors to white for one tone style
				setAttributes({ 
					iconColor: '#ffffff',
					labelColor: '#ffffff'
				});
			} else if (blockProps.className?.includes('is-style-default') || 
			           blockProps.className?.includes('is-style-filled') || 
			           blockProps.className?.includes('is-style-rounded')) {
				// Set colors to white for default, filled, and rounded styles
				setAttributes({ 
					iconColor: '#ffffff',
					labelColor: '#ffffff'
				});
			}
		}
	}, [blockProps.className, hasOutlinedPillStyle, hasOutlinedSquareStyle, hasMinimalStyle, hasOneToneStyle, setAttributes]);

	const onTogglePlatform = (platformId, enabled) => {
		const updatedPlatforms = platforms.map(platform => {
			if (platform.id === platformId) {
				return {
					...platform,
					enabled,
				};
			}
			return platform;
		});

		setAttributes({ platforms: updatedPlatforms });
	};
	
	// Handle manual platform reordering with buttons
	const movePlatform = (currentIndex, newIndex) => {
		if (newIndex < 0 || newIndex >= platforms.length) return;
		
		const newPlatforms = [...platforms];
		const [movedItem] = newPlatforms.splice(currentIndex, 1);
		newPlatforms.splice(newIndex, 0, movedItem);
		
		// Update all attributes at once to ensure they're saved properly
		setAttributes({
			platforms: newPlatforms,
			showLabels: showLabels,
			borderRadius: borderRadius,
			align: align,
			iconColor: iconColor,
			iconSize: iconSize,
			labelSize: labelSize,
			paddingVertical: paddingVertical,
			paddingHorizontal: paddingHorizontal,
			marginVertical: marginVertical,
			marginHorizontal: marginHorizontal,
			hasBorder: hasBorder
		});
	};
	
	// HTML5 Drag and Drop handlers
	const handleDragStart = (e, index) => {
		setIsDragging(true);
		setDraggedItemIndex(index);
		
		// Set data for drag operation
		e.dataTransfer.effectAllowed = 'move';
		e.dataTransfer.setData('text/plain', index.toString());
		
		// Add styling to the dragged item
		setTimeout(() => {
			document.querySelectorAll('.wpzoom-social-platform-item')[index].classList.add('is-dragging');
		}, 0);
	};
	
	const handleDragOver = (e, index) => {
		e.preventDefault(); // Necessary to allow dropping
		e.dataTransfer.dropEffect = 'move';
		
		if (draggedItemIndex !== index) {
			setDragOverItemIndex(index);
		}
	};
	
	const handleDragEnter = (e, index) => {
		e.preventDefault();
		
		if (draggedItemIndex !== index) {
			// Add visual feedback
			document.querySelectorAll('.wpzoom-social-platform-item')[index].classList.add('drag-over');
		}
	};
	
	const handleDragLeave = (e, index) => {
		// Remove visual feedback
		document.querySelectorAll('.wpzoom-social-platform-item')[index].classList.remove('drag-over');
	};
	
	const handleDrop = (e, dropIndex) => {
		e.preventDefault();
		e.stopPropagation();
		
		// Get the dragged item index
		const dragIndex = parseInt(e.dataTransfer.getData('text/plain'), 10);
		
		// Move the platform if the indices are different
		if (dragIndex !== dropIndex) {
			const newPlatforms = [...platforms];
			const [movedItem] = newPlatforms.splice(dragIndex, 1);
			newPlatforms.splice(dropIndex, 0, movedItem);
			
			// Update all attributes to ensure they're saved properly
			setAttributes({
				platforms: newPlatforms,
				showLabels: showLabels,
				borderRadius: borderRadius,
				align: align,
				iconColor: iconColor,
				iconSize: iconSize,
				labelSize: labelSize,
				paddingVertical: paddingVertical,
				paddingHorizontal: paddingHorizontal,
				marginVertical: marginVertical,
				marginHorizontal: marginHorizontal,
				hasBorder: hasBorder
			});
		}
		
		// Reset state
		setIsDragging(false);
		setDraggedItemIndex(null);
		setDragOverItemIndex(null);
		
		// Clean up visual feedback
		document.querySelectorAll('.wpzoom-social-platform-item').forEach(item => {
			item.classList.remove('is-dragging', 'drag-over');
		});
	};
	
	const handleDragEnd = (e) => {
		// Reset state
		setIsDragging(false);
		setDraggedItemIndex(null);
		setDragOverItemIndex(null);
		
		// Clean up visual feedback
		document.querySelectorAll('.wpzoom-social-platform-item').forEach(item => {
			item.classList.remove('is-dragging', 'drag-over');
		});
	};

	return (
		<>
			<InspectorControls>
				{/* Pro Features Upsell Panel */}
				<PanelBody
					title={
						<>
							{__('Pro Features', 'social-icons-widget-by-wpzoom')}
							<span className="wpzoom-pro-badge" style={{
								background: '#2271b1',
								color: '#fff',
								fontSize: '9px',
								padding: '2px 5px',
								borderRadius: '3px',
								marginLeft: '6px',
								textTransform: 'uppercase',
								fontWeight: '600',
								verticalAlign: 'middle'
							}}>Pro</span>
						</>
					}
					initialOpen={true}
				>
					<div className="wpzoom-pro-features-upsell">
						<ToggleControl
							label={__('Show Like Button', 'social-icons-widget-by-wpzoom')}
							checked={false}
							onChange={() => {}}
							disabled={true}
						/>
						<ToggleControl
							label={__('Show Share Counts', 'social-icons-widget-by-wpzoom')}
							checked={false}
							onChange={() => {}}
							disabled={true}
						/>
						<ToggleControl
							label={__('Show Individual Counts', 'social-icons-widget-by-wpzoom')}
							checked={false}
							onChange={() => {}}
							disabled={true}
						/>

						<Divider />

						<div className="wpzoom-ai-platforms-preview" style={{ marginTop: '12px' }}>
							<p style={{
								margin: '0 0 8px 0',
								fontWeight: '500',
								fontSize: '11px',
								textTransform: 'uppercase',
								color: '#757575'
							}}>
								{__('AI Share Buttons', 'social-icons-widget-by-wpzoom')}
							</p>
							<div style={{
								display: 'flex',
								gap: '6px',
								flexWrap: 'wrap'
							}}>
								<span style={{
									display: 'inline-flex',
									alignItems: 'center',
									gap: '5px',
									padding: '6px 10px',
									background: '#10A37F',
									borderRadius: '50px',
									fontSize: '11px',
									color: '#fff',
									fontWeight: '500'
								}}>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="#fff">
										<path d="M22.282 9.821a5.985 5.985 0 0 0-.516-4.91 6.046 6.046 0 0 0-6.51-2.9A6.065 6.065 0 0 0 4.981 4.18a5.985 5.985 0 0 0-3.998 2.9 6.046 6.046 0 0 0 .743 7.097 5.98 5.98 0 0 0 .51 4.911 6.051 6.051 0 0 0 6.515 2.9A5.985 5.985 0 0 0 13.26 24a6.056 6.056 0 0 0 5.772-4.206 5.99 5.99 0 0 0 3.997-2.9 6.056 6.056 0 0 0-.747-7.073zM13.26 22.43a4.476 4.476 0 0 1-2.876-1.04l.141-.081 4.779-2.758a.795.795 0 0 0 .392-.681v-6.737l2.02 1.168a.071.071 0 0 1 .038.052v5.583a4.504 4.504 0 0 1-4.494 4.494zM3.6 18.304a4.47 4.47 0 0 1-.535-3.014l.142.085 4.783 2.759a.771.771 0 0 0 .78 0l5.843-3.369v2.332a.08.08 0 0 1-.033.062L9.74 19.95a4.5 4.5 0 0 1-6.14-1.646zM2.34 7.896a4.485 4.485 0 0 1 2.366-1.973V11.6a.766.766 0 0 0 .388.676l5.815 3.355-2.02 1.168a.076.076 0 0 1-.071 0l-4.83-2.786A4.504 4.504 0 0 1 2.34 7.872zm16.597 3.855l-5.833-3.387L15.119 7.2a.076.076 0 0 1 .071 0l4.83 2.791a4.494 4.494 0 0 1-.676 8.105v-5.678a.79.79 0 0 0-.407-.667zm2.01-3.023l-.141-.085-4.774-2.782a.776.776 0 0 0-.785 0L9.409 9.23V6.897a.066.066 0 0 1 .028-.061l4.83-2.787a4.5 4.5 0 0 1 6.68 4.66zm-12.64 4.135l-2.02-1.164a.08.08 0 0 1-.038-.057V6.075a4.5 4.5 0 0 1 7.375-3.453l-.142.08L8.704 5.46a.795.795 0 0 0-.393.681zm1.097-2.365l2.602-1.5 2.607 1.5v2.999l-2.597 1.5-2.607-1.5z"/>
									</svg>
									ChatGPT
								</span>
								<span style={{
									display: 'inline-flex',
									alignItems: 'center',
									gap: '5px',
									padding: '6px 10px',
									background: '#D97706',
									borderRadius: '50px',
									fontSize: '11px',
									color: '#fff',
									fontWeight: '500'
								}}>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="#fff">
										<path d="M4.709 15.955l4.72-2.647.08-.08v-.08l-.08-.08-2.085-1.19-.08-.08h-.08l-2.538 1.43c-.795.476-1.272 1.35-1.272 2.25.08.954.557 1.748 1.335 2.17zm8.478 5.483c.716.397 1.59.397 2.306 0l7.035-3.916c.716-.397 1.192-1.19 1.192-2.012V7.672c0-.874-.476-1.668-1.192-2.012l-7.035-3.996c-.716-.397-1.59-.397-2.306 0L6.152 5.66c-.716.397-1.192 1.19-1.192 2.012v3.44l4.8 2.726.08.08h.08l2.085-1.19.08-.08v-.08l-.08-.08-4.72-2.647V7.75l.08-.08 4.8-2.726h.08l4.8 2.726.08.08v7.76l-.08.08-4.8 2.726h-.08l-2.538-1.43-.08-.08h-.08l-2.085 1.19-.08.08v.08l.08.08z"/>
									</svg>
									Claude
								</span>
								<span style={{
									display: 'inline-flex',
									alignItems: 'center',
									gap: '5px',
									padding: '6px 10px',
									background: '#20808D',
									borderRadius: '50px',
									fontSize: '11px',
									color: '#fff',
									fontWeight: '500'
								}}>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="#fff">
										<path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 2.4c5.302 0 9.6 4.298 9.6 9.6 0 5.302-4.298 9.6-9.6 9.6-5.302 0-9.6-4.298-9.6-9.6 0-5.302 4.298-9.6 9.6-9.6zm0 2.4a7.2 7.2 0 1 0 0 14.4 7.2 7.2 0 0 0 0-14.4zm0 2.4a4.8 4.8 0 1 1 0 9.6 4.8 4.8 0 0 1 0-9.6zm0 2.4a2.4 2.4 0 1 0 0 4.8 2.4 2.4 0 0 0 0-4.8z"/>
									</svg>
									Perplexity
								</span>
							</div>
						</div>

						<Spacer margin={4} />

						<Button
							variant="primary"
							href="https://www.wpzoom.com/plugins/social-widget/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=social-icons-free&utm_content=block-inspector"
							target="_blank"
							style={{ width: '100%', justifyContent: 'center' }}
						>
							{__('Upgrade to Pro', 'social-icons-widget-by-wpzoom')}
						</Button>

						<p style={{
							marginTop: '12px',
							fontSize: '11px',
							color: '#757575',
							textAlign: 'center'
						}}>
							{__('Unlock analytics, like buttons, AI sharing & more', 'social-icons-widget-by-wpzoom')}
						</p>
					</div>
				</PanelBody>

				<PanelBody title={__('Sharing Networks', 'social-icons-widget-by-wpzoom')}>
					<p className="components-base-control__help">
						{__('Select which platforms to display. Drag handles to reorder networks.', 'social-icons-widget-by-wpzoom')}
					</p>
					
					<div className="wpzoom-social-icons-platforms-list">
						{platforms.map((platform, index) => (
							<div 
								key={platform.id} 
								className="wpzoom-social-platform-item"
								draggable="true"
								onDragStart={(e) => handleDragStart(e, index)}
								onDragOver={(e) => handleDragOver(e, index)}
								onDragEnter={(e) => handleDragEnter(e, index)}
								onDragLeave={(e) => handleDragLeave(e, index)}
								onDrop={(e) => handleDrop(e, index)}
								onDragEnd={handleDragEnd}
								style={{
									display: 'flex',
									alignItems: 'center',
									padding: '8px 0',
									borderBottom: '1px solid #e0e0e0'
								}}
							>
								<Flex align="center">
									<FlexItem>
										<Tooltip text={__('Drag to reorder', 'social-icons-widget-by-wpzoom')}>
											<span 
												className="drag-handle"
												style={{ 
													cursor: 'grab',
													marginRight: '8px',
													color: '#777'
												}}
											>
												<Icon icon={dragHandle} />
											</span>
										</Tooltip>
									</FlexItem>
									
									<FlexBlock>
										<CheckboxControl
											label={platform.name}
											checked={platform.enabled}
											onChange={(checked) => onTogglePlatform(platform.id, checked)}
										/>
									</FlexBlock>
									
									<FlexItem>
										<ButtonGroup>
											<Tooltip text={__('Move Up', 'social-icons-widget-by-wpzoom')}>
												<Button 
													icon="arrow-up-alt2" 
													onClick={() => movePlatform(index, index - 1)}
													disabled={index === 0}
													isSmall
												/>
											</Tooltip>
											<Tooltip text={__('Move Down', 'social-icons-widget-by-wpzoom')}>
												<Button 
													icon="arrow-down-alt2" 
													onClick={() => movePlatform(index, index + 1)}
													disabled={index === platforms.length - 1}
													isSmall
												/>
											</Tooltip>
										</ButtonGroup>
									</FlexItem>
								</Flex>
							</div>
						))}
					</div>
				</PanelBody>

				{/* Only show Auto-Display Configuration panel if NOT editing the sharing config page */}
				{!isEditingSharingConfig && window.wpzSocialIconsBlock && (
					<PanelBody title={__('Auto-Display Configuration', 'social-icons-widget-by-wpzoom')} initialOpen={false}>
						<p className="components-base-control__help" style={{ marginBottom: '12px' }}>
							{__('Want sharing buttons to appear automatically in all posts/pages?', 'social-icons-widget-by-wpzoom')}
						</p>
						<p className="components-base-control__help" style={{ marginBottom: '12px' }}>
							{__('Configure automatic sharing button display settings for your entire site.', 'social-icons-widget-by-wpzoom')}
						</p>
						{window.wpzSocialIconsBlock.sharingConfigUrl ? (
							<Button
								variant="secondary"
								href={window.wpzSocialIconsBlock.sharingConfigUrl}
								target="_blank"
								style={{ width: '100%' }}
							>
								{__('Open Sharing Buttons Settings →', 'social-icons-widget-by-wpzoom')}
							</Button>
						) : (
							<p className="components-base-control__help">
								{__('Sharing configuration not found. Please save this block first.', 'social-icons-widget-by-wpzoom')}
							</p>
						)}
						<p className="components-base-control__help" style={{ marginTop: '12px', fontSize: '11px', fontStyle: 'italic' }}>
							{__('Note: This will open the admin settings page where you can configure automatic display of sharing buttons across your site.', 'social-icons-widget-by-wpzoom')}
						</p>
					</PanelBody>
				)}

				{/* Show Display Settings helper when editing the sharing config page */}
				{isEditingSharingConfig && (
					<PanelBody title={__('Display Settings', 'social-icons-widget-by-wpzoom')} initialOpen={false}>
						<p className="components-base-control__help" style={{ marginBottom: '12px' }}>
							{__('You are editing the global Sharing Buttons configuration.', 'social-icons-widget-by-wpzoom')}
						</p>
						<p className="components-base-control__help" style={{ marginBottom: '12px' }}>
							{__('To control where these buttons appear automatically on your site, click on the button below.', 'social-icons-widget-by-wpzoom')}
						</p>
						<Button
							variant="secondary"
							onClick={() => {
								// First, try to switch to the document tab (Sharing Buttons tab)
								const documentTab = document.querySelector('button[data-tab-id="edit-post/document"]');
								if (documentTab && documentTab.getAttribute('aria-selected') !== 'true') {
									documentTab.click();
								}

								// Wait a moment for the tab to switch, then scroll to the meta box
								setTimeout(() => {
									const displaySettings = document.getElementById('wpzoom_sharing_settings');
									if (displaySettings) {
										displaySettings.scrollIntoView({ behavior: 'smooth', block: 'center' });
										// Add a highlight effect to the meta box wrapper
										displaySettings.style.transition = 'background-color 0.5s ease';
										displaySettings.style.backgroundColor = '#fff3cd';
										setTimeout(() => {
											displaySettings.style.backgroundColor = '';
										}, 2000);
									} else {
										// Fallback: scroll to the bottom of the page where meta boxes typically are
										window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
									}
								}, 100);
							}}
							style={{ width: '100%' }}
						>
							{__('Jump to Display Settings', 'social-icons-widget-by-wpzoom')}
						</Button>
					</PanelBody>
				)}

				<PanelBody title={__('Display Options', 'social-icons-widget-by-wpzoom')}>
					<ToggleGroupControl
						label={__('Alignment', 'social-icons-widget-by-wpzoom')}
						value={align}
						onChange={(value) => setAttributes({ align: value })}
						isBlock
					>
						<ToggleGroupControlOption
							value="left"
							label={__('Left', 'social-icons-widget-by-wpzoom')}
						/>
						<ToggleGroupControlOption
							value="center"
							label={__('Center', 'social-icons-widget-by-wpzoom')}
						/>
						<ToggleGroupControlOption
							value="right"
							label={__('Right', 'social-icons-widget-by-wpzoom')}
						/>
					</ToggleGroupControl>

					<Spacer margin={4} />

					<ToggleControl
						label={__('Show Labels', 'social-icons-widget-by-wpzoom')}
						checked={showLabels}
						onChange={() => setAttributes({ showLabels: !showLabels })}
					/>
					
					{platforms.some(platform => platform.id === 'x' && platform.enabled) && (
						<>
							<Divider />
							<TextControl
								label={__('X/Twitter Username', 'social-icons-widget-by-wpzoom')}
								help={__('When sharing to X, this will be added as "via @username"', 'social-icons-widget-by-wpzoom')}
								value={attributes.xUsername || ''}
								onChange={(value) => setAttributes({ xUsername: value })}
								placeholder="username"
							/>
						</>
					)}
				</PanelBody>
			</InspectorControls>

			{/* Style Panel */}
			<InspectorControls group="styles">
				<PanelBody title={__('Size & Spacing', 'social-icons-widget-by-wpzoom')}>
					<RangeControl
						label={__('Icon Size', 'social-icons-widget-by-wpzoom')}
						value={iconSize}
						onChange={(value) => setAttributes({ iconSize: value })}
						min={10}
						max={60}
						allowReset
						resetFallbackValue={20}
						withInputField
					/>

					{showLabels && (
						<RangeControl
							label={__('Label Size', 'social-icons-widget-by-wpzoom')}
							value={labelSize}
							onChange={(value) => setAttributes({ labelSize: value })}
							min={10}
							max={40}
							allowReset
							resetFallbackValue={20}
							withInputField
						/>
					)}

					<Divider />

					<RangeControl
						label={__('Vertical Padding', 'social-icons-widget-by-wpzoom')}
						value={paddingVertical}
						onChange={(value) => setAttributes({ paddingVertical: value })}
						min={0}
						max={30}
						allowReset
						resetFallbackValue={10}
						withInputField
					/>

					<RangeControl
						label={__('Horizontal Padding', 'social-icons-widget-by-wpzoom')}
						value={paddingHorizontal}
						onChange={(value) => setAttributes({ paddingHorizontal: value })}
						min={0}
						max={30}
						allowReset
						resetFallbackValue={10}
						withInputField
					/>

					<Divider />

					<RangeControl
						label={__('Vertical Margin', 'social-icons-widget-by-wpzoom')}
						value={marginVertical}
						onChange={(value) => setAttributes({ marginVertical: value })}
						min={0}
						max={30}
						allowReset
						resetFallbackValue={5}
						withInputField
					/>

					<RangeControl
						label={__('Horizontal Margin', 'social-icons-widget-by-wpzoom')}
						value={marginHorizontal}
						onChange={(value) => setAttributes({ marginHorizontal: value })}
						min={0}
						max={30}
						allowReset
						resetFallbackValue={5}
						withInputField
					/>
				</PanelBody>

				<PanelBody title={__('Shape', 'social-icons-widget-by-wpzoom')}>
					<RangeControl
						label={__('Border Radius', 'social-icons-widget-by-wpzoom')}
						value={borderRadius}
						onChange={(value) => setAttributes({ borderRadius: value })}
						min={0}
						max={50}
						allowReset
						resetFallbackValue={50}
						withInputField
						disabled={hasFilledSquareStyle || hasOutlinedSquareStyle || hasOutlinedPillStyle || hasMinimalStyle}
						help={
							hasFilledSquareStyle || hasOutlinedSquareStyle ? 
								__('Border radius is set to 0 for square styles.', 'social-icons-widget-by-wpzoom') :
								hasOutlinedPillStyle ? 
									__('Border radius is set to 50 for pill styles.', 'social-icons-widget-by-wpzoom') :
									hasMinimalStyle ?
										__('Border radius is not applicable for minimal style.', 'social-icons-widget-by-wpzoom') :
										''
						}
					/>

					<ToggleControl
						label={__('Add Border', 'social-icons-widget-by-wpzoom')}
						checked={hasBorder}
						onChange={() => setAttributes({ hasBorder: !hasBorder })}
						disabled={hasOutlinedPillStyle || hasOutlinedSquareStyle || hasMinimalStyle}
						help={
							hasOutlinedPillStyle || hasOutlinedSquareStyle ? 
								__('Border is always enabled for outlined styles.', 'social-icons-widget-by-wpzoom') :
								hasMinimalStyle ?
									__('Border is not applicable for minimal style.', 'social-icons-widget-by-wpzoom') :
									''
						}
					/>
					
					{(hasBorder || hasOutlinedPillStyle || hasOutlinedSquareStyle) && (
						<>
							<RangeControl
								label={__('Border Width', 'social-icons-widget-by-wpzoom')}
								value={attributes.borderWidth || 1}
								onChange={(value) => setAttributes({ borderWidth: value })}
								min={1}
								max={5}
								allowReset
								resetFallbackValue={1}
								withInputField
							/>
							
							<div className="wpzoom-border-color-setting">
								<PanelColorGradientSettings
									title={__('Border Color', 'social-icons-widget-by-wpzoom')}
									initialOpen={false}
									settings={[
										{
											colorValue: (hasOutlinedPillStyle || hasOutlinedSquareStyle) ? iconColor : (attributes.borderColor || '#000000'),
											onColorChange: (value) => {
												if (hasOutlinedPillStyle || hasOutlinedSquareStyle) {
													setAttributes({ iconColor: value });
												} else {
													setAttributes({ borderColor: value });
												}
											},
											label: (hasOutlinedPillStyle || hasOutlinedSquareStyle) 
												? __('Border & Icon Color', 'social-icons-widget-by-wpzoom')
												: __('Border Color', 'social-icons-widget-by-wpzoom'),
											help: (hasOutlinedPillStyle || hasOutlinedSquareStyle)
												? __('For outlined styles, border color matches icon color', 'social-icons-widget-by-wpzoom')
												: '',
										}
									]}
								/>
							</div>
						</>
					)}
				</PanelBody>

				<PanelColorGradientSettings
					title={__('Color Settings', 'social-icons-widget-by-wpzoom')}
					initialOpen={true}
					settings={[
						// Always include the One Tone Background Color option but disable it when not using One Tone style
						{
							colorValue: oneToneColor,
							onColorChange: (value) => setAttributes({ oneToneColor: value }),
							label: __('One Tone Background Color', 'social-icons-widget-by-wpzoom'),
							disabled: !hasOneToneStyle,
							help: hasOneToneStyle ? 
								__('Changes the background color of all icons.', 'social-icons-widget-by-wpzoom') : 
								__('This option is only available with the One Tone style.', 'social-icons-widget-by-wpzoom'),
						},
						{
							colorValue: iconColor,
							onColorChange: (value) => setAttributes({ iconColor: value }),
							label: __('Icon Color', 'social-icons-widget-by-wpzoom'),
							help: hasOutlinedPillStyle || hasOutlinedSquareStyle || hasMinimalStyle ? 
								__('This color will be applied to icons for outlined and minimal styles', 'social-icons-widget-by-wpzoom') : '',
						},
						{
							colorValue: iconHoverColor,
							onColorChange: (value) => setAttributes({ iconHoverColor: value }),
							label: __('Icon Hover Color', 'social-icons-widget-by-wpzoom'),
						},
						...(showLabels ? [
							{
								colorValue: labelColor,
								onColorChange: (value) => setAttributes({ labelColor: value }),
								label: __('Label Color', 'social-icons-widget-by-wpzoom'),
								help: hasOutlinedPillStyle || hasOutlinedSquareStyle || hasMinimalStyle ? 
									__('This color will be applied to labels for outlined and minimal styles', 'social-icons-widget-by-wpzoom') : '',
							},
							{
								colorValue: labelHoverColor,
								onColorChange: (value) => setAttributes({ labelHoverColor: value }),
								label: __('Label Hover Color', 'social-icons-widget-by-wpzoom'),
							},
						] : [])
					]}
				/>
			</InspectorControls>
		</>
	);
} 