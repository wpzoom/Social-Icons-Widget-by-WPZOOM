/* eslint-disable react/jsx-no-target-blank */

/**
 * External dependencies
 */
import { get, isEmpty, omit, find, map, filter } from 'lodash';
import URI from 'urijs';
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Component, Fragment } from '@wordpress/element';
import { withSelect } from '@wordpress/data';
import { Icon, Button, Popover } from '@wordpress/components';
import { AlignmentToolbar, BlockControls } from '@wordpress/block-editor';
import { compose } from '@wordpress/compose';

/**
 * Internal dependencies
 */
import Helper from '../utils/helper';
import SocialIconsModal from './SocialIconsModal';
import Inspector from './Inspector';
import PopoverSearch from './PopoverSearch';
import SortableArrows from './SortableArrows';
import ModalColorPicker from './ModalColorPicker';

class Edit extends Component {
	getStyleVariations( styleType ) {
		const styleVariations = {
			'with-label-canvas-rounded': {
				canvasType: 'with-label-canvas',
				showIconsLabel: true,
				iconsColor: null,
				iconsLabelColor: '#fff',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#fff',
				iconsFontSize: 18,
				iconsLabelFontSize: 15,
				iconsPaddingHorizontal: 5,
				iconsPaddingVertical: 5,
				iconsMarginHorizontal: 5,
				iconsMarginVertical: 5,
				iconsHasBorder: true,
				iconsBorderRadius: 50,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: null,
					hoverColor: null,
				},
			},
			'with-canvas-rounded': {
				canvasType: 'with-canvas',
				showIconsLabel: false,
				iconsColor: null,
				iconsLabelColor: '#2e3131',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#2e3131',
				iconsFontSize: 18,
				iconsLabelFontSize: 16,
				iconsPaddingHorizontal: 6,
				iconsPaddingVertical: 6,
				iconsMarginHorizontal: 5,
				iconsMarginVertical: 5,
				iconsHasBorder: true,
				iconsBorderRadius: 5,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: '#0866FF',
					hoverColor: '#0866FF',
				},
				selectedIcons: [
					{
						icon: 'facebook',
						color: '#0866FF',
						hoverColor: '#0866FF',
					},
					{
						icon: 'x',
						color: '#000000',
						hoverColor: '#000000',
					},
					{
						icon: 'instagram',
						color: '#E4405F',
						hoverColor: '#E4405F',
					},
				],
			},
			'with-canvas-round': {
				canvasType: 'with-canvas',
				showIconsLabel: false,
				iconsColor: null,
				iconsLabelColor: '#2e3131',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#2e3131',
				iconsFontSize: 18,
				iconsLabelFontSize: 16,
				iconsPaddingHorizontal: 6,
				iconsPaddingVertical: 6,
				iconsMarginHorizontal: 5,
				iconsMarginVertical: 5,
				iconsHasBorder: true,
				iconsBorderRadius: 50,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: '#0866FF',
					hoverColor: '#0866FF',
				},
				selectedIcons: [
					{
						icon: 'facebook',
						color: '#0866FF',
						hoverColor: '#0866FF',
					},
					{
						icon: 'x',
						color: '#000000',
						hoverColor: '#000000',
					},
					{
						icon: 'instagram',
						color: '#E4405F',
						hoverColor: '#E4405F',
					},
				],
			},
			'with-canvas-squared': {
				canvasType: 'with-canvas',
				showIconsLabel: false,
				iconsColor: null,
				iconsLabelColor: '#2e3131',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#2e3131',
				iconsFontSize: 18,
				iconsLabelFontSize: 16,
				iconsPaddingHorizontal: 6,
				iconsPaddingVertical: 6,
				iconsMarginHorizontal: 5,
				iconsMarginVertical: 5,
				iconsBorderRadius: 0,
				iconsHasBorder: true,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: '#0866FF',
					hoverColor: '#0866FF',
				},
				selectedIcons: [
					{
						icon: 'facebook',
						color: '#0866FF',
						hoverColor: '#0866FF',
					},
					{
						icon: 'x',
						color: '#000000',
						hoverColor: '#000000',
					},
					{
						icon: 'instagram',
						color: '#E4405F',
						hoverColor: '#E4405F',
					},
				],
			},
			'without-canvas': {
				canvasType: 'without-canvas',
				showIconsLabel: false,
				iconsColor: null,
				iconsLabelColor: '#2e3131',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#2e3131',
				iconsFontSize: 18,
				iconsLabelFontSize: 16,
				iconsPaddingHorizontal: 6,
				iconsPaddingVertical: 6,
				iconsMarginHorizontal: 5,
				iconsMarginVertical: 5,
				iconsHasBorder: false,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: '#0866FF',
					hoverColor: '#0866FF',
				},
				selectedIcons: [
					{
						icon: 'facebook',
						color: '#0866FF',
						hoverColor: '#0866FF',
					},
					{
						icon: 'x',
						color: '#000000',
						hoverColor: '#000000',
					},
					{
						icon: 'instagram',
						color: '#E4405F',
						hoverColor: '#E4405F',
					},
				],
			},
			'without-canvas-with-border': {
				canvasType: 'without-canvas',
				showIconsLabel: false,
				iconsColor: null,
				iconsLabelColor: 'inherit',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#f1f1f1',
				iconsFontSize: 18,
				iconsLabelFontSize: 16,
				iconsPaddingHorizontal: 6,
				iconsPaddingVertical: 6,
				iconsMarginHorizontal: 5,
				iconsMarginVertical: 5,
				iconsHasBorder: true,
				iconsBorderRadius: 0,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: null,
					hoverColor: null,
				},
			},
			'without-canvas-with-label': {
				canvasType: 'without-canvas',
				showIconsLabel: true,
				iconsColor: null,
				iconsLabelColor: 'inherit',
				iconsHoverColor: null,
				iconsLabelHoverColor: '#f1f1f1',
				iconsFontSize: 40,
				iconsLabelFontSize: 15,
				iconsPaddingHorizontal: 10,
				iconsPaddingVertical: 10,
				iconsMarginHorizontal: 0,
				iconsMarginVertical: 0,
				iconsHasBorder: false,
				wasStyled: true,
				defaultIcon: {
					icon: 'facebook',
					color: null,
					hoverColor: null,
				},
			},
		};

		return get( styleVariations, styleType, false )
			? get( styleVariations, styleType, false )
			: get( styleVariations, this.getActiveStyle() );
	}

	getActiveStyle() {
		const { blockStyles } = this.props;
		const blockStyle = Helper.getActiveStyle(
			blockStyles,
			this.props.className
		);
		return ( blockStyle && blockStyle.name ) || '';
	}

	// eslint-disable-next-line no-unused-vars
	componentDidUpdate( prevProps, prevState ) {
		if (
			Helper.getBlockStyle( prevProps.className ) !==
			Helper.getBlockStyle( this.props.className )
		) {
			const styleVariation = this.getStyleVariations(
				this.getActiveStyle()
			);

			if ( ! isEmpty( styleVariation ) ) {
				this.props.setAttributes(
					omit( styleVariation, [ 'selectedIcons' ] )
				);

				const clonedSelectedIcons = JSON.parse(
					JSON.stringify( this.props.attributes.selectedIcons )
				);

				if ( ! isEmpty( styleVariation.selectedIcons ) ) {
					clonedSelectedIcons.map( ( item ) => {
						if ( isEmpty( item.color ) ) {
							item.color = styleVariation.defaultIcon.color;
						}
						if ( isEmpty( item.hoverColor ) ) {
							item.hoverColor = styleVariation.defaultIcon.hoverColor;
						}
						return item;
					} );
				}

				if ( ! isEmpty( styleVariation.iconsColor ) ) {
					clonedSelectedIcons.map( ( item ) => {
						item.color = styleVariation.iconsColor;
						return item;
					} );
				}

				if ( ! isEmpty( styleVariation.iconsHoverColor ) ) {
					clonedSelectedIcons.map( ( item ) => {
						item.hoverColor = styleVariation.iconsHoverColor;
						return item;
					} );
				}

				this.props.setAttributes( {
					selectedIcons: clonedSelectedIcons,
				} );
			}
		}
	}

	componentDidMount() {
		if ( this.props.attributes.wasStyled === true ) {
			return;
		}

		const styleVariation = this.getStyleVariations( this.getActiveStyle() );

		if ( ! isEmpty( styleVariation ) ) {
			styleVariation.wasStyled = true;
			this.props.setAttributes( omit( styleVariation, [ 'selectedIcons' ] ) );

			const clonedSelectedIcons = JSON.parse(
				JSON.stringify( this.props.attributes.selectedIcons )
			);

			if ( ! isEmpty( styleVariation.selectedIcons ) ) {
				clonedSelectedIcons.map( ( item ) => {
					const current = find( styleVariation.selectedIcons, [
						'icon',
						item.icon,
					] );
					item.color = isEmpty( current )
						? styleVariation.defaultIcon.color
						: current.color;
					item.hoverColor = isEmpty( current )
						? styleVariation.defaultIcon.hoverColor
						: current.hoverColor;
					return item;
				} );
			}

			if ( ! isEmpty( styleVariation.iconsColor ) ) {
				clonedSelectedIcons.map( ( item ) => {
					item.color = styleVariation.iconsColor;
					return item;
				} );
			}

			if ( ! isEmpty( styleVariation.iconsHoverColor ) ) {
				clonedSelectedIcons.map( ( item ) => {
					item.hoverColor = styleVariation.iconsHoverColor;
					return item;
				} );
			}

			this.props.setAttributes( {
				selectedIcons: clonedSelectedIcons,
			} );
		}
	}

	closeModal = () => {
		this.props.setAttributes( { showModal: false } );
	};

	getIconsAlignmentStyle = ( alignment ) => {
		const styles = {
			left: 'flex-start',
			right: 'flex-end',
			center: 'center',
		};

		return styles[ alignment ];
	};

	setAlignment = ( alignment ) => {
		this.props.setAttributes( { iconsAlignment: alignment } );
	};

	saveModalHandler = ( iconObject ) => {
		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		const currentIcon =
			selectedIconsClone[ this.props.attributes.activeIconIndex ];
		const updatedIcon = {
			url: iconObject.modalUrl,
			label: iconObject.modalLabel,
			icon: iconObject.modalIcon,
			iconKit: iconObject.modalIconKit,
			color: iconObject.modalColor,
			hoverColor: iconObject.modalHoverColor,
		};

		selectedIconsClone[ this.props.attributes.activeIconIndex ] = {
			...currentIcon,
			...updatedIcon,
		};

		this.props.setAttributes( {
			selectedIcons: selectedIconsClone,
			showModal: false,
		} );
	};

	insertIcon = ( e ) => {
		e.preventDefault();
		e.stopPropagation();

		if ( e.detail === 0 ) {
			return;
		}

		const styleVariation = this.getStyleVariations(
			Helper.getBlockStyle( this.props.className )
		);

		const defaultIcon = {
			url: 'https://wordpress.org',
			icon: 'wordpress',
			iconKit: 'socicon',
			color: '#444140',
			hoverColor: '#444140',
			label: 'WordPress',
			showPopover: true,
			isActive: true,
		};

		if ( ! isEmpty( styleVariation.defaultIcon.color ) ) {
			defaultIcon.color = styleVariation.defaultIcon.color;
		}

		if ( ! isEmpty( styleVariation.defaultIcon.hoverColor ) ) {
			defaultIcon.hoverColor = styleVariation.defaultIcon.hoverColor;
		}

		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone.map( ( item ) => ( item.isActive = false ) );
		const key = selectedIconsClone.push( defaultIcon );
		this.props.setAttributes( {
			selectedIcons: selectedIconsClone,
			activeIconIndex: key - 1,
		} );
	};

	// eslint-disable-next-line no-unused-vars
	onClickIconHandler = ( e, key, iconObject ) => {
		e.preventDefault();
		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone.map( ( item ) => ( item.isActive = false ) );
		selectedIconsClone[ key ].showPopover = true;
		selectedIconsClone[ key ].isActive = true;
		this.props.setAttributes( {
			activeIconIndex: key,
			selectedIcons: selectedIconsClone,
		} );
	};

	popoverCloseHandler = ( key ) => {
		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone[ key ].showPopover = false;
		this.props.setAttributes( { selectedIcons: selectedIconsClone } );
	};

	deleteIconHandler = () => {
		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone.splice( this.props.attributes.activeIconIndex, 1 );
		this.props.setAttributes( {
			selectedIcons: selectedIconsClone,
			showModal: false,
			activeIconIndex: 0,
		} );
	};

	popoverDeleteIconHandler = ( e, key ) => {
		e.stopPropagation();

		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone.splice( key, 1 );
		this.props.setAttributes( {
			selectedIcons: selectedIconsClone,
			activeIconIndex: 0,
		} );
	};

	popoverEditSettingsHandler = ( e, key ) => {
		e.stopPropagation();
		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone[ key ].showPopover = false;

		this.props.setAttributes( {
			showModal: true,
			selectedIcons: selectedIconsClone,
		} );
	};

	popoverSearchHandler = ( key, newUrl ) => {
		newUrl = isEmpty( new URI( newUrl ).protocol() )
			? `https://${ newUrl }`
			: newUrl;

		const selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		const iconFromUrl = Helper.filterUrlScheme( newUrl );

		if ( iconFromUrl ) {
			const filteredIcons = Helper.filterIcons( iconFromUrl );

			map( filteredIcons, ( icon, iconKit ) => {
				if ( ! isEmpty( icon ) ) {
					filter( icon, function( o ) {
						if ( o.icon === iconFromUrl && selectedIconsClone[ key ].icon !== o.icon ) {
							selectedIconsClone[ key ].iconKit = iconKit;
							selectedIconsClone[ key ].icon = o.icon;

							if ( o.color ) {
								selectedIconsClone[ key ].color = o.color;
								selectedIconsClone[ key ].hoverColor = o.color;
							}

							selectedIconsClone[ key ].label = Helper.humanizeIconLabel(
								iconFromUrl
							);
						}
					} );
				}
			} );
		}

		selectedIconsClone[ key ].url = newUrl;
		selectedIconsClone[ key ].showPopover = false;

		this.props.setAttributes( { selectedIcons: selectedIconsClone } );
	};

	moveLeftHandler = ( e, key ) => {
		let selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone = Helper.arrayMove( selectedIconsClone, key, key - 1 );
		this.props.setAttributes( {
			selectedIcons: selectedIconsClone,
			activeIconIndex: key - 1,
		} );
	};

	moveRightHandler = ( e, key ) => {
		let selectedIconsClone = JSON.parse(
			JSON.stringify( this.props.attributes.selectedIcons )
		);
		selectedIconsClone = Helper.arrayMove( selectedIconsClone, key, key + 1 );
		this.props.setAttributes( {
			selectedIcons: selectedIconsClone,
			activeIconIndex: key + 1,
		} );
	};

	getRelAttr = () => {
		let relAttr = [];

		if ( this.props.attributes.nofollow ) {
			relAttr.push( 'nofollow' );
		}
		if ( this.props.attributes.noreferrer ) {
			relAttr.push( 'noreferrer' );
		}
		if ( this.props.attributes.noopener ) {
			relAttr.push( 'noopener' );
		}
		if ( this.props.attributes.relme ) {
			relAttr.push( 'me' );
		}
		if ( this.props.attributes.openLinkInNewTab ) {
			relAttr = [ 'noopener' ];
		}

		return relAttr;
	};

	getTarget = () => {
		if( this.props.attributes.openLinkInNewTab ) {
			return '_blank';
		}
		return undefined;
	};

	render() {
		const { attributes, setAttributes, isSelected } = this.props;

		let { className } = this.props;

		if ( Helper.getBlockStyle( className ) === null ) {
			className = classnames( className, 'is-style-with-canvas-round' );
		}
		if( attributes.showIconsLabel ) {
			className = classnames( className, 'show-icon-labels-style' );
		}

		const IconsList = attributes.selectedIcons.map( ( list, key ) => {
			const showIconsLabel = attributes.showIconsLabel ? (
				<span className={ classnames( 'icon-label' ) }>{ list.label }</span>
			) : (
				''
			);

			const relAttr = this.getRelAttr();
			const getTarget = this.getTarget();

			return (
				<Fragment key={ key }>
					<a
						onClick={ ( e ) => this.onClickIconHandler( e, key, list ) }
						href={ list.url }
						className={ classnames( 'social-icon-link', {
							selected: list.isActive,
						} ) }
						target={ getTarget }
						rel={ relAttr.length ? relAttr.join( ' ' ) : undefined }
						title={ list.label }
						style={ {
							'--wpz-social-icons-block-item-color': list.color,
							'--wpz-social-icons-block-item-color-hover':
								list.hoverColor,
						} }
					>
						<span
							className={ classnames(
								Helper.getIconClassList( list.iconKit, list.icon )
							) }
						></span>
						{ showIconsLabel }
						{ list.showPopover && isSelected && (
							<Popover
								className={ classnames(
									'wpzoom-social-icons-popover'
								) }
								key={ key }
								position={ 'bottom center' }
								onClose={ () => this.popoverCloseHandler( key ) }
							>
								<div className={ classnames( 'popover-content' ) }>
									<div
										className={ classnames(
											'popover-url-wrapper'
										) }
									>
										<PopoverSearch
											key={ key }
											value={ list.url }
											save={ ( url ) =>
												this.popoverSearchHandler(
													key,
													url
												)
											}
										/>
									</div>

									<div
										className={ classnames(
											'popover-controls'
										) }
									>
										<Button
											isLink={ true }
											onClick={ ( e ) =>
												this.popoverEditSettingsHandler(
													e,
													key
												)
											}
										>
											{ __(
												'Edit Details',
												'social-icons-widget-by-wpzoom'
											) }
										</Button>
										<div
											className={ classnames(
												'popover-color-picker-wrapper'
											) }
										>
											<ModalColorPicker
												title={ 'Color' }
												className={ classnames(
													'popover-color-picker'
												) }
												save={ ( arg ) => {
													const selectedIconsClone = [
														...attributes.selectedIcons,
													];
													selectedIconsClone[
														attributes.activeIconIndex
													].color = arg.color;
													setAttributes( {
														selectedIcons: selectedIconsClone,
													} );
												} }
												color={ list.color }
											/>
											<ModalColorPicker
												title={ 'Hover Color' }
												className={ classnames(
													'popover-color-picker'
												) }
												save={ ( arg ) => {
													const selectedIconsClone = [
														...attributes.selectedIcons,
													];
													selectedIconsClone[
														attributes.activeIconIndex
													].hoverColor = arg.color;
													setAttributes( {
														selectedIcons: selectedIconsClone,
													} );
												} }
												color={ list.hoverColor }
											/>
											{ attributes.selectedIcons.length >
												1 && (
												<Button
													onClick={ ( e ) =>
														this.popoverDeleteIconHandler(
															e,
															key
														)
													}
													className={ [
														'is-button',
														'button-link-delete',
														'is-small',
													] }
												>
													{ __(
														'Delete Icon',
														'social-icons-widget-by-wpzoom'
													) }
												</Button>
											) }
										</div>
									</div>
								</div>
							</Popover>
						) }
					</a>
					<SortableArrows
						left={ this.moveLeftHandler }
						right={ this.moveRightHandler }
						length={ attributes.selectedIcons.length }
						isActive={ list.isActive && isSelected }
						itemKey={ key }
					/>
				</Fragment>
			);
		} );

		return (
			<Fragment>
				<Inspector { ...this.props } />
				<BlockControls>
					<AlignmentToolbar
						value={ attributes.iconsAlignment }
						onChange={ ( iconsAlignment ) =>
							this.setAlignment( iconsAlignment )
						}
					></AlignmentToolbar>
				</BlockControls>
				<div
					className={ className }
					style={ {
						'--wpz-social-icons-block-item-font-size': Helper.addPixelsPipe(
							attributes.iconsFontSize
						),
						'--wpz-social-icons-block-item-padding-horizontal': Helper.addPixelsPipe(
							attributes.iconsPaddingHorizontal
						),
						'--wpz-social-icons-block-item-padding-vertical': Helper.addPixelsPipe(
							attributes.iconsPaddingVertical
						),
						'--wpz-social-icons-block-item-margin-horizontal': Helper.addPixelsPipe(
							attributes.iconsMarginHorizontal
						),
						'--wpz-social-icons-block-item-margin-vertical': Helper.addPixelsPipe(
							attributes.iconsMarginVertical
						),
						'--wpz-social-icons-block-item-border-radius': Helper.addPixelsPipe(
							attributes.iconsBorderRadius
						),
						'--wpz-social-icons-block-label-font-size': Helper.addPixelsPipe(
							attributes.iconsLabelFontSize
						),
						'--wpz-social-icons-block-label-color':
							attributes.iconsLabelColor,
						'--wpz-social-icons-block-label-color-hover':
							attributes.iconsLabelHoverColor,
						'--wpz-social-icons-alignment': this.getIconsAlignmentStyle(
							attributes.iconsAlignment
						),
					} }
				>
					{ IconsList }
					{ isSelected && (
						<Button
							type={ 'button' }
							onClick={ this.insertIcon }
							style={ { padding: attributes.iconsPadding } }
							className={ 'insert-icon' }
						>
							<Icon icon={ 'insert' } size={ '20' } />
						</Button>
					) }
					{ attributes.selectedIcons[ attributes.activeIconIndex ] && (
						<SocialIconsModal
							className={ classnames(
								Helper.getBlockStyle( className )
							) }
							showIconsLabel={ attributes.showIconsLabel }
							iconsBorderRadius={ attributes.iconsBorderRadius }
							show={ attributes.showModal }
							url={
								attributes.selectedIcons[
									attributes.activeIconIndex
								].url
							}
							label={
								attributes.selectedIcons[
									attributes.activeIconIndex
								].label
							}
							icon={
								attributes.selectedIcons[
									attributes.activeIconIndex
								].icon
							}
							iconKit={
								attributes.selectedIcons[
									attributes.activeIconIndex
								].iconKit
							}
							color={
								attributes.selectedIcons[
									attributes.activeIconIndex
								].color
							}
							hoverColor={
								attributes.selectedIcons[
									attributes.activeIconIndex
								].hoverColor
							}
							save={ this.saveModalHandler }
							delete={ this.deleteIconHandler }
							showDeleteBtn={ attributes.selectedIcons.length > 1 }
							onClose={ this.closeModal }
						/>
					) }
				</div>
			</Fragment>
		);
	}
}

const applyWithSelect = withSelect( ( select, props ) => {
	const { getBlockStyles } = select( 'core/blocks' );

	return {
		blockStyles: getBlockStyles( props.name ),
	};
} );

export default compose( applyWithSelect )( Edit );
