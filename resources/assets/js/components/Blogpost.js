import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Blogpost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "Example blogpost title",
            content: "Example blogpost content",
            publishTime: new Date(),
        };
    }

    updateTitle(title) {
        this.setState({
            title: title,
        });
        this.updatePublishTime();
    }

    updateContent(content) {
        this.setState({
            content: content,
        });
    }

    updatePublishTime() {
        this.setState({
            publishTime: new Date(),
        });
    }

    setBlogPost(title, date, content) {
        this.setState({
            title: title,
            content: content,
            publishTime: new Date(date),
        });
    }

    render() {
        return (
            <div className="blogpost-entry">
                <h1>{ this.state.title }</h1>
                <span className="blog-post-date">{ this.state.publishTime.toDateString() }</span>
                <div className="blogpost-contents" dangerouslySetInnerHTML={{__html: this.state.content}} />
            </div>
        );
    }
}

if (document.getElementById('blogpost')) {
    window.jfd = window.jfd || {};
    window.jfd.post = ReactDOM.render(<Blogpost />, document.getElementById('blogpost'));
}
