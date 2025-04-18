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
		const { attributes } = this.props;

		let { className } = attributes;

		if ( Helper.getBlockStyle( className ) == null ) {
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
			
			// Determine if this is a custom SVG icon
			const isCustomSvg = list.iconKit === 'svg' && list.customSvg;
			
			// Prepare the icon content (either SVG or icon font)
			let iconContent;
            
            if (isCustomSvg) {
                iconContent = (
                    <span 
                        className={classnames('social-icon', 'social-icon-svg')}
                        dangerouslySetInnerHTML={{ __html: list.customSvg }}
                    ></span>
                );
            } else {
                iconContent = (
                    <span
                        className={ classnames(
                            Helper.getIconClassList( list.iconKit, list.icon )
                        ) }
                    ></span>
                );
            }

			return (
				<a
					key={ key }
					href={ list.url }
					className={ 'social-icon-link' }
					target={ getTarget }
					rel={ relAttr.length ? relAttr.join( ' ' ) : undefined }
					title={ list.label }
					style={ {
						'--wpz-social-icons-block-item-color': list.color,
						'--wpz-social-icons-block-item-color-hover':
							list.hoverColor,
					} }
				>
					{iconContent}
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
