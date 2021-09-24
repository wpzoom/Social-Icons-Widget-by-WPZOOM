import { mapValues, assign } from 'lodash';

/**
 * WordPress dependencies
 */
import {
	registerBlockStyle,
	unregisterBlockStyle,
	getBlockTypes,
} from '@wordpress/blocks';

function convertIconProps( props ) {
	return {
		url: props.url,
		icon: props.icon,
		iconKit: props.icon_kit,
		color: props.color_picker,
		hoverColor: props.color_picker_hover,
		label: props.label,
		showPopover: false,
		isActive: false,
	};
}

/**
 * Set global transforms that every block uses.
 *
 * @param {Object} props The passed props.
 * @return {Object} The transforms.
 */
function widgetAttributesTransform( props ) {
	const blockType = getBlockTypes().filter( ( block ) => {
		return block.name.indexOf( 'wpzoom-blocks/social-icons' ) !== -1;
	} )[ 0 ];
	const { attributes: defaultAttributes } = blockType;

	const defaults = mapValues( defaultAttributes, ( attr ) => {
		return attr.default;
	} );
	const converted = {
		wasStyled: true,
		canvasType: props.icon_style,
		showIconsLabel: props.show_icon_labels === 'true',
		openLinkInNewTab: props.open_new_tab === 'true',
		nofollow: props.no_follow === 'true',
		noreferrer: props.no_referrer === 'true',
		noopener: props.no_opener === 'true',
		iconsAlignment: props.icon_alignment,
		iconsColor: props.global_color_picker,
		iconsHoverColor: props.global_color_picker_hover,
		iconsLabelHoverColor: 'inherit',
		iconsFontSize: props.icon_font_size,
		iconsPaddingVertical: props.icon_padding_size,
		iconsPaddingHorizontal: props.icon_padding_size,
		iconsBackgroundStyle: props.icon_canvas_style || 'round',
		selectedIcons: props.fields.map( ( item ) => {
			return convertIconProps( item );
		} ),
		title: props.title,
		description: props.description,
	};

	const transforms = assign( defaults, converted );

	// Icons border radius.
	if ( transforms.iconsBackgroundStyle === 'rounded' ) {
		transforms.iconsBorderRadius = 3;
	} else if ( transforms.iconsBackgroundStyle === 'round' ) {
		transforms.iconsBorderRadius = 50;
	} else {
		transforms.iconsBorderRadius = 0;
	}

	/**
	 * Add className depending on selected style.
	 */
	if ( transforms.canvasType === 'without-canvas' ) {
		transforms.className = `is-style-${ transforms.canvasType }`;
	} else if ( transforms.canvasType === 'with-canvas' ) {
		transforms.className = 'is-style-with-canvas-round';
	}

	/**
	 * Re-register block styles to set the style given from props.
	 */
	const blockStyles = [
		{
			name: 'without-canvas',
			label: 'Color Icon / No Background',
			isDefault: transforms.canvasType === 'without-canvas',
		},
		{
			name: 'with-canvas-round',
			label: 'Color Background / Round White Icon',
			isDefault: transforms.canvasType === 'with-canvas',
		},
	];

	for ( let i = 0; i < blockStyles.length; i++ ) {
		const blockStyle = blockStyles[ i ];
		unregisterBlockStyle( 'wpzoom-blocks/social-icons', blockStyle.name );
		registerBlockStyle( 'wpzoom-blocks/social-icons', blockStyle );
	}

	return transforms;
}

export default widgetAttributesTransform;
