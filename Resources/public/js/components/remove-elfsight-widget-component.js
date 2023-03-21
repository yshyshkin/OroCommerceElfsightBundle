define(function (require) {
    'use strict';

    const BaseComponent = require('oroui/js/app/components/base/component');
    const EntityModel = require('oroentity/js/app/models/entity-model');
    const mediator = require('oroui/js/mediator');

    const RemoveElfsightWidgetComponent = BaseComponent.extend({

        entityId : null,
        successMessage: null,

        /**
         * @inheritdoc
         */
        initialize: function (options) {
            this.entityId = options.entityId;
            this.successMessage = options.successMessage;

            ElfsightEmbedSDK.displayButton(options._sourceElement[0], this._onRemove.bind(this), options.buttonOptions);
        },

        _onRemove: function (response) {
            if (this.entityId) {
                const model = new EntityModel({data: {
                    type: 'orocommerceelfsightelfsightwidgets',
                    id: this.entityId
                }});
                model.on('destroy', function () {
                    mediator.execute('showFlashMessage', 'success', this.successMessage);
                    mediator.trigger('datagrid:doRefresh:ystools-elfsight-widget-grid');
                }.bind(this));
                model.destroy();

                return true;
            }
        }
    });

    return RemoveElfsightWidgetComponent;
});
