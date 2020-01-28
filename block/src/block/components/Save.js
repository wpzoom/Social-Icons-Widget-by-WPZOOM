import Helper from "./Helper";
import classnames from "classnames";

const {Component} = wp.element;

class Save extends Component {

    constructor(props) {
        super(...arguments);
    }

    render() {
        const {
            attributes
        } = this.props;

        let {className} = attributes;

        if (Helper.getBlockStyle(className) == null) {
            className = classnames(className, 'is-style-with-canvas-round');
        }

        const getIconsAlignmentStyle = (alignment) => {
            const styles = {
                'left': 'flex-start',
                'right': 'flex-end',
                'center': 'center'
            };

            return styles[alignment];
        };

        const getRelAttr = () => {
            let relAttr = [];

            if (attributes.nofollow) {
                relAttr.push('nofollow');
            }
            if (attributes.noreferrer) {
                relAttr.push('noreferrer');
            }
            if (attributes.noopener) {
                relAttr.push('noopener');
            }

            if (attributes.openLinkInNewTab) {
                relAttr = ['noopener', 'noreferrer'];
            }

            return relAttr;
        };

        let IconsList = attributes.selectedIcons.map((list, key) => {

            let showIconsLabel = attributes.showIconsLabel ?
                <span
                    className={classnames('icon-label')}>{list.label}</span> : '';

            const relAttr = getRelAttr();

            return (
                <a key={key}
                   href={list.url}
                   className={'social-icon-link'}
                   target={attributes.openLinkInNewTab ? '_blank' : undefined}
                   rel={relAttr.length ? relAttr.join(' ') : undefined}
                   style={{
                       '--wpz-social-icons-block-item-color': list.color,
                       '--wpz-social-icons-block-item-color-hover': list.hoverColor
                   }}
                >
                    <span className={classnames(Helper.getIconClassList(list.iconKit, list.icon))}></span>
                    {showIconsLabel}
                </a>
            );
        });

        return (
            <div className={className} style={{
                '--wpz-social-icons-block-item-font-size': Helper.addPixelsPipe(attributes.iconsFontSize),
                '--wpz-social-icons-block-item-padding': Helper.addPixelsPipe(attributes.iconsPadding),
                '--wpz-social-icons-block-item-margin': Helper.addPixelsPipe(attributes.iconsMargin),
                '--wpz-social-icons-block-item-border-radius': Helper.addPixelsPipe(attributes.iconsBorderRadius),
                '--wpz-social-icons-block-label-font-size': Helper.addPixelsPipe(attributes.iconsLabelFontSize),
                '--wpz-social-icons-block-label-color': attributes.iconsLabelColor,
                '--wpz-social-icons-block-label-color-hover': attributes.iconsLabelHoverColor,
                '--wpz-social-icons-alignment': getIconsAlignmentStyle(attributes.iconsAlignment)
            }}>
                {IconsList}
            </div>
        );
    }

}

export default Save;