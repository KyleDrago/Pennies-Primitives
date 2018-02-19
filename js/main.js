'use strict';

/* global document */
/* global WPURL */

var dddGVAR = {
  body: document.body,
  uploadDir: WPURL.templateUrl.baseurl + '/',
  patternSelected: null,
};

var dddColor = {
  selectBox: document.getElementById('color-select-box'),
  previewImage: document.getElementById('color-preview-image'),
  selectBoxSetup: function () {
    dddColor.previewImage.src = dddGVAR.uploadDir + dddColor.selectBox.value + '.jpg';
  },
  init: function () {
    dddColor.selectBox.addEventListener('input', dddColor.selectBoxSetup);
  },
};

var dddPattern = {
  selectBox: document.getElementById('pattern-select-box'),
  previewImage: document.getElementById('pattern-preview-image'),
  selectBoxSetup: function () {
    dddGVAR.patternSelected = dddPattern.selectBox.value;
    dddPattern.previewImage.src = dddGVAR.uploadDir + dddPattern.selectBox.value + '.jpg';
  },
  init: function () {
    dddPattern.selectBox.addEventListener('input', dddPattern.selectBoxSetup);
  },
};

var dddLightbox = {
  lightbox: document.getElementById('lightbox-background'),
  closeButton: document.getElementById('lightbox-button-close'),
  patternImages: document.getElementsByClassName('lightbox-pattern-img'),
  closeButtonSetup: function () {
    dddLightbox.lightbox.style.display = 'none';
    dddGVAR.body.style.overflow = 'scroll';
  },
  patternSelectSetup: function () {
    var selection = this.dataset.value;
    dddPattern.selectBox.value = selection;
    dddGVAR.patternSelected = selection;
    dddPattern.previewImage.src = dddGVAR.uploadDir + selection + '.jpg';
    dddLightbox.lightbox.style.display = 'none';
    dddGVAR.body.style.overflow = 'scroll';
  },
  openLightboxSetup: function () {
    dddGVAR.body.style.overflow = 'hidden';
    dddLightbox.lightbox.style.display = 'block';
    document.getElementById(dddGVAR.patternSelected).scrollIntoView({ block: 'center' });
  },
  init: function () {
    var i;
    dddLightbox.closeButton.addEventListener('click', dddLightbox.closeButtonSetup);
    for (i = 0; i < dddLightbox.patternImages.length; i += 1) {
      dddLightbox.patternImages[i].addEventListener('click', dddLightbox.patternSelectSetup);
    }
    dddPattern.previewImage.addEventListener('click', dddLightbox.openLightboxSetup);
  },
};

var dddSecurity = {
  input: document.getElementById('personalized-text'),
  warning: document.getElementById('input-warning'),
  prohibited: ['!', '=', '"', "'", '>', '<', '/', '_', '-', '+', '*', '&', '|', '`', '?'],
  validateField: function (ipVal) {
    var arrayString = ipVal.split('');
    /* eslint prefer-arrow-callback: "off" */
    arrayString.forEach(function (item) {
      if (dddSecurity.prohibited.includes(item)) {
        dddSecurity.input.value = dddSecurity.input.value.substring(0, dddSecurity.input.value.length - 1);
        dddSecurity.warning.style.opacity = 1;
        dddSecurity.warning.innerHTML = item + ' Not Allowed';
      }
    });
  },
  inputSetup: function () {
    dddSecurity.validateField(dddSecurity.input.value);
  },
  init: function () {
    dddSecurity.input.addEventListener('keyup', dddSecurity.inputSetup);
  },
};

dddColor.init();
dddPattern.init();
dddLightbox.init();
dddSecurity.init();
