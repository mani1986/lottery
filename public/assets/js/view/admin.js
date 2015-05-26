/*global $, Backbone, document, window, jQuery */
var app = app || {};

(function ($) {
    'use strict';

    app.AdminView = Backbone.View.extend({
        el: 'body',

        /**
         * Initialize events.
         */
        events: {
            'click #buttonDraw': 'draw'
        },

        /**
         * Make a draw for the lottery
         */
        draw: function() {
            var self = this;
            this.hideError();
            this.hideMessage();

            var draw = new app.Draw();

            draw.save(null, {
                success: function(model, response) {
                    if (response.Error) {
                        self.showError(response.Error);
                    } else {
                        console.log(model);
                        self.message = new app.MessageView({message: 'We have a winner! Name: ' + model.get('winner')});
                    }
                },
                error: function(model, response) {
                    self.showError(response.Error);
                }
            });
        },

        /**
         * Hide the error message.
         */
        hideError: function() {
            if (this.error) {
                this.error.$el.hide();
            }
        },

        /**
         * Hide the message.
         */
        hideMessage: function() {
            if (this.message) {
                this.message.$el.hide();
            }
        },

        /**

        /**
         *
         * @param error
         */
        showError: function(error) {
            this.error = new app.ErrorView({message: error.message});
        }
    });

    app.admin = new app.AdminView();
}(jQuery));
