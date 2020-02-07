import {Component, Fragment} from '@wordpress/element';
import {TextControl, IconButton} from '@wordpress/components';
import {__} from '@wordpress/i18n';


class PopoverSearch extends Component {

    state = {
        searchValue: this.props.value
    };

    onChangeTextControlHandler = (newValue) => {
        this.setState({searchValue: newValue});
    };

    onKeyDownHandler = (e) => {
        if (e.key === 'Enter') {
            this.props.save(e, this.state.searchValue);
        }
    };

    render() {
        return (
            <Fragment>
                <TextControl
                    className={'url-input'}
                    value={this.state.searchValue}
                    onChange={this.onChangeTextControlHandler}
                    onKeyDown={(e) => this.onKeyDownHandler(e)}
                />
                <IconButton
                    icon={'editor-break'}
                    label={__('Apply', 'zoom-social-icons-widget')}
                    onClick={(e) => this.props.save(e, this.state.searchValue)}
                    className={['is-button', 'button-small', 'is-default', 'url-button']}>
                </IconButton>
            </Fragment>
        )
    }
}

export default PopoverSearch;