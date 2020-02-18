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
        e.stopPropagation();
        if (e.key === 'Enter') {
            this.props.save(e, this.state.searchValue);
        }
    };

    onClickHandler = (e) => {
        e.stopPropagation();
        this.props.save(e, this.state.searchValue);
    };

    render() {
        return (
            <Fragment>
                <TextControl
                    className={'url-input'}
                    type={'text'}
                    value={this.state.searchValue}
                    onChange={this.onChangeTextControlHandler}
                    onKeyDown={this.onKeyDownHandler}
                />
                <IconButton
                    icon={'editor-break'}
                    label={__('Apply', 'zoom-social-icons-widget')}
                    onClick={this.onClickHandler}
                    className={['is-button', 'button-small', 'is-default', 'url-button']}>
                </IconButton>
            </Fragment>
        )
    }
}

export default PopoverSearch;