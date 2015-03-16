goog.provide('brix.ui.Navigation');

// goog:ui
goog.require('goog.ui.Component');

/**
 * @constructor
 * @extends {goog.ui.Component}
 */
brix.ui.Navigation = function()
{
    goog.base(this);
};

goog.inherits(
    brix.ui.Navigation,
    goog.ui.Component
);

/**
 * @inheritDoc
 */
brix.ui.Navigation.prototype.decorateInternal = function(el)
{
    goog.base(this, 'decorateInternal', el);
    console.log(el);
};