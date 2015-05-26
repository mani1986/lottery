/*global Backbone */
var app = app || {};

(function () {
    'use strict';

    app.Ticket = Backbone.Model.extend({
        url: '/api/ticket',

        /**
         * @param definition
         * @returns {void|*}
         */
        parse: function(definition) {
            return definition.Ticket;
        }
    });
})();