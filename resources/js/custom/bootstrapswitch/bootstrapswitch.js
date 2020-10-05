'use strict';
// Class definition

var KTBootstrapSwitch = function() {

    // Private functions
    var demos = function() {
        // minimum setup
        $('[data-switch=true]').bootstrapSwitch();
    };
    
    return {
     // public functions
        init: function() {
            return demos();
        },
    };
};

window.KTBootstrapSwitch = new KTBootstrapSwitch()