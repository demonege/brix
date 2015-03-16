goog.provide('Brix');
goog.provide('Brix.Application');

// goog:dom
goog.require('goog.dom');

// brix:ui
goog.require('brix.ui.Navigation');

/**
 * @constructor
 */
Brix.Application = function(){};
goog.addSingletonGetter(Brix.Application);

Brix.Application.prototype.init = function()
{
    // DO NOT LIKE THIS NIGGA (goog.ui.registry)
    // var navigation = new brix.ui.Navigation;
    // navigation.decorate(goog.dom.getElementByClass('navi'));
};

Brix.bootstrap = function()
{
    Brix.Application.getInstance().init();
};

goog.exportSymbol(
  'Brix.bootstrap',
    Brix.bootstrap
);