import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Footer extends Component {
	constructor(props) {
		super(props);
		this.state = {date: new Date()};
	}

    render() {
        return (
            <p>Joe Fox Development {this.state.date.getFullYear()}</p>
        );
    }
}

if (document.getElementById('footer')) {
    ReactDOM.render(<Footer />, document.getElementById('footer'));
}
