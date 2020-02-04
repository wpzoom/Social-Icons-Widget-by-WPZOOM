const {Component} = wp.element;
const {ColorIndicator, ColorPicker, Popover} = wp.components;

class ModalColorPicker extends Component {

    state = {
        color: this.props.color,
        showColorPicker: false
    };

    onClickColorIndicatorHandler = () => {
        this.setState({showColorPicker: true});
    };

    onChangeColorPickerHandler = (color) => {
        this.setState({flashColor: color.hex});
    };

    resetColorPickerHandler = (e) => {
        e.stopPropagation();
        this.setState({showColorPicker: false});
    };

    setColorPickerHandler = (color) => {
        this.setState({color: color.hex}, () => {
            this.props.save(this.state)
        });

    };

    focusOutsideHandler = () => {
        this.setState({showColorPicker: false});
    };

    render() {
        return (
            <ColorIndicator title={this.props.title} className={this.props.className} colorValue={this.state.color} onClick={this.onClickColorIndicatorHandler}>
                {this.state.showColorPicker &&
                (<Popover position={'middle right'} onFocusOutside={this.focusOutsideHandler}>
                    <div className={'popover-content'}>
                        <ColorPicker
                            className={'wpzoom-color-picker'}
                            disableAlpha
                            color={this.state.color}
                            onChangeComplete={this.setColorPickerHandler}
                        />
                    </div>
                </Popover>)}
            </ColorIndicator>
        );
    }
}

export default ModalColorPicker;