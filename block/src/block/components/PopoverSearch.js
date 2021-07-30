/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment, useState } from '@wordpress/element';
import { TextControl, Button } from '@wordpress/components';

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
			<TextControl
				className="url-input"
				type="text"
				value={ search }
				onChange={ setSearch }
				onKeyDown={ onKeyDownHandler }
				onFocus={ ( e ) => e.target.select() }
			/>
			<Button
				icon="editor-break"
				label={ __( 'Apply', 'zoom-social-icons-widget' ) }
				onClick={ onClickHandler }
				className={ [
					'is-button',
					'button-small',
					'is-default',
					'url-button',
				] }
			></Button>
		</Fragment>
	);
}
