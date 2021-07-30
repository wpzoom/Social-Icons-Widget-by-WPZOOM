/**
 * Inspector Controls
 */

import Helper from '../utils/helper';
import {__} from '@wordpress/i18n';
import {Component, Fragment} from '@wordpress/element';
import {InspectorControls} from '@wordpress/block-editor';
import {
    Button,
    PanelBody,
    PanelRow,
    FormToggle,
    ColorPalette,
    ColorIndicator,
    ButtonGroup,
    RangeControl
} from '@wordpress/components';

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {

    constructor(props) {
        super(...arguments);
    }

    state = {
        selectedIcons: JSON.parse(JSON.stringify(this.props.attributes.selectedIcons))
    };

    static getDerivedStateFromProps(props, state) {

        if (state.selectedIcons.length !== props.attributes.selectedIcons.length) {
            return {
                selectedIcons: JSON.parse(JSON.stringify(props.attributes.selectedIcons))
            }
        }

        return null;
    };

    setAlignment = (alignment) => {
        this.props.setAttributes({iconsAlignment: alignment});
    };

    getBlockStyle(classname) {
        const blockStyle = Helper.getBlockStyle(classname);
        return (null === blockStyle) ? 'with-canvas-round' : blockStyle;
    }

    render() {

        const colors = [
            {name: __('Turquoise', 'zoom-social-icons-widget'), color: '#4ECDC4'},
            {name: __('Charcoal', 'zoom-social-icons-widget'), color: '#2E3131'},
            {name: __('White', 'zoom-social-icons-widget'), color: '#fff'},
            {name: __('Dodger blue', 'zoom-social-icons-widget'), color: '#22A7F0'},
            {name: __('Red', 'zoom-social-icons-widget'), color: '#D91E18'},
            {name: __('Orange', 'zoom-social-icons-widget'), color: '#F89406'},
        ];

        const {setAttributes} = this.props;

        const isLeftAlignment = 'left' === this.props.attributes.iconsAlignment;
        const isCenterAlignment = 'center' === this.props.attributes.iconsAlignment;
        const isRightAlignment = 'right' === this.props.attributes.iconsAlignment;

        return (
            <InspectorControls>
                <PanelBody title={__('Icon Labels Settings', 'zoom-social-icons-widget')}>

                    <PanelRow>
                        <label
                            htmlFor="show-icon-labels"
                        >
                            {__(' Show icon labels?', 'zoom-social-icons-widget')}
                        </label>
                        <FormToggle
                            id="show-icon-labels"
                            label={__(' Show icon labels?', 'zoom-social-icons-widget')}
                            checked={this.props.attributes.showIconsLabel}
                            onChange={() => {
                                setAttributes({showIconsLabel: !this.props.attributes.showIconsLabel});
                            }}
                        />
                    </PanelRow>
                    <PanelRow>
                        <label
                            htmlFor="open-link-in-new-tab"
                        >
                            {__('Open links in new tab?', 'zoom-social-icons-widget')}
                        </label>
                        <FormToggle
                            id="open-link-in-new-tab"
                            label={__('Open links in new tab?', 'zoom-social-icons-widget')}
                            checked={this.props.attributes.openLinkInNewTab}
                            onChange={() => {
                                setAttributes({openLinkInNewTab: !this.props.attributes.openLinkInNewTab});
                            }}
                        />
                    </PanelRow>
                    {
                        !this.props.attributes.openLinkInNewTab && (
                            <Fragment>
                                <PanelRow>
                                    <label
                                        htmlFor="add-nofollow-to-links"
                                    >
                                        {__('Add rel="nofollow" to links', 'zoom-social-icons-widget')}
                                    </label>
                                    <FormToggle
                                        id="add-nofollow-to-links"
                                        label={__('Add rel="nofollow" to links', 'zoom-social-icons-widget')}
                                        checked={this.props.attributes.nofollow}
                                        onChange={() => {
                                            setAttributes({nofollow: !this.props.attributes.nofollow});
                                        }}
                                    />
                                </PanelRow>
                                <PanelRow>
                                    <label
                                        htmlFor="add-noreferrer-to-links"
                                    >
                                        {__('Add rel="noreferrer" to links', 'zoom-social-icons-widget')}
                                    </label>
                                    <FormToggle
                                        id="add-noreferrer-to-links"
                                        label={__('Add rel="noreferrer" to links', 'zoom-social-icons-widget')}
                                        checked={this.props.attributes.noreferrer}
                                        onChange={() => {
                                            setAttributes({noreferrer: !this.props.attributes.noreferrer});
                                        }}
                                    />
                                </PanelRow>
                                <PanelRow>
                                    <label
                                        htmlFor="add-noopener-to-links"
                                    >
                                        {__('Add rel="noopener" to links', 'zoom-social-icons-widget')}
                                    </label>
                                    <FormToggle
                                        id="add-noopener-to-links"
                                        label={__('Add rel="noopener" to links', 'zoom-social-icons-widget')}
                                        checked={this.props.attributes.noopener}
                                        onChange={() => {
                                            setAttributes({noopener: !this.props.attributes.noopener});
                                        }}
                                    />
                                </PanelRow>
                            </Fragment>
                        )
                    }
                </PanelBody>
                <PanelBody title={__('Icon Styling Settings', 'zoom-social-icons-widget')}>

                    {
                        (this.props.attributes.iconsHasBorder) ?
                            <Fragment>
                                <PanelRow>
                                    <label
                                        htmlFor="icons-border-radius"
                                    >
                                        {__('Icons Border Radius:', 'zoom-social-icons-widget')}
                                    </label>
                                </PanelRow>
                                <PanelRow>
                                    <RangeControl
                                        id={'icons-border-radius'}
                                        min={0}
                                        max={55}
                                        value={this.props.attributes.iconsBorderRadius}
                                        onChange={(newFontSize) => {
                                            setAttributes({iconsBorderRadius: newFontSize});
                                        }}
                                    />
                                </PanelRow>
                            </Fragment> : null

                    }
                    <PanelRow>
                        <label
                            htmlFor="add-noopener-to-links"
                        >
                            {__('Icons Alignment:', 'zoom-social-icons-widget')}
                        </label>
                    </PanelRow>
                    <PanelRow>
                        <ButtonGroup>
                            <Button
                                onClick={() => this.setAlignment('left')}
                                isPrimary={isLeftAlignment}
                                isSecondary={!isLeftAlignment}
                            >Left</Button>
                            <Button
                                onClick={() => this.setAlignment('center')}
                                isPrimary={isCenterAlignment}
                                isSecondary={!isCenterAlignment}

                            >Center</Button>
                            <Button
                                onClick={() => this.setAlignment('right')}
                                isPrimary={isRightAlignment}
                                isSecondary={!isRightAlignment}
                            >Right</Button>
                        </ButtonGroup>
                    </PanelRow>
                    <PanelRow>
                        <label
                            htmlFor="icons-font-size"
                        >
                            {__('Icons Font Size:', 'zoom-social-icons-widget')}
                        </label>
                    </PanelRow>
                    <PanelRow>
                        <RangeControl
                            id="icons-font-size"
                            min={0}
                            max={200}
                            value={this.props.attributes.iconsFontSize}
                            onChange={(newFontSize) => {
                                setAttributes({iconsFontSize: newFontSize});
                            }}
                        />
                    </PanelRow>
                    {(this.props.attributes.showIconsLabel) ?
                        <Fragment>
                            <PanelRow>
                                <label htmlFor="icons-label-font-size">
                                    {__('Icons Label Font Size:', 'zoom-social-icons-widget')}
                                </label>
                            </PanelRow>
                            <PanelRow>
                                <RangeControl
                                    id="icons-label-font-size"
                                    min={0}
                                    max={200}
                                    value={this.props.attributes.iconsLabelFontSize}
                                    onChange={(newFontSize) => {
                                        setAttributes({iconsLabelFontSize: newFontSize});
                                    }}
                                />
                            </PanelRow>
                        </Fragment>
                        : null}

                    <PanelRow>
                        <label
                            htmlFor="icons-padding"
                        >
                            {__('Icons Padding Horizontal:', 'zoom-social-icons-widget')}
                        </label>
                    </PanelRow>
                    <PanelRow>
                        <RangeControl
                            id="icons-padding-horizontal"
                            beforeIcon={'image-flip-horizontal'}
                            value={this.props.attributes.iconsPaddingHorizontal}
                            onChange={(padding) => setAttributes({iconsPaddingHorizontal: padding})}
                            min={0}
                            max={200}
                        />
                    </PanelRow>
                    <PanelRow>
                        <label
                            htmlFor="icons-padding"
                        >
                            {__('Icons Padding Vertical:', 'zoom-social-icons-widget')}
                        </label>
                    </PanelRow>
                    <PanelRow>
                        <RangeControl
                            id="icons-padding-vertical"
                            beforeIcon={'image-flip-vertical'}
                            value={this.props.attributes.iconsPaddingVertical}
                            onChange={(padding) => setAttributes({iconsPaddingVertical: padding})}
                            min={0}
                            max={200}
                        />
                    </PanelRow>
                    <PanelRow>
                        <label
                            htmlFor="icons-margin-horizontal"
                        >
                            {__('Icons Margin Horizontal:', 'zoom-social-icons-widget')}
                        </label>
                    </PanelRow>
                    <PanelRow>
                        <RangeControl
                            id="icons-margin-horizontal"
                            beforeIcon={'image-flip-horizontal'}
                            value={this.props.attributes.iconsMarginHorizontal}
                            onChange={(margin) => setAttributes({iconsMarginHorizontal: margin})}
                            min={0}
                            max={200}
                        />
                    </PanelRow>
                    <PanelRow>
                        <label
                            htmlFor="icons-margin-vertical"
                        >
                            {__('Icons Margin Vertical:', 'zoom-social-icons-widget')}
                        </label>
                    </PanelRow>
                    <PanelRow>
                        <RangeControl
                            id="icons-margin-vertical"
                            beforeIcon={'image-flip-vertical'}
                            value={this.props.attributes.iconsMarginVertical}
                            onChange={(margin) => setAttributes({iconsMarginVertical: margin})}
                            min={0}
                            max={200}
                        />
                    </PanelRow>
                </PanelBody>
                <PanelBody title={__('Icon Color Settings', 'zoom-social-icons-widget')}>
                    <PanelRow>
                        <label
                            htmlFor="icon-color"
                        >
                            {__('Set color for all icons', 'zoom-social-icons-widget')}
                        </label>
                        <ColorIndicator colorValue={this.props.attributes.iconsColor}/>
                    </PanelRow>
                    <PanelRow>
                        <ColorPalette
                            id={'icon-color'}
                            colors={colors}
                            value={this.props.attributes.iconsColor}
                            onChange={(color) => {
                                let clonedSelectedIcons = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));

                                clonedSelectedIcons.map((item, key) => {
                                    item.color = undefined === color ? this.state.selectedIcons[key].color : color;
                                    return item;
                                });

                                setAttributes({iconsColor: color, selectedIcons: clonedSelectedIcons});
                            }}
                        />
                    </PanelRow>
                    <PanelRow>
                        <label
                            htmlFor="icon-hover-color"
                        >
                            {__('Set hover color for all icons', 'zoom-social-icons-widget')}
                        </label>
                        <ColorIndicator colorValue={this.props.attributes.iconsHoverColor}/>
                    </PanelRow>
                    <PanelRow>
                        <ColorPalette
                            id={'icon-hover-color'}
                            colors={colors}
                            value={this.props.attributes.iconsHoverColor}
                            onChange={(color) => {
                                let clonedSelectedIcons = [...this.props.attributes.selectedIcons];

                                clonedSelectedIcons.map((item, key) => {
                                    item.hoverColor = undefined === color ? this.state.selectedIcons[key].hoverColor : color;
                                    return item;
                                });

                                setAttributes({iconsHoverColor: color, selectedIcons: clonedSelectedIcons});
                            }}
                        />
                    </PanelRow>
                    {(this.props.attributes.showIconsLabel) ?
                        <Fragment>
                            <PanelRow>
                                <label
                                    htmlFor="icon-label-color"
                                >
                                    {__('Set color for all label icons', 'zoom-social-icons-widget')}
                                </label>
                                <ColorIndicator colorValue={this.props.attributes.iconsLabelColor}/>
                            </PanelRow>
                            <PanelRow>
                                <ColorPalette
                                    id={'icon-label-color'}
                                    colors={colors}
                                    value={this.props.attributes.iconsLabelColor}
                                    onChange={(color) => {
                                        setAttributes({iconsLabelColor: color});
                                    }}
                                />
                            </PanelRow>
                            <PanelRow>
                                <label
                                    htmlFor="icon-hover-label-color"
                                >
                                    {__('Set hover color for all label icons', 'zoom-social-icons-widget')}
                                </label>
                                <ColorIndicator colorValue={this.props.attributes.iconsLabelHoverColor}/>
                            </PanelRow>
                            <PanelRow>
                                <ColorPalette
                                    id={'icon-hover-label-color'}
                                    colors={colors}
                                    value={this.props.attributes.iconsLabelHoverColor}
                                    onChange={(color) => {
                                        setAttributes({iconsLabelHoverColor: color});
                                    }}
                                />
                            </PanelRow>
                        </Fragment> : null}
                </PanelBody>
            </InspectorControls>
        );
    }
}
