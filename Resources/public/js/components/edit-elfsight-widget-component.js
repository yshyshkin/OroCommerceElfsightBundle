define(function (require) {
    'use strict';

    const BaseComponent = require('oroui/js/app/components/base/component');
    const mediator = require('oroui/js/mediator');

    const EditElfsightWidgetComponent = BaseComponent.extend({
        successMessage: null,

        /**
         * @inheritdoc
         */
        initialize: function (options) {
            this.successMessage = options.successMessage;
            ElfsightEmbedSDK.displayButton(options._sourceElement[0], this._onEdit.bind(this), options.buttonOptions);
        },

        _onEdit: function () {
            mediator.execute('showFlashMessage', 'success', this.successMessage);
        }
    });

    return EditElfsightWidgetComponent;
});
