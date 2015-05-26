/*global $, Backbone, document, window, jQuery */
var app = app || {};

(function ($) {
    'use strict';

    app.RegisterView = Backbone.View.extend({
        //model: app.AppModel,

        el: '#register',

        /**
         * Initialize events.
         */
        events: {
            'submit form': 'register'
        },

        /**
         * Initialize the register view.
         */
        initialize: function () {
            this.template = _.template($('#template-register').html());
            this.render();
        },

        /**
         * Render the template
         */
        render: function() {
            this.$el.html(this.template());
        },

        /**
         * Register ticket
         *
         * @param event
         */
        register: function(event) {
            event.preventDefault();
            var self = this;
            this.hideError();
            this.hideMessage();

            var ticket = new app.Ticket({
                name: this.$el.find('#inputName').val(),
                email: this.$el.find('#inputEmail').val()
            });

            ticket.save(null, {
                success: function(model, response) {
                    if (response.Error) {
                        self.showError(response.Error);
                    } else {
                        self.message = new app.MessageView({message: 'Ticket registered! Code: ' + model.get('code')});
                        self.reset();
                    }
                },
                error: function(model, response) {
                    self.showError(response.Error);
                }
            });
        },

        /**
         *
         * @param error
         */
        showError: function(error) {
            this.error = new app.ErrorView({message: error.message});
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
         * Close the registration form.
         */
        close: function() {
            this.$el.hide();
        },

        /**
         * Reset the form.
         */
        reset: function() {
            this.$el.find('#inputName').val('');
            this.$el.find('#inputEmail').val('');
        }
    });
}(jQuery));
