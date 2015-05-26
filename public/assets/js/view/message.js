/*global $, Backbone, document, window, jQuery */
var app = app || {};

(function ($) {
    'use strict';

    app.MessageView = Backbone.View.extend({
        el: '#message',

        /**
         * Initialize the register view.
         */
        initialize: function (definition) {
            this.template = _.template($('#template-message').html());
            this.render(definition.message);
        },

        /**
         * Render the template
         */
        render: function(message) {
            this.$el.show();
            this.$el.html(this.template({message: message}));
        }
    });
}(jQuery));
