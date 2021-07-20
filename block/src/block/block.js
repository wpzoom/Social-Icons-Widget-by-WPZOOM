/**
 * BLOCK: wpzoom-social-icons-block
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import "./editor.scss";
import "./style.scss";

/**
 * Internal dependencies
 */
import blockIcon from "./blockIcon";
import previewImage from "./previewImage";
import Edit from "./components/Edit";
import Save from "./components/Save";
import widgetAttributesTransform from "./widget-attributes-transform";

/**
 * WordPress dependencies
 */
import { addFilter } from "@wordpress/hooks";
import { __ } from "@wordpress/i18n";
import { registerBlockType, createBlock } from "@wordpress/blocks"; // Import registerBlockType() from wp.blocks

/**
 * Filter block attributes.
 */
addFilter(
	"blocks.getBlockAttributes",
	"wpzoom-blocks/social-icons",
	(attributes) => {
		if (!(undefined === attributes.selectedIcons)) {
			let selectedIconsClone = [...attributes.selectedIcons];
			selectedIconsClone.map((item) => {
				item.isActive = false;
				return item;
			});
			attributes.selectedIcons = selectedIconsClone;
			attributes.showModal = false;
		}

		return attributes;
	}
);

/**
 * Register: WPZOOM Social Icons Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType("wpzoom-blocks/social-icons", {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __("Social Icons Block", "zoom-social-icons-widget"), // Block title.
	description: __(
		"Display icons with links to social media platforms.",
		"zoom-social-icons-widget"
	),
	icon: {
		foreground: "#274474",
		src: blockIcon,
	},
	example: {
		attributes: {
			cover: previewImage,
			author: "WPZOOM",
		},
	},
	category: "wpzoom-blocks", // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__("Social Icons", "zoom-social-icons-widget"),
		__("Dashicons", "zoom-social-icons-widget"),
		__("Socicons", "zoom-social-icons-widget"),
		__("Fontawesome", "zoom-social-icons-widget"),
		__("Academic Icons", "zoom-social-icons-widget"),
	],
	attributes: {
		wasStyled: {
			type: "boolean",
			default: false,
		},
		canvasType: {
			type: "string",
			default: "with-canvas",
		},
		showIconsLabel: {
			type: "boolean",
			default: false,
		},
		showModal: {
			type: "boolean",
			default: false,
		},
		openLinkInNewTab: {
			type: "boolean",
			default: false,
		},
		nofollow: {
			type: "boolean",
			default: false,
		},
		noreferrer: {
			type: "boolean",
			default: false,
		},
		noopener: {
			type: "boolean",
			default: false,
		},
		iconsAlignment: {
			type: "string",
			default: "left",
		},
		iconsColor: {
			type: "string",
			default: "#f1f1f1",
		},
		iconsLabelColor: {
			type: "string",
			default: "inherit",
		},
		iconsHoverColor: {
			type: "string",
			default: "#f1f1f1",
		},
		iconsLabelHoverColor: {
			type: "string",
			default: "#f1f1f1",
		},
		iconsFontSize: {
			type: "number",
			default: 20,
		},
		iconsLabelFontSize: {
			type: "number",
			default: 20,
		},
		iconsPaddingVertical: {
			type: "number",
			default: 10,
		},
		iconsPaddingHorizontal: {
			type: "number",
			default: 10,
		},
		iconsMarginVertical: {
			type: "number",
			default: 5,
		},
		iconsMarginHorizontal: {
			type: "number",
			default: 5,
		},
		iconsBorderRadius: {
			type: "number",
			default: 0,
		},
		iconsBackgroundStyle: {
			type: "string",
			default: "round",
		},
		iconsHasBorder: {
			type: "boolean",
			default: false,
		},
		activeIconIndex: {
			type: "integer",
			default: 0,
		},
		defaultIcon: {
			type: "object",
			default: {
				icon: "facebook",
				color: "#f89406",
				hoverColor: "#f89406",
			},
		},
		selectedIcons: {
			type: "array",
			default: [
				{
					url: "https://facebook.com",
					icon: "facebook",
					iconKit: "socicon",
					color: "#3b5998",
					hoverColor: "#3b5998",
					label: "Facebook",
					showPopover: false,
					isActive: false,
				},
				{
					url: "https://twitter.com",
					icon: "twitter",
					iconKit: "socicon",
					color: "#1da1f2",
					hoverColor: "#1da1f2",
					label: "Twitter",
					showPopover: false,
					isActive: false,
				},
				{
					url: "https://instagram.com",
					icon: "instagram",
					iconKit: "socicon",
					color: "#E44060",
					hoverColor: "#E44060",
					label: "Instagram",
					showPopover: false,
					isActive: false,
				},
			],
		},
	},
	styles: [
		{
			name: "with-canvas-round",
			label: __(
				"Color Background / Round White Icon",
				"zoom-social-icons-widget"
			),
			isDefault: true,
		},
		{
			name: "with-canvas-rounded",
			label: __(
				"Color Background / Rounded White Icon",
				"zoom-social-icons-widget"
			),
		},
		{
			name: "with-canvas-squared",
			label: __(
				"Color Background / Squared White Icon",
				"zoom-social-icons-widget"
			),
		},
		{
			name: "without-canvas",
			label: __("Color Icon / No Background", "zoom-social-icons-widget"),
		},
		{
			name: "without-canvas-with-border",
			label: __(
				"Color Icon / No Background with border",
				"zoom-social-icons-widget"
			),
		},
		{
			name: "with-label-canvas-rounded",
			label: __(
				"Color Background / Rounded White Icon with label",
				"zoom-social-icons-widget"
			),
		},
		{
			name: "without-canvas-with-label",
			label: __(
				"Color Icon / No Background with label",
				"zoom-social-icons-widget"
			),
		},
	],
	transforms: {
		from: [
			{
				type: "block",
				blocks: ["core/legacy-widget"],
				isMatch: ({ idBase, instance }) => {
					if (!instance.raw) {
						// Can't transform if raw instance is not shown in REST API.
						return false;
					}
					return idBase === "zoom-social-icons-widget";
				},
				transform: ({ instance }) => {
					return createBlock(
						"wpzoom-blocks/social-icons",
						widgetAttributesTransform(instance.raw)
					);
				},
			},
		],
	},
	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */
	edit: Edit,

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: Save,
});
