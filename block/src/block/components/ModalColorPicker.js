import {Component} from '@wordpress/element';
import {ColorIndicator, ColorPicker, Popover} from '@wordpress/components';

class ModalColorPicker extends Component {

    state = {
        color: this.props.color,
        showColorPicker: false
    };

    onClickColorIndicatorHandler = () => {
        this.setState({showColorPicker: true});
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
            <ColorIndicator title={this.props.title} className={this.props.className} colorValue={this.state.color}
                            onClick={this.onClickColorIndicatorHandler}>
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