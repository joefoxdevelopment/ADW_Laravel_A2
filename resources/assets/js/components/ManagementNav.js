import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class ManagementNav extends Component {
    render() {
        return (
            <div className="nav__container">
                <div className="nav__desktop">
                    <a className="nav__title" href="/manage">Joe Fox Development - Management Console</a>
                    <ul className="nav__links">
                        <li className="nav__links__link"><a href="/manage/blog">Blog Management</a></li>
                        <li className="nav__links__link"><a href="/manage/projects">Project Management</a></li>
                        <li className="nav__links__link"><a href="/logout">Logout</a></li>
                    </ul>
                </div>
                <div className="nav__mobile">
                    <a className="nav__title" href="/manage">Joe Fox Development - Management Console</a>
                    <span className="js-nav-hamburger nav__hamburger"><img src="/images/svg/nav-open.svg" /></span>
                    <div className="js-mobile-menu nav__mobile__links">
                        <a className="js-nav-link" href="/manage/blog">Blog Management</a>
                        <a className="js-nav-link" href="/manage/projects">Project Management</a>
                        <a className="js-nav-link" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('management-nav')) {
    ReactDOM.render(<ManagementNav />, document.getElementById('management-nav'));
}
