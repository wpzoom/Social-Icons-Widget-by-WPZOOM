import URI from 'urijs';
import {find} from 'lodash';

const {icons} = wpzSocialIconsBlock;
const TokenList = wp.tokenList;

class Helper {

    static filterIcons(searchIcon) {
        let collector = {};

        if (searchIcon == '')
            return icons;

        _.each(icons, function (iconsArray, key) {
            collector[key] = iconsArray.filter(function (item) {
                if (_.isObject(item)) {
                    return item.icon.indexOf(searchIcon) > -1;// && category;
                }

                return item.indexOf(searchIcon) > -1;
            });
        });

        return collector;
    }

    static filterUrlScheme(url) {

        const schemas = {
            'mailto': 'mail',
            'viber': 'viber',
            'skype': 'skype',
            'tg': 'tg',
            'tel': 'mobile',
            'sms': 'comments',
            'fax': 'fax',
            'news': 'newspaper-o',
            'feed': 'rss'
        };

        const domains = {
            'feedburner.google.com': 'rss',
            'ok.ru': 'odnoklassniki',
            't.me': 'telegram',
            'zen.yandex.com': 'zen-yandex',
            'zen.yandex.ru': 'zen-yandex'
        };

        let uri = new URI(url);

        let domain = uri.domain() !== undefined ? uri.domain().split('.').shift() : uri.scheme();

        let schemaHasIcon = _.findKey(schemas, function (val, key) {
            return key === uri.scheme();
        });

        domain = schemaHasIcon !== undefined ? schemas[schemaHasIcon] : domain;

        let domainHasIcon = _.findKey(domains, function (val, key) {
            return key === uri.hostname();
        });

        return (domainHasIcon !== undefined) ? domains[domainHasIcon] : domain;
    }

    static hyphensToSpaces(s) {
        return s.replace(/-/g, ' ');
    }

    static capitalize(s) {
        if (typeof s !== 'string') return '';
        return s.charAt(0).toUpperCase() + s.slice(1)
    }

    static humanizeIconLabel(s) {
        return this.hyphensToSpaces(this.capitalize(s));
    }

    static getBlockStyle(className) {
        const regex = /is-style-(\S*)/g;
        let m = regex.exec(className);
        return m !== null ? m[1] : null;
    }

    static getIconClassList(iconKit, icon) {

        let classes = {'social-icon': true};
        classes[iconKit] = true;

        if (['fab', 'fas', 'far'].includes(iconKit)) {
            classes['fa-' + icon] = true;
        } else {
            classes[iconKit + '-' + icon] = true;
        }

        return classes;

    }

    static addPercentagePipe(value) {
        return `${value}%`;
    }

    static addPercentageHalfPipe(value) {
        return `${0.5*value}%/${value}%`;
    }

    static addPixelsPipe(value) {
        return `${value}px`;
    }

    static arrayMoveMutate(array, from, to) {
        array.splice(to < 0 ? array.length + to : to, 0, array.splice(from, 1)[0]);
    }

    static arrayMove(array, from, to) {
        array = array.slice();
        this.arrayMoveMutate(array, from, to);
        return array;
    }

    static getActiveStyle(styles, className) {
        for (const style of new TokenList(className).values()) {
            if (style.indexOf('is-style-') === -1) {
                continue;
            }

            const potentialStyleName = style.substring(9);
            const activeStyle = find(styles, {name: potentialStyleName});
            if (activeStyle) {
                return activeStyle;
            }
        }

        return find(styles, 'isDefault');
    }
}

export default Helper;