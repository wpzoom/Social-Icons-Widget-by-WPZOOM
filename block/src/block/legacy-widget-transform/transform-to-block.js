/**
 * External dependencies
 */
import { map, size } from 'lodash';
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
import { __, _n, sprintf } from '@wordpress/i18n';
import { Fragment, useEffect, useState, memo } from '@wordpress/element';
import { createBlock } from '@wordpress/blocks';
import { useDispatch, useSelect } from '@wordpress/data';
import { addAction, doAction } from '@wordpress/hooks';
import { Spinner, Placeholder } from '@wordpress/components';
import { addQueryArgs } from '@wordpress/url';

/**
 * Internal dependencies
 */
import useInsertionPoint from '../hooks/use-insertion-point';

const replacementData = {};

const TransformToBlock = ( { clientId, attributes, widgetId } ) => {
	const [ isConvertRun, setButtonClick ] = useState( false );
	const {
		createInfoNotice,
		createWarningNotice,
		createSuccessNotice,
	} = useDispatch( 'core/notices' );

	// store client id and social icons block attributes.
	replacementData[ widgetId ] = {};
	replacementData[ widgetId ].clientId = clientId;
	replacementData[ widgetId ].attributes = attributes;

	const warningMessage = __(
		'Social Icons Widget is currently not supported by the new block-based widget screen in WordPress 5.8. We highly recommend to edit it in the Customizer or transform it to Social Icons Block by clicking on the "Convert to block" button. You can also disable the new block-based widget screen by installing the Classic Widgets plugin.',
		'zoom-social-icons-widget'
	);

	useEffect( () => {
		createWarningNotice( warningMessage, {
			id: 'wpzoom-social-icons-notice',
			isDismissible: true,
			actions: [
				{
					url: addQueryArgs( 'customize.php', {
						'autofocus[panel]': 'widgets',
						return: window.location.pathname,
					} ),
					label: __( 'Manage in Customizer', 'zoom-social-icons-widget' ),
				},
				{
					url: addQueryArgs( 'plugin-install.php', {
						s: 'classic%20widgets',
						tab: 'search',
						type: 'term',
					} ),
					label: 'Install Classic Widgets',
				},
				{
					label: __( 'Convert to block', 'zoom-social-icons-widget' ),
					onClick: () => setButtonClick( ! isConvertRun ),
				},
			],
		} );
	}, [ createWarningNotice, isConvertRun ] );

	useEffect( () => {
		if ( isConvertRun ) {
			createInfoNotice(
				__(
					'Convert process is started. Please wait…',
					'zoom-social-icons-widget'
				),
				{
					type: 'snackbar',
					id: 'wpzoom-social-icons-notice',
				}
			);
		}
	}, [ isConvertRun, createInfoNotice ] );

	addAction(
		'converter.isConvertDone',
		'wpzoom-blocks/social-icons/convert-legacy-widget',
		( { message } ) => {
			createSuccessNotice(
				message,
				{
					type: 'snackbar',
					id: 'wpzoom-social-icons-notice',
				}
			);
		}
	);

	if ( ! clientId || ! isConvertRun ) {
		return null;
	}

	return (
		<Fragment>
			<ConvertToSocialIconsBlock
				replacementData={ replacementData }
				isConvertRun={ isConvertRun }
			/>
		</Fragment>
	);
};

function convertWidgetToBlock( clientData ) {
	return new Promise( function( resolve ) {
		let replaced = 0;

		map( clientData, ( client ) => {
			const { clientId, attributes } = client;
			const {
				title: widgetTitle,
				description: widgetDescription,
				iconsAlignment: alignment,
			} = attributes;

			const { rootClientId } = useSelect( ( select ) => {
				return {
					rootClientId: select( 'core/block-editor' ).getBlockRootClientId(
						clientId
					),
				};
			} );

			const innerBlocks = [
				createBlock( 'core/heading', {
					content: widgetTitle,
					level: 3,
					placeholder: __( 'Title', 'zoom-social-icons-widget' ),
					className: 'zoom-social-icons-legacy-widget-title widget-title title heading-size-3',
				} ),
				createBlock( 'core/paragraph', {
					content: widgetDescription,
					placeholder: __( 'Text above icons', 'zoom-social-icons-widget' ),
					className: classnames( 'zoom-social-icons-legacy-widget-description', {
						[ `zoom-social-icons-list--align-${ alignment }` ]:
							alignment !== undefined && alignment !== 'none',
					} ),
				} ),
				createBlock( 'wpzoom-blocks/social-icons', attributes ),
			];

			const [ onReplaceBlock ] = useInsertionPoint( { rootClientId, clientId } );
			const blocks = createBlock(
				'core/group',
				{
					tagName: 'div',
					className: 'zoom-social-icons-widget zoom-social-icons-legacy-widget-group',
					layout: { inherit: true },
				},
				innerBlocks
			);

			onReplaceBlock( blocks );

			replaced++;

			if ( size( clientData ) === replaced ) {
				const message = sprintf(
					// translators: %d: the number of the block that has been converted
					_n(
						'%d legacy widget "Social Icons" successfully converted to block',
						'%d legacy widgets "Social Icons" successfully converted to block',
						replaced,
						'zoom-social-icons-widget'
					),
					replaced,
				);

				// call resolve if the method succeeds
				resolve( message );
			}
		} );
	} );
}

const ConvertToSocialIconsBlock = ( {
	replacementData: clientData,
	isConvertRun,
} ) => {
	const [ isConvertDone, setConvertDone ] = useState( false );
	const shouldReplaceBlock = isConvertRun && ! isConvertDone;

	if ( ! shouldReplaceBlock ) {
		return (
			<Placeholder>
				<Spinner />
			</Placeholder>
		);
	}

	convertWidgetToBlock( clientData ).then( ( message ) => {
		// Set state convert done
		setConvertDone( true );

		// Call action after convert isDone
		doAction( 'converter.isConvertDone', { message } );
	} );

	return null;
};

export default memo( TransformToBlock );
