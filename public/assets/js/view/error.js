/*global $, Backbone, document, window, jQuery */
var app = app || {};

(function ($) {
    'use strict';

    app.ErrorView = Backbone.View.extend({
        el: '#error',

        /**
         * Initialize the register view.
         */
        initialize: function (definition) {
            this.template = _.template($('#template-error').html());
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
