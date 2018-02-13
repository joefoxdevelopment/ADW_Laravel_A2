import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Nav extends Component {
    render() {
        return (
            <p>Joe Fox Development</p>
        );
    }
}

if (document.getElementById('nav')) {
    ReactDOM.render(<Nav />, document.getElementById('nav'));
}
