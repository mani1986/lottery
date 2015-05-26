/*global $, Backbone */
var app = app || {};

(function ($) {
    'use strict';

    app.Router = Backbone.Router.extend({
        routes: {
            'register': 'register',
            'claim': 'claim'
        },

        /**
         * Register in the lottery.
         */
        register: function() {
            app.view.register();
        },

        /**
         * Claim winnings.
         */
        claim: function() {
            app.view.claim();
        }
    });

})(jQuery);

app.router = new app.Router();
app.view = new app.LotteryView();

Backbone.history.start();
