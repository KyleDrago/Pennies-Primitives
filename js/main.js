'use strict';

// TODO MAKE JS LOAD PAGE SPECIFIC
window.onload = function() {

  var colors = document.getElementById('color-select-box');
  if (colors !== null) {
    var colorPreview = document.getElementById('color-preview-image');
    var patternPreview = document.getElementById('pattern-preview-image');
    var imageDir = WPURL.templateUrl.baseurl + '/';
    var patterns = document.getElementById('pattern-select-box');
    var lightbox = document.getElementById('lightbox-background');
    var body = document.body;
    var pattern = {
      patternSel : patterns.value
    };

    function setupColorBox() {
      colors.addEventListener('input', function() {
        var colorSelected = colors.value;
        if (colorSelected === 'None') {
          colorPreview.style.opacity = '0';
        } else {
          colorPreview.style.opacity = '1';
          colorPreview.src = imageDir + colorSelected + '.jpg';
        }
      });
    };

    function setupPatternBox() {
      patterns.addEventListener('input', function() {
        var patternSel = patterns.value;
        pattern.patternSel = patternSel;
        patternPreview.src = imageDir + patternSel + '.jpg';
      });
    };

    function setupLightBox() {
      var lightboxButton = document.getElementById('lightbox-button-close');
      lightboxButton.addEventListener('click', function() {
        lightbox.style.display = 'none';
        body.style.overflow = 'scroll';
      });
    };

    function setupLightboxPatterns() {
      var patLBImgs = document.getElementsByClassName('lightbox-pattern-img');
      var i;
      for (i = 0; i < patLBImgs.length; i++) {
        patLBImgs[i].addEventListener('click', function(event) {
          var curPat = event.target.dataset.value;
          patterns.value = curPat;
          pattern.patternSel = curPat;
          patternPreview.src = imageDir + curPat + '.jpg';
          lightbox.style.display = 'none';
          body.style.overflow = 'scroll';
        });
      }

      patternPreview.addEventListener('click', function() {
        body.style.overflow = 'hidden';
        lightbox.style.display = 'block';
        var currentPattern = document.getElementById(pattern.patternSel);
        currentPattern.scrollIntoView({block: "center"});
      });
    };

    function denyBadChar() {
      var personInput = document.getElementById('personalized-text');
      var inputWarning = document.getElementById('input-warning');
      var prohibited = "!@#$%^&*()+=;-_:`\|'?~./<>,";
      personInput.addEventListener('keyup', function() {
        var inputValue = personInput.value;

        validateField(inputValue);
      });
      function validateField(ipVal){
        var arrayString = ipVal.split("");

        arrayString.forEach(function(item){
          if(prohibited.indexOf(item) !== -1) {
            inputWarning.style.opacity = '1';
            inputWarning.innerHTML = item + ' Not Allowed';
            personInput.value = "";
          } else {
            inputWarning.style.opacity = '0';
          };
        });
      };
    }

    // denyBadChar();
    setupColorBox();
    setupPatternBox();
    setupLightboxPatterns();
    setupLightBox();
  }
};
