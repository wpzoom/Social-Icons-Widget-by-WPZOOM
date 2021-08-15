import { Component } from '@wordpress/element';
import classnames from 'classnames';
import Helper from '../utils/helper';

class SocialIcon extends Component {
    state = {
    	isHover: false,
    };

    onMouseEnterCallback = () => {
    	this.setState( { isHover: true } );
    };

    onMouseLeaveCallback = () => {
    	this.setState( { isHover: false } );
    };

    render() {
    	return ( <span
	ref={ this.props.setRef }
	onClick={ () => this.props.click( this.props.icon ) }
	className={ classnames( Helper.getIconClassList( this.props.iconKit, this.props.icon ), { selected: this.props.isSelected } ) }
	style={ { backgroundColor: this.state.isHover ? this.props.hoverColor : this.props.color } }
	onMouseEnter={ this.onMouseEnterCallback }
	onMouseLeave={ this.onMouseLeaveCallback }
    	></span>
    	);
    }
}

export default SocialIcon;
