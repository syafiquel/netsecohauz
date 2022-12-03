/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/bootstrap-modal.js ***!
  \*****************************************/


$("#modal-1").fireModal({
  body: 'Modal body text goes here.'
});
$("#modal-2").fireModal({
  body: 'Modal body text goes here.',
  center: true
});
var modal_3_body = '<p>Object to create a button on the modal.</p><pre class="language-javascript"><code>';
modal_3_body += '[\n';
modal_3_body += ' {\n';
modal_3_body += "   text: 'Login',\n";
modal_3_body += "   submit: true,\n";
modal_3_body += "   class: 'btn btn-primary btn-shadow',\n";
modal_3_body += "   handler: function(modal) {\n";
modal_3_body += "     alert('Hello, you clicked me!');\n";
modal_3_body += "   }\n";
modal_3_body += ' }\n';
modal_3_body += ']';
modal_3_body += '</code></pre>';
$("#modal-3").fireModal({
  title: 'Modal with Buttons',
  body: modal_3_body,
  buttons: [{
    text: 'Click, me!',
    "class": 'btn btn-primary btn-shadow',
    handler: function handler(modal) {
      alert('Hello, you clicked me!');
    }
  }]
});
$("#modal-4").fireModal({
  footerClass: 'bg-whitesmoke',
  body: 'Add the <code>bg-whitesmoke</code> class to the <code>footerClass</code> option.',
  buttons: [{
    text: 'No Action!',
    "class": 'btn btn-primary btn-shadow',
    handler: function handler(modal) {}
  }]
});
$("#add-admin").fireModal({
  title: 'Add Admin',
  body: $("#modal-add-admin-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function shown(modal, form) {},
  buttons: [{
    text: 'Submit',
    submit: false,
    id: 'add-admin-btn',
    "class": 'btn btn-primary btn-shadow',
    handler: function handler(modal) {}
  }]
});
$("#add-staff").fireModal({
  title: 'Add Staff',
  body: $("#modal-add-staff-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function shown(modal, form) {},
  buttons: [{
    text: 'Submit',
    submit: false,
    id: 'add-staff-btn',
    "class": 'btn btn-primary btn-shadow',
    handler: function handler(modal) {}
  }]
});
$("#add-brand-owner").fireModal({
  title: 'Add Brand Owner',
  body: $("#modal-add-brand-owner-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function shown(modal, form) {},
  buttons: [{
    text: 'Submit',
    submit: false,
    id: 'add-brand-owner-btn',
    "class": 'btn btn-primary btn-shadow',
    handler: function handler(modal) {}
  }]
});
$("#modal-6").fireModal({
  body: '<p>Now you can see something on the left side of the footer.</p>',
  created: function created(modal) {
    modal.find('.modal-footer').prepend('<div class="mr-auto"><a href="#">I\'m a hyperlink!</a></div>');
  },
  buttons: [{
    text: 'No Action',
    submit: true,
    "class": 'btn btn-primary btn-shadow',
    handler: function handler(modal) {}
  }]
});
$('.oh-my-modal').fireModal({
  title: 'My Modal',
  body: 'This is cool plugin!'
});
/******/ })()
;