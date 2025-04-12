/**
 * External dependencies
 */
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { useEffect, useState } from '@wordpress/element';
import { 
	Popover, 
	Button, 
	TextControl, 
	Tooltip,
	PanelBody
} from '@wordpress/components';

/**
 * Internal dependencies
 */
import Inspector from './Inspector';
import SocialIcons from './SocialIcons';

/**
 * Block edit function
 */
export default function Edit({ attributes, setAttributes, className, isSelected }) {
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
	} = attributes;

	// State for popover
	const [editingPlatform, setEditingPlatform] = useState(null);
	const [editingLabel, setEditingLabel] = useState('');

	const blockProps = useBlockProps({
		className: classnames(className, {
			[`align-${align}`]: align,
			'wpzoom-social-sharing-block': true,
		}),
	});

	const containerStyle = {
		textAlign: align,
	};

	// Filter enabled platforms
	const enabledPlatforms = platforms.filter(platform => platform.enabled);

	// Update platform label
	const updatePlatformLabel = (platformId, newLabel) => {
		const updatedPlatforms = platforms.map(platform => {
			if (platform.id === platformId) {
				return {
					...platform,
					name: newLabel
				};
			}
			return platform;
		});
		
		setAttributes({ platforms: updatedPlatforms });
		setEditingPlatform(null);
	};

	return (
		<>
			<Inspector attributes={attributes} setAttributes={setAttributes} />
			<div {...blockProps} style={containerStyle}>
				{enabledPlatforms.length > 0 ? (
					<ul className="social-sharing-icons">
						{enabledPlatforms.map((platform, index) => {
							const buttonStyle = {
								padding: `${paddingVertical}px ${paddingHorizontal}px`,
								margin: `${marginVertical}px ${marginHorizontal}px`,
								borderRadius: `${borderRadius}px`,
								fontSize: `${iconSize}px`,
								color: iconColor,
								backgroundColor: platform.color || '#333333',
								border: hasBorder ? '1px solid' : 'none',
							};

							return (
								<li key={platform.id} className="social-sharing-icon-li">
									<a 
										className={`social-sharing-icon social-sharing-icon-${platform.id}`}
										style={buttonStyle}
										href="#"
										title={platform.name}
										onClick={(e) => {
											e.preventDefault();
											if (isSelected) {
												setEditingPlatform(platform.id);
												setEditingLabel(platform.name);
											}
										}}
									>
										<SocialIcons 
											id={platform.id} 
											size={iconSize} 
											color={iconColor || '#ffffff'} 
										/>
										
										{showLabels && (
											<span 
												className="social-sharing-icon-label"
												style={{ 
													fontSize: `${labelSize}px`,
													color: labelColor
												}}
											>
												{platform.name}
											</span>
										)}
									</a>

									{isSelected && editingPlatform === platform.id && (
										<Popover
											className="wpzoom-social-sharing-edit-label-popover"
											position="bottom center"
											onClose={() => setEditingPlatform(null)}
										>
											<div style={{ padding: '16px', minWidth: '240px' }}>
												<h3 style={{ margin: '0 0 8px 0' }}>
													{__('Edit Label', 'social-icons-widget-by-wpzoom')}
												</h3>
												<TextControl
													label={__('Label Text', 'social-icons-widget-by-wpzoom')}
													value={editingLabel}
													onChange={setEditingLabel}
												/>
												<div style={{ display: 'flex', justifyContent: 'space-between', marginTop: '12px' }}>
													<Button 
														isSecondary
														onClick={() => setEditingPlatform(null)}
													>
														{__('Cancel', 'social-icons-widget-by-wpzoom')}
													</Button>
													<Button 
														isPrimary
														onClick={() => updatePlatformLabel(platform.id, editingLabel)}
													>
														{__('Save', 'social-icons-widget-by-wpzoom')}
													</Button>
												</div>
											</div>
										</Popover>
									)}
								</li>
							);
						})}
					</ul>
				) : (
					<p className="no-sharing-platforms-selected">
						{__('Select sharing networks in the block sidebar.', 'social-icons-widget-by-wpzoom')}
					</p>
				)}
				
				{isSelected && enabledPlatforms.length > 0 && (
					<div className="wpzoom-click-to-edit-hint" style={{ 
						textAlign: 'center', 
						fontSize: '13px', 
						color: '#757575',
						marginTop: '8px',
						fontStyle: 'italic'
					}}>
						{__('Click on any icon to edit its label', 'social-icons-widget-by-wpzoom')}
					</div>
				)}
			</div>
		</>
	);
} 