/*global Backbone */
var app = app || {};

(function () {
    'use strict';

    app.Draw = Backbone.Model.extend({
        url: '/api/draw',

        /**
         * @param definition
         * @returns {void|*}
         */
        parse: function(definition) {
            return definition.Draw;
        }
    });
})();