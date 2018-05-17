/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Project: TT Menu - Vertical Horizontal Bootstrap Mega Menu
 * Author: Trending Templates Team
 * Author URI: www.trendingtemplates.com
 * Dependencies: Bootstrap's mega menu plugin
 * A professional Bootstrap mega menu plugin with tons of options.
 */

(function($) {
    "use strict";

    /* ==============================================
    HEADER AFFIX -->
    =============================================== */
    $("#stickymenu.ttmenu").affix({
        offset: {
            top: 100
        }
    })

    /* ==============================================
    FIX VIDEO -->
    =============================================== */

    $(document).ready(function() {
        //$(".ttmenu").fitVids();
    });

    /* ==============================================
    TABBED HOVER -->
    =============================================== */

    $('.nav-pills > li ').hover(function() {
        if ($(this).hasClass('hoverblock'))
            return;
        else
            $(this).find('a').tab('show');
    });

    $('.nav-tabs > li').find('a').click(function() {
        $(this).parent()
            .siblings().addClass('hoverblock');
    });

    /* ==============================================
    MENU HOVER -->
    =============================================== */
    $(".hovermenu .dropdown").hover(
        function() { $(this).addClass('open') },
        function() { $(this).removeClass('open') }
    );

    /* ==============================================
    MENU CLICKABLE for HORIZONTAL -->
    =============================================== */

    $('.clickablemenu .dropdown').click('show.bs.dropdown', function(e) {
        var $dropdown = $(this).find('.dropdown-menu');
        var orig_margin_top = parseInt($dropdown.css('margin-top'));
        $dropdown.css({ 'margin-top': (orig_margin_top + 65) + 'px', opacity: 0 }).animate({ 'margin-top': orig_margin_top + 'px', opacity: 1 }, 420, function() {
            $(this).css({ 'margin-top': '' });
        });
    });

    /* ==============================================
    MENU CLICKABLE for VERTICAL -->
    =============================================== */

    $('.verticalmenu .dropdown').click('show.bs.dropdown', function(e) {
        var $dropdown = $(this).find('.dropdown-menu');
        var orig_margin_top = parseInt("1", 10);
        $dropdown.css({ 'margin-left': (orig_margin_top + 65) + 'px', opacity: 0 }).animate({ 'margin-left': orig_margin_top + 'px', opacity: 1 }, 420, function() {
            $(this).css({ 'margin-left': '' });
        });
    });

})(jQuery);

//window.Vue = require('vue');

//let axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('contact', require('./components/ContactComponent.vue'));

// import VueRouter from 'vue-router';


// let routes = [{
//     path: '/',
//     component: Task
// }];


// export default new VueRouter({
//     routes
// });

// const app = new Vue({
//     el: '#app'
// });