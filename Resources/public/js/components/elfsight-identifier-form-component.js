define(function (require) {
    'use strict';

    const BaseComponent = require('oroui/js/app/components/base/component');
    const mediator = require('oroui/js/mediator');

    const ElfsightIdentifierFormComponent = BaseComponent.extend({
        createSuccessMessage: null,
        editSuccessMessage: null,

        initialize: function (options) {
            this.createSuccessMessage = options.createSuccessMessage;
            this.editSuccessMessage = options.editSuccessMessage;

            this.$el = options._sourceElement;
            this.$input = this.$el.find('#' + options.inputId);
            this.$createButton = this.$el.find('#' + options.createButtonId);
            this.$hiddenCreateButton = this.$el.find('#' + options.hiddenCreateButtonId);
            this.$editButton = this.$el.find('#' + options.editButtonId);
            this.$resetButton = this.$el.find('#' + options.resetButtonId);

            this._refreshButtonState();
            this.$input.change(this._refreshButtonState.bind(this));
            this.$createButton.click(this._showWidgetCatalog.bind(this));
            this.$editButton.click(this._showWidgetEditPopup.bind(this));
            this.$resetButton.click(this._onReset.bind(this));

            // hidden button is added as a workaround for https://github.com/elfsight/embed-sdk/issues/39
            this.$hiddenCreateButton.hide();
            ElfsightEmbedSDK.displayCreateButton(this.$hiddenCreateButton[0], this._onCreate.bind(this), {appAlias: ''});
        },

        _refreshButtonState: function () {
            if (this.$input.val()) {
                this.$createButton.hide();
                this.$editButton.show();
                this.$resetButton.show();
            } else {
                this.$createButton.show();
                this.$editButton.hide();
                this.$resetButton.hide();
            }
        },

        _showWidgetCatalog: function () {
            this.$hiddenCreateButton.find('button').first().trigger('click');
        },

        _showWidgetEditPopup: function () {
            ElfsightEmbedSDK.editWidget(this.$input.val()).then(this._onEdit.bind(this));
        },

        _onCreate: function (response) {
            this.$input.val(response.id);
            this.$input.valid();
            this._refreshButtonState();

            mediator.execute('showFlashMessage', 'success', this.createSuccessMessage);
        },

        _onEdit: function () {
            mediator.execute('showFlashMessage', 'success', this.editSuccessMessage);
        },

        _onReset: function () {
            this.$input.val('');
            this._refreshButtonState();
        }
    });

    return ElfsightIdentifierFormComponent;
});
