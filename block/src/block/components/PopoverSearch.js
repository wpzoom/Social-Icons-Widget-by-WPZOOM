/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment, useState } from '@wordpress/element';
import { TextControl, Button, Icon } from '@wordpress/components';

export default function PopoverSearch( {
	value,
	save,
} ) {
	const [ search, setSearch ] = useState( value );

	const onKeyDownHandler = ( e ) => {
		e.stopPropagation();
		if ( e.key === 'Enter' ) {
			save( search );
		}
	};

	const onClickHandler = ( e ) => {
		e.stopPropagation();
		save( search );
	};

	return (
		<Fragment>
			<div className="url-input-wrapper">
				<Icon icon="admin-site" className="url-input-icon" />
				<TextControl
					className="url-input"
					type="text"
					value={ search }
					onChange={ setSearch }
					onKeyDown={ onKeyDownHandler }
					onFocus={ ( e ) => e.target.select() }
					placeholder={ __('https://example.com', 'social-icons-widget-by-wpzoom') }
				/>
			</div>
			<Button
				icon="update"
				isPrimary
				onClick={ onClickHandler }
				className="url-apply-button"
			>
				{ __( 'Apply URL', 'social-icons-widget-by-wpzoom' ) }
			</Button>
		</Fragment>
	);
}
