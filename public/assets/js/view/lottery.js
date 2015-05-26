/*global $, Backbone, document, window, jQuery */
var app = app || {};

(function ($) {
    'use strict';

    app.LotteryView = Backbone.View.extend({
        //model: app.AppModel,

        el: 'body',

        /**
         * Initialize events.
         */
        events: {
            'click #buttonRegister': 'register'
        },

        /**
         * Initialize the app view.
         */
        initialize: function () {

        },

        register: function() {
            this.registerView = new app.RegisterView();
            this.$el.find('#buttonRegister').hide();
        },

        registerClose: function() {
            this.$el.find('#buttonRegister').show();
        },

        claim: function() {

        }
    });
}(jQuery));
