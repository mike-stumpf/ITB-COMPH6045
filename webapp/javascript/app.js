/*
 this follows the namespacing pattern listed here https://addyosmani.com/blog/essential-js-namespacing/
 */

var app = {

    //libraries (highest level for ease of use)
    ajax: {},
    animations: {},
    helpers: {},
    mediaQueries: {},
    modals: {},

    //modules
    modules: {
        carousel: {}
    },

    //templates
    views: {
        admin: {
            create: {},
            edit: {}
        },
        user: {
            login: {},
            profile: {}
        },
        shop: {
            pdp: {}
        }
    },

    //functions
    init: function(){
        //reset modals
        window.location.hash = '';

        var views = app.views;

        //libs        
        app.modals.init();
        
        //user
        views.user.login.init();
        views.user.profile.init();

        //admin
        views.admin.create.init();
        views.admin.edit.init();

        //shop
        views.shop.pdp.init();
    }
};

//wait for the dom to load
$(function(){
    app.init();
});