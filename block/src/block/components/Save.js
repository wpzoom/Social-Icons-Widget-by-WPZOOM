import Helper from '../utils/helper';
import classnames from 'classnames';
import { Component } from '@wordpress/element';

class Save extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	getIconsAlignmentStyle = ( alignment ) => {
		const styles = {
			left: 'flex-start',
			right: 'flex-end',
			center: 'center',
		};

		return styles[ alignment ];
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

		if ( this.props.attributes.openLinkInNewTab ) {
			relAttr = [ 'noopener', 'noreferrer' ];
		}

		return relAttr;
	};

	render() {
		const { attributes } = this.props;

		let { className } = attributes;

		if ( Helper.getBlockStyle( className ) == null ) {
			className = classnames( className, 'is-style-with-canvas-round' );
		}

		const IconsList = attributes.selectedIcons.map( ( list, key ) => {
			const showIconsLabel = attributes.showIconsLabel ? (
				<span className={ classnames( 'icon-label' ) }>{ list.label }</span>
			) : (
				''
			);

			const relAttr = this.getRelAttr();

			return (
				<a
					key={ key }
					href={ list.url }
					className={ 'social-icon-link' }
					target={ attributes.openLinkInNewTab ? '_blank' : undefined }
					rel={ relAttr.length ? relAttr.join( ' ' ) : undefined }
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
				</a>
			);
		} );

		return (
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
			</div>
		);
	}
}

export default Save;
