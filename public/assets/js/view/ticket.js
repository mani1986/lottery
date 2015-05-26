/*global $, Backbone, document, window, jQuery */
var app = app || {};

(function ($) {
    'use strict';

    app.TicketView = Backbone.View.extend({
        //model: app.AppModel,

        el: 'body',

        /**
         * Initialize events.
         */
        events: {
            'click > *': 'closePopup',
            'keydown': 'keydown'
        },

        /**
         * Initialize the app view.
         */
        initialize: function () {

        },

        register: function() {

        },

        claim: function() {

        }
    });
}(jQuery));
