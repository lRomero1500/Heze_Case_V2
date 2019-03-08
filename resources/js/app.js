
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
require('jquery-validation');
require('jquery-confirm');
require('jquery-ui');
require('inputmask/dist/min/jquery.inputmask.bundle.min');
require('@chenfengyuan/datepicker');
require('jquery-cropper');

/*
 *  jquery-easy-loading - v1.3.0
 *  Easily add and manipulate loading states of any element on the page
 *  http://github.com/CarlosBonetti/jquery-loading
 *
 *  Made by Carlos Bonetti <carlosb_bc@hotmail.com>
 *  Under MIT License
 */
(function( factory ) {
    if ( typeof define === "function" && define.amd ) {
        define( ["jquery"], factory );
    } else if (typeof module === "object" && module.exports) {
        module.exports = factory( require( "jquery" ) );
    } else {
        factory( jQuery );
    }
})(function($, window, undefined) {

    var Loading = function(element, options) {
        this.element = element;
        this.settings = $.extend({}, Loading.defaults, options);
        this.settings.fullPage = this.element.is('body');

        this.init();

        if (this.settings.start) {
            this.start();
        }
    };

    Loading.defaults = {

        /**
         * jQuery element to be used as overlay
         * If not defined, a default overlay will be created
         */
        overlay: undefined,

        /**
         * z-index to be used by the default overlay
         * If not defined, a z-index will be calculated based on the
         * target's z-index
         * Has no effect if a custom overlay is defined
         */
        zIndex: undefined,

        /**
         * Message to be rendered on the overlay content
         * Has no effect if a custom overlay is defined
         */
        message: 'Loading...',

        /**
         * Theme to be applied on the loading element
         *
         * Some default themes are implemented on `jquery.loading.css`, but you can
         *  define your own. Just add a `.loading-theme-my_awesome_theme` selector
         *  somewhere with your custom styles and change this option
         *  to 'my_awesome_theme'. The class is applied to the parent overlay div
         *
         * Has no effect if a custom overlay is defined
         */
        theme: 'light',

        /**
         * Class(es) to be applied to the overlay element when the loading state is started
         */
        shownClass: 'loading-shown',

        /**
         * Class(es) to be applied to the overlay element when the loading state is stopped
         */
        hiddenClass: 'loading-hidden',

        /**
         * Set to true to stop the loading state if the overlay is clicked
         * This options does NOT override the onClick event
         */
        stoppable: false,

        /**
         * Set to false to not start the loading state when initialized
         */
        start: true,

        /**
         * Function to be executed when the loading state is started
         * Receives the loading object as parameter
         *
         * The function is attached to the `loading.start` event
         */
        onStart: function(loading) {
            loading.overlay.fadeIn(150);
        },

        /**
         * Function to be executed when the loading state is stopped
         * Receives the loading object as parameter
         *
         * The function is attached to the `loading.stop` event
         */
        onStop: function(loading) {
            loading.overlay.fadeOut(150);
        },

        /**
         * Function to be executed when the overlay is clicked
         * Receives the loading object as parameter
         *
         * The function is attached to the `loading.click` event
         */
        onClick: function() {}
    };

    /**
     * Extend the Loading plugin default settings with the user options
     * Use it as `$.Loading.setDefaults({ ... })`
     *
     * @param {Object} options Custom options to override the plugin defaults
     */
    Loading.setDefaults = function(options) {
        Loading.defaults = $.extend({}, Loading.defaults, options);
    };

    $.extend(Loading.prototype, {

        /**
         * Initializes the overlay and attach handlers to the appropriate events
         */
        init: function() {
            this.isActive = false;
            this.overlay = this.settings.overlay || this.createOverlay();
            this.resize();
            this.attachMethodsToExternalEvents();
            this.attachOptionsHandlers();
        },

        /**
         * Return a new default overlay
         *
         * @return {jQuery} A new overlay already appended to the page's body
         */
        createOverlay: function() {
            var overlay = $('<div class="loading-overlay loading-theme-' + this.settings.theme + '"><div class="loading-overlay-content">' + this.settings.message + '</div></div>')
                .addClass(this.settings.hiddenClass)
                .hide()
                .appendTo('body');

            var elementID = this.element.attr('id');
            if (elementID) {
                overlay.attr('id', elementID + '_loading-overlay');
            }

            return overlay;
        },

        /**
         * Attach some internal methods to external events
         * e.g. overlay click, window resize etc
         */
        attachMethodsToExternalEvents: function() {
            var self = this;

            // Add `shownClass` and remove `hiddenClass` from overlay when loading state
            // is activated
            self.element.on('loading.start', function() {
                self.overlay
                    .removeClass(self.settings.hiddenClass)
                    .addClass(self.settings.shownClass);
            });

            // Add `hiddenClass` and remove `shownClass` from overlay when loading state
            // is stopped
            self.element.on('loading.stop', function() {
                self.overlay
                    .removeClass(self.settings.shownClass)
                    .addClass(self.settings.hiddenClass);
            });

            // Attach the 'stop loading on click' behaviour if the `stoppable` option is set
            if (self.settings.stoppable) {
                self.overlay.on('click', function() {
                    self.stop();
                });
            }

            // Trigger the `loading.click` event if the overlay is clicked
            self.overlay.on('click', function() {
                self.element.trigger('loading.click', self);
            });

            // Bind the `resize` method to `window.resize`
            $(window).on('resize', function() {
                self.resize();
            });

            // Bind the `resize` method to `document.ready` to guarantee right
            // positioning and dimensions after the page is loaded
            $(function() {
                self.resize();
            });
        },

        /**
         * Attach the handlers defined on `options` for the respective events
         */
        attachOptionsHandlers: function() {
            var self = this;

            self.element.on('loading.start', function(event, loading) {
                self.settings.onStart(loading);
            });

            self.element.on('loading.stop', function(event, loading) {
                self.settings.onStop(loading);
            });

            self.element.on('loading.click', function(event, loading) {
                self.settings.onClick(loading);
            });
        },

        /**
         * Calculate the z-index for the default overlay element
         * Return the z-index passed as setting to the plugin or calculate it
         * based on the target's z-index
         */
        calcZIndex: function() {
            if (this.settings.zIndex !== undefined) {
                return this.settings.zIndex;
            } else {
                return (parseInt(this.element.css('z-index')) || 0) + 1 + this.settings.fullPage;
            }
        },

        /**
         * Reposition the overlay on the top of the target element
         * This method needs to be called if the target element changes position
         *  or dimension
         */
        resize: function() {
            var self = this;

            var element = self.element,
                totalWidth = element.outerWidth(),
                totalHeight = element.outerHeight();

            if (this.settings.fullPage) {
                totalHeight = '100%';
                totalWidth = '100%';
            }

            this.overlay.css({
                position: self.settings.fullPage ? 'fixed' : 'absolute',
                zIndex: self.calcZIndex(),
                top: element.offset().top,
                left: element.offset().left,
                width: totalWidth,
                height: totalHeight
            });
        },

        /**
         * Trigger the `loading.start` event and turn on the loading state
         */
        start: function() {
            this.isActive = true;
            this.resize();
            this.element.trigger('loading.start', this);
        },

        /**
         * Trigger the `loading.stop` event and turn off the loading state
         */
        stop: function() {
            this.isActive = false;
            this.element.trigger('loading.stop', this);
        },

        /**
         * Check whether the loading state is active or not
         *
         * @return {Boolean}
         */
        active: function() {
            return this.isActive;
        },

        /**
         * Toggle the state of the loading overlay
         */
        toggle: function() {
            if (this.active()) {
                this.stop();
            } else {
                this.start();
            }
        },

        /**
         * Destroy plugin instance.
         */
        destroy: function() {
            this.overlay.remove();
        }

    });

    /**
     * Name of the data attribute where the plugin object will be stored
     */
    var dataAttr = 'jquery-loading';

    /**
     * Initializes the plugin and return a chainable jQuery object
     *
     * @param {Object} [options] Initialization options. Extends `Loading.defaults`
     * @return {jQuery}
     */
    $.fn.loading = function (options) {
        return this.each(function() {
            // (Try to) retrieve an existing plugin object associated with element
            var loading = $.data(this, dataAttr);

            if (!loading) {
                // First call. Initialize and save plugin object
                if (options === undefined || typeof options === 'object' ||
                    options === 'start' || options === 'toggle') {
                    // Initialize it just if argument is undefined, a config object
                    // or a direct call to 'start' or 'toggle' methods
                    $.data(this, dataAttr, new Loading($(this), options));
                }
            } else {
                // Already initialized
                if (options === undefined) {
                    // $(...).loading() call. Call the 'start' by default
                    loading.start();
                } else if (typeof options === 'string') {
                    // $(...).loading('method') call. Execute 'method'
                    loading[options].apply(loading);
                } else {
                    // $(...).loading({...}) call. New configurations. Reinitialize
                    // plugin object with new config options and start the plugin
                    // Also, destroy the old overlay instance
                    loading.destroy();
                    $.data(this, dataAttr, new Loading($(this), options));
                }
            }
        });
    };

    /**
     * Return the loading object associated to the element or initialize it
     * This method is interesting if you need the plugin object to access the
     * internal API
     * Example: `$('#some-element').Loading().toggle()`
     *
     * @param {Object} [options] Initialization options. If new options are given
     * to a previously initialized object, the old ones are overriden and the
     * plugin restarted
     * @return {Loading}
     */
    $.fn.Loading = function(options) {
        var loading = $(this).data(dataAttr);

        if (!loading || options !== undefined) {
            $(this).data(dataAttr, (loading = new Loading($(this), options)));
        }

        return loading;
    };

    /**
     * Create the `:loading` jQuery selector
     * Return all the jQuery elements with the loading state active
     *
     * Using the `:not(:loading)` will return all jQuery elements that are not
     *  loading, even the ones with the plugin not attached.
     *
     * Examples of usage:
     *  `$(':loading')` to get all the elements with the loading state active
     *  `$('#my-element').is(':loading')` to check if the element is loading
     */
    $.expr[':'].loading = function(element) {
        var loadingObj = $.data(element, dataAttr);

        if (!loadingObj) {
            return false;
        }

        return loadingObj.active();
    };

    $.Loading = Loading;

});
/*
 *  jquery-maskmoney - v3.1.1
 *  jQuery plugin to mask data entry in the input text in the form of money (currency)
 *  https://github.com/plentz/jquery-maskmoney
 *
 *  Made by Diego Plentz
 *  Under MIT License
 */

