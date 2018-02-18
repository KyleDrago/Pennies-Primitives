'use strict';

/* global document */
/* global WPURL */

var dddVars = {
  colorSelectBox: document.getElementById('color-select-box'),
  colorPreviewImage: document.getElementById('color-preview-image'),
  patternPreviewImage: document.getElementById('pattern-preview-image'),
  patternSelectBox: document.getElementById('pattern-select-box'),
  uploadDir: WPURL.templateUrl.baseurl + '/',
  lightbox: document.getElementById('lightbox-background'),
  lightboxButton: document.getElementById('lightbox-button-close'),
  lightboxPatternImages: document.getElementsByClassName('lightbox-pattern-img'),
  body: document.body,
};

var pattern = {
  selected: dddVars.patternSelectBox.value,
};

var dddFunc = {
  colorSelectSetup: function () {
    dddVars.colorPreviewImage.src = dddVars.uploadDir + dddVars.colorSelectBox.value + '.jpg';
  },
  patternSelectSetup: function () {
    dddVars.patternPreviewImage.src = dddVars.uploadDir + dddVars.patternSelectBox.value + '.jpg';
  },
  lightboxButtonSetup: function () {
    dddVars.lightbox.style.display = 'none';
    dddVars.body.style.overflow = 'scroll';
  },
  lightboxPatternSetup: function () {
    var selection = this.dataset.value;
    dddVars.patternSelectBox.value = selection;
    pattern.selected = selection;
    dddVars.patternPreviewImage.src = dddVars.uploadDir + selection + '.jpg';
    dddVars.lightbox.style.display = 'none';
    dddVars.body.style.overflow = 'scroll';
  },
  lightboxSetup: function () {
    dddVars.body.style.overflow = 'hidden';
    dddVars.lightbox.style.display = 'block';
    document.getElementById(pattern.selected).scrollIntoView({ block: 'center' });
  },
};

var dddEL = {
  colorAddEL: function () {
    dddVars.colorSelectBox.addEventListener('input', dddFunc.colorSelectSetup);
  },
  patternAddEL: function () {
    dddVars.patternSelectBox.addEventListener('input', dddFunc.patternSelectSetup);
  },
  lightboxButtonAddEL: function () {
    dddVars.lightboxButton.addEventListener('click', dddFunc.lightboxButtonSetup);
  },
  lightboxPatternsAddEL: function () {
    var i;
    for (i = 0; i < dddVars.lightboxPatternImages.length; i += 1) {
      dddVars.lightboxPatternImages[i].addEventListener('click', dddFunc.lightboxPatternSetup);
    }
  },
  lightboxAddEL: function () {
    dddVars.patternPreviewImage.addEventListener('click', dddFunc.lightboxSetup);
  },
};

dddEL.colorAddEL();
dddEL.patternAddEL();
dddEL.lightboxButtonAddEL();
dddEL.lightboxPatternsAddEL();
dddEL.lightboxAddEL();

// function denyBadChar() {
//   var personInput = document.getElementById('personalized-text');
//   var inputWarning = document.getElementById('input-warning');
//   var prohibited = "!@#$%^&*()+=;-_:`\|'?~./<>,";
//   personInput.addEventListener('keyup', function() {
//     var inputValue = personInput.value;
//
//     validateField(inputValue);
//   });
//   function validateField(ipVal){
//     var arrayString = ipVal.split("");
//
//     arrayString.forEach(function(item){
//       if(prohibited.indexOf(item) !== -1) {
//         inputWarning.style.opacity = '1';
//         inputWarning.innerHTML = item + ' Not Allowed';
//         personInput.value = "";
//       } else {
//         inputWarning.style.opacity = '0';
//       };
//     });
//   };
// }
//
// // denyBadChar();
// setupColorBox();
// setupPatternBox();
// setupLightboxPatterns();
// setupLightBox();
// }
// };
