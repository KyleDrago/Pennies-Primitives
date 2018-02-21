'use strict';

/* global document */
/* global WPURL */

const dddGconst = {
  body: document.body,
  uploadDir: WPURL.templateUrl.baseurl + '/',
  patternSelected: 'Daisypatch',
};

const dddColor = {
  selectBox: document.getElementById('color-select-box'),
  previewImage: document.getElementById('color-preview-image'),
  selectBoxSetup: function () {
    dddColor.previewImage.src = dddGconst.uploadDir + dddColor.selectBox.value + '.jpg';
  },
  init: function () {
    dddColor.selectBox.addEventListener('input', dddColor.selectBoxSetup);
  },
};

const dddPattern = {
  selectBox: document.getElementById('pattern-select-box'),
  previewImage: document.getElementById('pattern-preview-image'),
  selectBoxSetup: function () {
    dddGconst.patternSelected = dddPattern.selectBox.value;
    dddPattern.previewImage.src = dddGconst.uploadDir + dddPattern.selectBox.value + '.jpg';
  },
  init: function () {
    dddPattern.selectBox.addEventListener('input', dddPattern.selectBoxSetup);
  },
};

const dddLightbox = {
  lightbox: document.getElementById('lightbox-background'),
  closeButton: document.getElementById('lightbox-button-close'),
  patternImages: document.getElementsByClassName('lightbox-pattern-img'),
  closeButtonSetup: function () {
    dddLightbox.lightbox.style.display = 'none';
    dddGconst.body.style.overflow = 'scroll';
  },
  patternSelectSetup: function () {
    const selection = this.dataset.value;
    dddPattern.selectBox.value = selection;
    dddGconst.patternSelected = selection;
    dddPattern.previewImage.src = dddGconst.uploadDir + selection + '.jpg';
    dddLightbox.lightbox.style.display = 'none';
    dddGconst.body.style.overflow = 'scroll';
  },
  openLightboxSetup: function () {
    dddGconst.body.style.overflow = 'hidden';
    dddLightbox.lightbox.style.display = 'block';
    document.getElementById(dddGconst.patternSelected).scrollIntoView({ block: 'center' });
  },
  init: function () {
    let i;
    dddLightbox.closeButton.addEventListener('click', dddLightbox.closeButtonSetup);
    for (i = 0; i < dddLightbox.patternImages.length; i += 1) {
      dddLightbox.patternImages[i].addEventListener('click', dddLightbox.patternSelectSetup);
    }
    dddPattern.previewImage.addEventListener('click', dddLightbox.openLightboxSetup);
  },
};

const dddSecurity = {
  input: document.getElementById('personalized-text'),
  warning: document.getElementById('input-warning'),
  prohibited: ['!', '=', '"', "'", '>', '<', '/', '_', '-', '+', '*', '&', '|', '`', '?'],
  validateField: function (ipVal) {
    const arrayString = ipVal.split('');
    arrayString.forEach((item) => {
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
