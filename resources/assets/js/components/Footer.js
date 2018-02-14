import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Footer extends Component {
	constructor(props) {
		super(props);
		this.state = {date: new Date()};
	}

    render() {
        return (
            <h5>&copy; Joe Fox Development {this.state.date.getFullYear()}</h5>
        );
    }
}

if (document.getElementById('footer')) {
    ReactDOM.render(<Footer />, document.getElementById('footer'));
}
