define(function (require) {
    'use strict';

    const BaseComponent = require('oroui/js/app/components/base/component');
    const mediator = require('oroui/js/mediator');

    const EditElfsightWidgetComponent = BaseComponent.extend({
        identifier: null,
        successMessage: null,

        initialize: function (options) {
            this.identifier = options.identifier;
            this.successMessage = options.successMessage;
            options._sourceElement.click(this._onClick.bind(this));
        },

        _onClick: function () {
            ElfsightEmbedSDK.editWidget(this.identifier).then(this._onEdit.bind(this));
        },

        _onEdit: function () {
            mediator.execute('showFlashMessage', 'success', this.successMessage);
        }
    });

    return EditElfsightWidgetComponent;
});
