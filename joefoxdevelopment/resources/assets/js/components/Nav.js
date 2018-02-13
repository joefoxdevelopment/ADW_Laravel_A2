import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Nav extends Component {
    render() {
        return (
            <div className="nav__container">
                <div className="nav__desktop">
                    <a className="nav__title" href="/">Joe Fox Development</a>
                    <ul className="nav__links">
                        <li className="nav__links__link"><a href="#about">About</a></li>
                        <li className="nav__links__link"><a href="#projects">Projects</a></li>
                        <li className="nav__links__link"><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div className="nav__mobile">
                    <a className="nav__title" href="/">Joe Fox Development</a>
                    <span className="js-nav-hamburger nav__hamburger">Nav Icon Here</span>
                    <div className="js-mobile-menu nav__mobile__links">
                        <a className="js-nav-link" href="#about">About</a>
                        <a className="js-nav-link" href="#projects">Projects</a>
                        <a className="js-nav-link" href="#contact">Contact</a>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('nav')) {
    ReactDOM.render(<Nav />, document.getElementById('nav'));
}
