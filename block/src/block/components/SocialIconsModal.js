/* global wpzSocialIconsBlock */

import ModalColorPicker from './ModalColorPicker';
import SocialIcon from './SocialIcon';
import Helper from '../utils/helper';
import React from 'react';
import classnames from 'classnames';
import { isEmpty, debounce } from 'lodash';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import {
	Button,
	Modal,
	TextControl,
	SelectControl,
} from '@wordpress/components';
import URI from 'urijs';

const { iconKitsCategories } = wpzSocialIconsBlock;

class SocialIconsModal extends Component {
	state = {
		modalShow: this.props.show,
		modalUrl: this.props.url,
		modalLabel: this.props.label,
		modalIcon: this.props.icon,
		modalIconKit: this.props.iconKit,
		modalColor: this.props.color,
		modalHoverColor: this.props.hoverColor,
		modalSearch: '',
	};

	constructor( props ) {
		super( props );
		this.myRef = React.createRef();

		this.scrollMeDebounced = debounce( this.scrollMe, 1000 );
	}

	urlTextControlHandler = ( value ) => {
		value = isEmpty( new URI( value ).protocol() ) ? `https://${ value }` : value;

		const newState = { modalUrl: value };

		const iconFromUrl = Helper.filterUrlScheme( value );

		if ( iconFromUrl ) {
			const filteredIcons = Helper.filterIcons( iconFromUrl );

			if ( filteredIcons[ this.state.modalIconKit ].length ) {
				newState.modalIcon = filteredIcons[ this.state.modalIconKit ][ 0 ].icon;
			}
		}

		this.setState( newState );
	};

	labelTextControlHandler = ( value ) => {
		this.setState( { modalLabel: value } );
	};

	searchTextControlHandler = ( value ) => {
		this.setState( { modalSearch: value } );
	};

	saveColorPickerHandler = ( arg ) => {
		this.setState( { modalColor: arg.color } );
	};

	saveHoverColorPickerHandler = ( arg ) => {
		this.setState( { modalHoverColor: arg.color } );
	};

	static getDerivedStateFromProps( props, state ) {
		if ( props.show !== state.modalShow ) {
			return {
				modalShow: props.show,
				modalUrl: props.url,
				modalLabel: props.label,
				modalIcon: props.icon,
				modalIconKit: props.iconKit,
				modalColor: props.color,
				modalHoverColor: props.hoverColor,
				modalSearch: '',
			};
		}

		return null;
	}

	onClickIconHandler = ( icon ) => {
		this.setState( {
			modalIcon: icon,
			modalLabel: Helper.humanizeIconLabel( icon ),
		} );
	};

	componentDidUpdate() {
		this.scrollMeDebounced();
	}

	scrollMe = () => {
		const node = this.myRef.current;

		if ( ! ( null === node ) ) {
			node.scrollIntoView( true );
		}
	};

	render() {
		if ( ! this.state.modalShow ) {
			return null;
		}

		const iconElements = Object.keys(
			Helper.filterIcons( this.state.modalSearch )
		).map( ( iconKit, iconKey ) => (
			<div
				key={ iconKey }
				className={ classnames( 'option-item', 'icon-kit', `${ iconKit }-wrapper` ) }
				style={ {
					display: this.state.modalIconKit === iconKit ? 'block' : 'none',
				} }
			>
				{ Helper.filterIcons( this.state.modalSearch )[ iconKit ].map(
					( element, key ) => (
						<SocialIcon
							key={ key }
							setRef={
								this.state.modalIcon === element.icon &&
								this.state.modalIconKit === iconKit
									? this.myRef
									: null
							}
							color={ this.state.modalColor }
							hoverColor={ this.state.modalHoverColor }
							icon={ element.icon }
							click={ this.onClickIconHandler }
							isSelected={ this.state.modalIcon === element.icon }
							iconKit={ iconKit }
						></SocialIcon>
					)
				) }
			</div>
		) );

		return (
			<Modal
				className={ classnames(
					'wpzoom-social-icons-modal',
					this.props.className
				) }
				style={ {
					'--wpz-social-icons-block-modal-item-border-radius':
						Helper.addPixelsPipe( this.props.iconsBorderRadius ),
				} }
				title={ __( 'Select Icon', 'social-icons-widget-by-wpzoom' ) }
				shouldCloseOnClickOutside={ false }
				onRequestClose={ () => this.props.onClose( this.state ) }
			>
				<div className={ 'modal-content' }>
					<div className={ 'option-item' }>
						<div className="label">{ __( 'URL', 'social-icons-widget-by-wpzoom' ) }</div>
						<div className="option-wrapper">
							<TextControl
								value={ this.state.modalUrl }
								onChange={ this.urlTextControlHandler }
							/>
						</div>
					</div>
					{ this.props.showIconsLabel ? (
						<div className="option-item">
							<div className="label">
								{ __( 'Label', 'social-icons-widget-by-wpzoom' ) }
							</div>
							<div className="option-wrapper">
								<TextControl
									value={ this.state.modalLabel }
									onChange={ this.labelTextControlHandler }
								/>
							</div>
						</div>
					) : null }
					<div className="option-item">
						<div className="label">
							{ __( 'Pick icon color', 'social-icons-widget-by-wpzoom' ) }
						</div>
						<div className="option-wrapper">
							<ModalColorPicker
								save={ this.saveColorPickerHandler }
								color={ this.state.modalColor }
							/>
						</div>
					</div>
					<div className="option-item">
						<div className="label">
							{ __( 'Pick hover color', 'social-icons-widget-by-wpzoom' ) }
						</div>
						<div className="option-wrapper">
							<ModalColorPicker
								save={ this.saveHoverColorPickerHandler }
								color={ this.state.modalHoverColor }
							/>
						</div>
					</div>
					<div className="option-item">
						<div className="label">
							{ __( 'Select Icon Kit', 'social-icons-widget-by-wpzoom' ) }
						</div>
						<div className="option-wrapper">
							<SelectControl
								value={ this.state.modalIconKit }
								onChange={ ( currentIconKit ) => {
									this.setState( { modalIconKit: currentIconKit } );
								} }
								options={ Object.values( iconKitsCategories ) }
							/>
						</div>
					</div>
					<div className={ 'option-item icon-kits-wrapper' }>{ iconElements }</div>
				</div>
				<div className="modal-controls">
					<div className="modal-search">
						<TextControl
							placeholder={ __(
								'Type to search icon',
								'social-icons-widget-by-wpzoom'
							) }
							value={ this.state.modalSearch }
							onChange={ this.searchTextControlHandler }
						/>
					</div>
					<div className="modal-buttons">
						{ this.props.showDeleteBtn && (
							<Button
								className={ 'button-link-delete is-button' }
								onClick={ () => this.props.delete() }
							>
								{ __( 'Delete Icon', 'social-icons-widget-by-wpzoom' ) }
							</Button>
						) }
						<Button isPrimary onClick={ () => this.props.save( this.state ) }>
							{ __( 'Save', 'social-icons-widget-by-wpzoom' ) }
						</Button>
					</div>
				</div>
			</Modal>
		);
	}
}

export default SocialIconsModal;