!function($){"use strict";function e(e,t){var n="";return e.indexOf("-")>-1&&(e=e.replace("-",""),n="-"),e.indexOf(t.prefix)>-1&&(e=e.replace(t.prefix,"")),e.indexOf(t.suffix)>-1&&(e=e.replace(t.suffix,"")),n+t.prefix+e+t.suffix}function t(e,t){return t.allowEmpty&&""===e?"":t.reverse?a(e,t):n(e,t)}function n(t,n){var a,i,o,l=t.indexOf("-")>-1&&n.allowNegative?"-":"",s=t.replace(/[^0-9]/g,"");return a=r(s.slice(0,s.length-n.precision),l,n),n.precision>0&&(i=s.slice(s.length-n.precision),o=new Array(n.precision+1-i.length).join(0),a+=n.decimal+o+i),e(a,n)}function a(t,n){var a,i=t.indexOf("-")>-1&&n.allowNegative?"-":"",o=t.replace(n.prefix,"").replace(n.suffix,""),l=o.split(n.decimal)[0],s="";if(""===l&&(l="0"),a=r(l,i,n),n.precision>0){var c=o.split(n.decimal);c.length>1&&(s=c[1]),a+=n.decimal+s;var u=Number.parseFloat(l+"."+s).toFixed(n.precision).toString().split(n.decimal)[1];a=a.split(n.decimal)[0]+"."+u}return e(a,n)}function r(e,t,n){return e=e.replace(/^0*/g,""),""===(e=e.replace(/\B(?=(\d{3})+(?!\d))/g,n.thousands))&&(e="0"),t+e}$.browser||($.browser={},$.browser.mozilla=/mozilla/.test(navigator.userAgent.toLowerCase())&&!/webkit/.test(navigator.userAgent.toLowerCase()),$.browser.webkit=/webkit/.test(navigator.userAgent.toLowerCase()),$.browser.opera=/opera/.test(navigator.userAgent.toLowerCase()),$.browser.msie=/msie/.test(navigator.userAgent.toLowerCase()),$.browser.device=/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));var i={prefix:"",suffix:"",affixesStay:!0,thousands:",",decimal:".",precision:2,allowZero:!1,allowNegative:!1,doubleClickSelection:!0,allowEmpty:!1,bringCaretAtEndOnFocus:!0},o={destroy:function(){return $(this).unbind(".maskMoney"),$.browser.msie&&(this.onpaste=null),this},applyMask:function(e){return t(e,$(this).data("settings"))},mask:function(e){return this.each(function(){var t=$(this);return"number"==typeof e&&t.val(e),t.trigger("mask")})},unmasked:function(){return this.map(function(){var e,t=$(this).val()||"0",n=-1!==t.indexOf("-");return $(t.split(/\D/).reverse()).each(function(t,n){if(n)return e=n,!1}),t=t.replace(/\D/g,""),t=t.replace(new RegExp(e+"$"),"."+e),n&&(t="-"+t),parseFloat(t)})},unmaskedWithOptions:function(){return this.map(function(){var e=$(this).val()||"0",t=$(this).data("settings")||i,n=new RegExp(t.thousandsForUnmasked||t.thousands,"g");return e=e.replace(n,""),parseFloat(e)})},init:function(n){return n=$.extend($.extend({},i),n),this.each(function(){function a(){var e,t,n,a,r,i=x.get(0),o=0,l=0;return"number"==typeof i.selectionStart&&"number"==typeof i.selectionEnd?(o=i.selectionStart,l=i.selectionEnd):(t=document.selection.createRange())&&t.parentElement()===i&&(a=i.value.length,e=i.value.replace(/\r\n/g,"\n"),(n=i.createTextRange()).moveToBookmark(t.getBookmark()),(r=i.createTextRange()).collapse(!1),n.compareEndPoints("StartToEnd",r)>-1?o=l=a:(o=-n.moveStart("character",-a),o+=e.slice(0,o).split("\n").length-1,n.compareEndPoints("EndToEnd",r)>-1?l=a:(l=-n.moveEnd("character",-a),l+=e.slice(0,l).split("\n").length-1))),{start:o,end:l}}function r(){var e=!(x.val().length>=x.attr("maxlength")&&x.attr("maxlength")>=0),t=a(),n=t.start,r=t.end,i=!(t.start===t.end||!x.val().substring(n,r).match(/\d/)),o="0"===x.val().substring(0,1);return e||i||o}function i(e){w.formatOnBlur||x.each(function(t,n){if(n.setSelectionRange)n.focus(),n.setSelectionRange(e,e);else if(n.createTextRange){var a=n.createTextRange();a.collapse(!0),a.moveEnd("character",e),a.moveStart("character",e),a.select()}})}function o(e){var n,a=x.val().length;x.val(t(x.val(),w)),n=x.val().length,w.reverse||(e-=a-n),i(e)}function l(){var e=x.val();if(!w.allowEmpty||""!==e){var n=e.indexOf(w.decimal);if(w.precision>0)if(n<0)e+=w.decimal+new Array(w.precision+1).join(0);else{var a=e.slice(0,n),r=e.slice(n+1);e=a+w.decimal+r+new Array(w.precision+1-r.length).join(0)}else n>0&&(e=e.slice(0,n));x.val(t(e,w))}}function s(){var e=x.val();return w.allowNegative?""!==e&&"-"===e.charAt(0)?e.replace("-",""):"-"+e:e}function c(e){e.preventDefault?e.preventDefault():e.returnValue=!1}function u(e){var t=(e=e||window.event).which||e.charCode||e.keyCode,n=w.decimal.charCodeAt(0);return void 0!==t&&(!(t<48||t>57)||t===n&&w.reverse?!!r()&&((t!==n||!d())&&(!!w.formatOnBlur||(c(e),p(e),!1))):g(t,e))}function d(){return!v()&&f()}function v(){var e=x.val().length,t=a();return 0===t.start&&t.end===e}function f(){return x.val().indexOf(w.decimal)>-1}function p(e){var t,n,r,i,l=(e=e||window.event).which||e.charCode||e.keyCode,s="";l>=48&&l<=57&&(s=String.fromCharCode(l)),n=(t=a()).start,r=t.end,i=x.val(),x.val(i.substring(0,n)+s+i.substring(r,i.length)),o(n+1)}function g(e,t){return 45===e?(x.val(s()),!1):43===e?(x.val(x.val().replace("-","")),!1):13===e||9===e||(!(!$.browser.mozilla||37!==e&&39!==e||0!==t.charCode)||(c(t),!0))}function m(){setTimeout(function(){l()},0)}function h(){return(parseFloat("0")/Math.pow(10,w.precision)).toFixed(w.precision).replace(new RegExp("\\.","g"),w.decimal)}var w,b,x=$(this);w=$.extend({},n),w=$.extend(w,x.data()),x.data("settings",w),$.browser.device&&x.attr("type","tel"),x.unbind(".maskMoney"),x.bind("keypress.maskMoney",u),x.bind("keydown.maskMoney",function(e){var t,n,r,i,l,s=(e=e||window.event).which||e.charCode||e.keyCode;return void 0!==s&&(t=a(),n=t.start,r=t.end,8!==s&&46!==s&&63272!==s||(c(e),i=x.val(),n===r&&(8===s?""===w.suffix?n-=1:(l=i.split("").reverse().join("").search(/\d/),r=1+(n=i.length-l-1)):r+=1),x.val(i.substring(0,n)+i.substring(r,i.length)),o(n),!1))}),x.bind("blur.maskMoney",function(t){if($.browser.msie&&u(t),w.formatOnBlur&&x.val()!==b&&p(t),""===x.val()&&w.allowEmpty)x.val("");else if(""===x.val()||x.val()===e(h(),w))w.allowZero?w.affixesStay?x.val(e(h(),w)):x.val(h()):x.val("");else if(!w.affixesStay){var n=x.val().replace(w.prefix,"").replace(w.suffix,"");x.val(n)}x.val()!==b&&x.change()}),x.bind("focus.maskMoney",function(){b=x.val(),l();var e,t=x.get(0);w.selectAllOnFocus?t.select():t.createTextRange&&w.bringCaretAtEndOnFocus&&((e=t.createTextRange()).collapse(!1),e.select())}),x.bind("click.maskMoney",function(){var e,t=x.get(0);w.selectAllOnFocus||(t.setSelectionRange&&w.bringCaretAtEndOnFocus?(e=x.val().length,t.setSelectionRange(e,e)):x.val(x.val()))}),x.bind("dblclick.maskMoney",function(){var e,t,n=x.get(0);n.setSelectionRange&&w.bringCaretAtEndOnFocus?(t=x.val().length,e=w.doubleClickSelection?0:t,n.setSelectionRange(e,t)):x.val(x.val())}),x.bind("cut.maskMoney",m),x.bind("paste.maskMoney",m),x.bind("mask.maskMoney",l)})}};$.fn.maskMoney=function(e){return o[e]?o[e].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof e&&e?void $.error("Method "+e+" does not exist on jQuery.maskMoney"):o.init.apply(this,arguments)}}(window.jQuery||window.Zepto);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});