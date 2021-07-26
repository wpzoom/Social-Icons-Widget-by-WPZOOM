/**
 * External dependencies
 */
import { castArray } from 'lodash';

/**
 * WordPress dependencies
 */
import { useDispatch, useSelect } from '@wordpress/data';
import { _n, sprintf } from '@wordpress/i18n';
import { speak } from '@wordpress/a11y';
import { useCallback } from '@wordpress/element';

/**
 * @typedef WPInserterConfig
 * @property {string=}   rootClientId   If set, insertion will be into the
 *                                      block with this ID.
 * @property {number=}   insertionIndex If set, insertion will be into this
 *                                      explicit position.
 * @property {string=}   clientId       If set, insertion will be after the
 *                                      block with this ID.
 * @property {boolean=}  isAppender     Whether the inserter is an appender
 *                                      or not.
 * @property {Function=} onSelect       Called after insertion.
 */

/**
 * Returns the insertion point state given the inserter config.
 *
 * @param {WPInserterConfig} config Inserter Config.
 * @return {Array} Insertion Point State (onInsertBlocks and replaceIndex).
 */
function useInsertionPoint( {
	rootClientId = '',
	insertionIndex,
	clientId,
	shouldFocusBlock = true,
} ) {
	const { sidebar, destinationRootClientId, destinationIndex } = useSelect(
		( select ) => {
			const { getBlockIndex, getBlockOrder, getBlock } = select( 'core/block-editor' );

			const _destinationRootClientId = rootClientId;
			let _destinationIndex;

			if ( insertionIndex !== undefined ) {
				// Insert into a specific index.
				_destinationIndex = insertionIndex;
			} else if ( clientId ) {
				// Insert after a specific client ID.
				_destinationIndex = getBlockIndex( clientId, _destinationRootClientId );
			} else if ( _destinationRootClientId !== '' ) {
				// Insert in place of root client ID.
				_destinationIndex = getBlockIndex( rootClientId );
			} else {
				// Insert at the end of the list.
				_destinationIndex = getBlockOrder( _destinationRootClientId ).length;
			}

			return {
				sidebar: getBlock( _destinationRootClientId ),
				destinationRootClientId: _destinationRootClientId,
				destinationIndex: _destinationIndex,
			};
		},
		[ rootClientId, insertionIndex, clientId ]
	);

	const { insertBlocks, removeBlock } = useDispatch( 'core/block-editor' );

	const onReplaceBlock = useCallback(
		( blocks, meta, shouldForceFocusBlock = false ) => {
			const { attributes: { name: sidebarName } } = sidebar;
			removeBlock( clientId );

			insertBlocks(
				blocks,
				destinationIndex,
				destinationRootClientId,
				true,
				shouldFocusBlock || shouldForceFocusBlock ? 0 : null,
				meta
			);

			const message = sprintf(
				// translators: %d: the name of the block that has been added %s: sidebar name.
				_n( '%1$d group block added in the sidebar: %2$s.', '%1$d group blocks added in the sidebar: %2$s.', castArray( blocks ).length ),
				castArray( blocks ).length, sidebarName
			);
			speak( message );
		},
		[
			insertBlocks,
			sidebar,
			clientId,
			destinationRootClientId,
			destinationIndex,
			shouldFocusBlock,
			removeBlock,
		]
	);

	return [ onReplaceBlock, destinationIndex ];
}

export default useInsertionPoint;
