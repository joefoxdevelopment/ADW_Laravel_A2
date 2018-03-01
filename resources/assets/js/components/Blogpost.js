import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Blogpost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "Example blogpost title",
            content: "Example blogpost content",
        };
    }

    updateTitle(title) {
        this.setState({
            title: title,
        });
    }

    updateContent(content) {
        this.setState({
            content: content,
        });
    }

    render() {
        return (
            <div className="blogpost-entry">
                <h1>{ this.state.title }</h1>
                <span className="publishDate">Publish date</span>
                <div className="blogpost-contents" dangerouslySetInnerHTML={{__html: this.state.content}} />
            </div>
        );
    }
}

if (document.getElementById('blogpost')) {
    window.jfd = window.jfd || {};
    window.jfd.post = ReactDOM.render(<Blogpost />, document.getElementById('blogpost'));
}
