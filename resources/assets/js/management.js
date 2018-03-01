/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * React Components
 */

require('./components/Footer');
require('./components/ManagementNav');
require('./components/Blogpost');

/**
 * Other JavaScript
 */

//Events should be added after react components are added
 require('./events/nav');
 require('./events/updatePreview');
