/* global wpzSocialIconsBlock */

import URI from 'urijs';
import { find, findKey, forEach, isObject } from 'lodash';

const { icons } = wpzSocialIconsBlock;

import TokenList from '@wordpress/token-list';

class Helper {
	static filterIcons( searchIcon ) {
		const collector = {};

		if ( searchIcon === '' ) {
			return icons;
		}

		forEach( icons, ( iconsArray, key ) => {
			collector[ key ] = iconsArray.filter( ( item ) => {
				if ( isObject( item ) ) {
					return item.icon.indexOf( searchIcon ) > -1; // && category;
				}

				return item.indexOf( searchIcon ) > -1;
			} );
		} );

		return collector;
	}

	static filterUrlScheme( url ) {
		const schemas = {
			mailto: 'mail',
			viber: 'viber',
			skype: 'skype',
			tg: 'tg',
			tel: 'mobile',
			sms: 'comments',
			fax: 'fax',
			news: 'newspaper-o',
			feed: 'rss',
		};

		const domains = {
			'feedburner.google.com': 'rss',
			'ok.ru': 'odnoklassniki',
			'yt.com': 'youtube',
			'fb.com': 'facebook',
			't.me': 'telegram',
			'wa.me': 'whatsapp',
			'zen.yandex.com': 'zen-yandex',
			'zen.yandex.ru': 'zen-yandex',
		};

		const uri = new URI( url );

		let domain =
			uri.domain() !== undefined
				? uri.domain().split( '.' ).shift()
				: uri.scheme();

		const schemaHasIcon = findKey( schemas, ( val, key ) => {
			return key === uri.scheme();
		} );

		domain = schemaHasIcon !== undefined ? schemas[ schemaHasIcon ] : domain;

		const domainHasIcon = findKey( domains, ( val, key ) => {
			return key === uri.hostname();
		} );

		return domainHasIcon !== undefined ? domains[ domainHasIcon ] : domain;
	}

	static hyphensToSpaces( s ) {
		return s.replace( /-/g, ' ' );
	}

	static capitalize( s ) {
		if ( typeof s !== 'string' ) {
			return '';
		}
		return s.charAt( 0 ).toUpperCase() + s.slice( 1 );
	}

	static humanizeIconLabel( s ) {
		return this.hyphensToSpaces( this.capitalize( s ) );
	}

	static getBlockStyle( className ) {
		const regex = /is-style-(\S*)/g;
		const m = regex.exec( className );
		return m !== null ? m[ 1 ] : null;
	}

	static getIconClassList( iconKit, icon ) {
		const classes = { 'social-icon': true };
		classes[ iconKit ] = true;

		if ( [ 'fab', 'fas', 'far' ].includes( iconKit ) ) {
			classes[ 'fa-' + icon ] = true;
		} else {
			classes[ iconKit + '-' + icon ] = true;
		}

		return classes;
	}

	static addPercentagePipe( value ) {
		return `${ value }%`;
	}

	static addPercentageHalfPipe( value ) {
		return `${ 0.5 * value }%/${ value }%`;
	}

	static addPixelsPipe( value ) {
		return `${ value }px`;
	}

	static arrayMoveMutate( array, from, to ) {
		array.splice( to < 0 ? array.length + to : to, 0, array.splice( from, 1 )[ 0 ] );
	}

	static arrayMove( array, from, to ) {
		array = array.slice();
		this.arrayMoveMutate( array, from, to );
		return array;
	}

	static getActiveStyle( styles, className ) {
		for ( const style of new TokenList( className ).values() ) {
			if ( style.indexOf( 'is-style-' ) === -1 ) {
				continue;
			}

			const potentialStyleName = style.substring( 9 );
			const activeStyle = find( styles, { name: potentialStyleName } );
			if ( activeStyle ) {
				return activeStyle;
			}
		}

		return find( styles, [ 'isDefault', true ] );
	}
}

export default Helper;
