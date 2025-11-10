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