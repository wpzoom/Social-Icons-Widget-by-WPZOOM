import ModalColorPicker from './ModalColorPicker';
import SocialIcon from './SocialIcon';
import Helper from './Helper';
import React from "react";
import classnames from 'classnames';

const {__} = wp.i18n;
const {Component} = wp.element;
const {Button, Modal, TextControl, SelectControl} = wp.components;
const {icons} = wpzSocialIconsBlock;

class SocialIconsModal extends Component {

    state = {
        modalShow: this.props.show,
        modalUrl: this.props.url,
        modalLabel: this.props.label,
        modalIcon: this.props.icon,
        modalIconKit: this.props.iconKit,
        modalColor: this.props.color,
        modalHoverColor: this.props.hoverColor,
        modalSearch: ''
    };

    constructor(props) {
        super(props);
        this.myRef = React.createRef();
    }

    getIconPack = (iconKit) => {
        return icons[iconKit];
    };

    urlTextControlHandler = (value) => {
        this.setState({modalUrl: value});

        let iconFromUrl = Helper.filterUrlScheme(value);

        if (iconFromUrl) {
            const filteredIcons = Helper.filterIcons(iconFromUrl);

            if (filteredIcons[this.state.modalIconKit].length) {
                this.setState({modalIcon: filteredIcons[this.state.modalIconKit][0].icon});
            }
        }
    };

    labelTextControlHandler = (value) => {
        this.setState({modalLabel: value});
    };

    searchTextControlHandler = (value) => {
        this.setState({modalSearch: value});
    };

    saveColorPickerHandler = (arg) => {
        this.setState({modalColor: arg.color});
    };

    saveHoverColorPickerHandler = (arg) => {
        this.setState({modalHoverColor: arg.color});
    };

    static getDerivedStateFromProps(props, state) {

        if (props.show != state.modalShow) {
            return {
                modalShow: props.show,
                modalUrl: props.url,
                modalLabel: props.label,
                modalIcon: props.icon,
                modalIconKit: props.iconKit,
                modalColor: props.color,
                modalHoverColor: props.hoverColor,
                modalSearch: ''
            };
        }

        return null;
    }

    onClickIconHandler = (icon) => {
        this.setState({modalIcon: icon, modalLabel: Helper.humanizeIconLabel(icon)});
    };

    componentDidUpdate() {
        this.scrollMe();
    }

    scrollMe = () => {
        const node = this.myRef.current;

        if (!(null == node)) {
            node.scrollIntoView(true);
        }
    };

    render() {
        if (!this.state.modalShow) {
            return null;
        }

        let iconElements = Object.keys(Helper.filterIcons(this.state.modalSearch)).map((iconKit, iconKey) =>
            <div key={iconKey}
                 className={classnames('option-item', 'icon-kit', `${iconKit}-wrapper`)}
                 style={{display: this.state.modalIconKit === iconKit ? 'block' : 'none'}}>{
                Helper.filterIcons(this.state.modalSearch)[iconKit].map((element, key) =>
                    <SocialIcon
                        key={key}
                        setRef={this.state.modalIcon === element.icon && this.state.modalIconKit === iconKit ? this.myRef : null}
                        backgroundStyle={this.props.backgroundStyle}
                        color={this.state.modalColor}
                        hoverColor={this.state.modalHoverColor}
                        icon={element.icon}
                        click={this.onClickIconHandler}
                        isSelected={this.state.modalIcon == element.icon}
                        iconKit={iconKit}
                    ></SocialIcon>
                )
            }</div>);

        return (
            <Modal
                className={classnames('wpzoom-social-icons-modal')}
                title={__('Select Icon', 'zoom-social-icons-widget')}
                shouldCloseOnClickOutside={false}
                onRequestClose={() => this.props.onClose(this.state)}>
                <div className={"modal-content"}>
                    <div className={"option-item"}>
                        <div className="label">{__('URL', 'zoom-social-icons-widget')}</div>
                        <div className="option-wrapper">
                            <TextControl
                                value={this.state.modalUrl}
                                onChange={this.urlTextControlHandler}
                            />
                        </div>
                    </div>
                    {
                        this.props.showIconsLabel ?
                            <div className="option-item">
                                <div className="label">{__('Label', 'zoom-social-icons-widget')}</div>
                                <div className="option-wrapper">
                                    <TextControl
                                        value={this.state.modalLabel}
                                        onChange={this.labelTextControlHandler}
                                    />
                                </div>
                            </div> : null
                    }
                    <div className="option-item">
                        <div className="label">{__('Pick icon color', 'zoom-social-icons-widget')}</div>
                        <div className="option-wrapper">
                            <ModalColorPicker
                                save={this.saveColorPickerHandler}
                                color={this.state.modalColor}/>
                        </div>
                    </div>
                    <div className="option-item">
                        <div className="label">{__('Pick hover color', 'zoom-social-icons-widget')}</div>
                        <div className="option-wrapper">
                            <ModalColorPicker
                                save={this.saveHoverColorPickerHandler}
                                color={this.state.modalHoverColor}/>
                        </div>
                    </div>
                    <div className="option-item">
                        <div className="label">{__('Select Icon Kit', 'zoom-social-icons-widget')}</div>
                        <div className="option-wrapper">
                            <SelectControl
                                value={this.state.modalIconKit}
                                onChange={(currentIconKit) => {
                                    this.setState({modalIconKit: currentIconKit})
                                }}
                                options={[
                                    {value: 'socicon', label: __('Socicons', 'zoom-social-icons-widget')},
                                    {value: 'dashicons', label: __('Dashicons', 'zoom-social-icons-widget')},
                                    {value: 'genericon', label: __('Genericons', 'zoom-social-icons-widget')},
                                    {value: 'academicons', label: __('Academicons', 'zoom-social-icons-widget')},
                                    {value: 'fab', label: __('Font Awesome Brands', 'zoom-social-icons-widget')},
                                    {value: 'far', label: __('Font Awesome Regular', 'zoom-social-icons-widget')},
                                    {value: 'fas', label: __('Font Awesome Solid', 'zoom-social-icons-widget')},
                                ]}
                            />
                        </div>
                    </div>
                    <div className={'option-item icon-kits-wrapper'}>
                        {iconElements}
                    </div>
                </div>
                <div className="modal-controls">
                    <div className="modal-search">
                        <TextControl
                            placeholder={__('Type to search icon', 'zoom-social-icons-widget')}
                            value={this.state.modalSearch}
                            onChange={this.searchTextControlHandler}
                        />
                    </div>
                    <div className="modal-buttons">
                        {this.props.showDeleteBtn &&
                        <Button className={'button-link-delete is-button'} onClick={() => this.props.delete()}>
                            {__('Delete Icon', 'zoom-social-icons-widget')}
                        </Button>
                        }
                        <Button isPrimary onClick={() => this.props.save(this.state)}>
                            {__('Save', 'zoom-social-icons-widget')}
                        </Button>
                    </div>

                </div>
            </Modal>
        )
    }
}

export default SocialIconsModal;