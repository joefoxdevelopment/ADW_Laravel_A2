import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Project extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "Example title",
            content: "Example content",
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
            <div className="project-entry">
                <h1>{ this.state.title }</h1>
                <a href="#">Get this project here</a>
                <div className="project-contents" dangerouslySetInnerHTML={{__html: this.state.content}} />
            </div>
        );
    }
}

if (document.getElementById('project')) {
    window.jfd = window.jfd || {};
    window.jfd.post = ReactDOM.render(<Project />, document.getElementById('project'));
}
