define(function (require) {
    'use strict';

    const BaseComponent = require('oroui/js/app/components/base/component');
    const EntityModel = require('oroentity/js/app/models/entity-model');

    const CreateElfsightWidgetComponent = BaseComponent.extend({
        /**
         * @inheritdoc
         */
        initialize: function (options) {
            ElfsightEmbedSDK.displayButton(options._sourceElement[0], this._onCreate, options.buttonOptions);
        },

        _onCreate: function (response) {
            // model = new EntityModel({data: {type: 'task', id: '12'}});

            console.log(response);
            // TODO: remove log and add button callback logic
        }
    });

    return CreateElfsightWidgetComponent;
});
