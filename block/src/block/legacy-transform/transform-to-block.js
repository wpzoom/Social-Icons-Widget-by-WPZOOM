/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment, useEffect, useState, memo } from '@wordpress/element';
import { createBlock } from '@wordpress/blocks';
import { useDispatch } from '@wordpress/data';
import { addAction, doAction } from '@wordpress/hooks';
import { Spinner, Placeholder } from '@wordpress/components';
const { addQueryArgs } = wp.url;

const TransformToBlock = ( { clientId, attributes } ) => {
	const [ isConvertRun, setButtonClick ] = useState( false );
	const { createInfoNotice, createWarningNotice, createSuccessNotice } = useDispatch( 'core/notices' );

	const message = __(
		'Social Icons Widget is currently not supported by the new block-based widget screen in WordPress 5.8. We highly recomment to edit it in the Customizer or transform it to Social Icons Block by clicking on the "Convert to block" button. You can also disable the new block-based widget screen by installing the Classic Widgets plugin.',
		'zoom-social-icons-widget'
	);

	useEffect( () => {
		createWarningNotice( message, {
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
					'Convert process is started. Please wait...',
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
		() => {
			createSuccessNotice(
				__( 'Successfully converted Social Icons legacy widget to block.', 'zoom-social-icons-widget' ),
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

	return <Fragment>
		<ConvertToSocialIconsBlock
			clientId={ clientId }
			attributes={ attributes }
		/>
	</Fragment>;
};

const ConvertToSocialIconsBlock = ( { clientId, attributes, isConvertRun } ) => {
	const { replaceBlocks } = useDispatch( 'core/block-editor' );
	const [ isConvertDone, setConvertDone ] = useState( false );

	const innerBlocks = [
		createBlock( 'core/heading', {
			content: attributes.title,
			level: 3,
			placeholder: __( 'Title', 'zoom-social-icons-widget' ),
			className: 'test-iobanavrod',
		} ),
		createBlock( 'core/paragraph', {
			content: attributes.description,
			placeholder: __( 'Text above icons', 'zoom-social-icons-widget' ),
		} ),
		createBlock( 'wpzoom-blocks/social-icons', attributes ),
	];

	const shouldReplaceBlock = isConvertRun && ! isConvertDone;

	useEffect( () => {
		if ( shouldReplaceBlock ) {
			replaceBlocks( clientId, [
				createBlock(
					'core/group',
					{
						tagName: 'div',
						layout: { inherit: true },
					},
					innerBlocks
				),
			] );

			// Set state convert done
			setConvertDone( true );

			// Call action after convert isDone
			doAction( 'converter.isConvertDone', { ...{ attributes } } );
		}
	}, [ shouldReplaceBlock, replaceBlocks ] );

	if ( ! shouldReplaceBlock ) {
		return (
			<Placeholder>
				<Spinner />
			</Placeholder>
		);
	}

	return null;
};

export default memo( TransformToBlock );
