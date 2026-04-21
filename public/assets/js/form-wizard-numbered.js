/**
 *  Form Wizard
 */

"use strict";

$(function () {
  const select2 = $(".select2"),
    selectPicker = $(".selectpicker");

  // Bootstrap select
  if (selectPicker.length) {
    selectPicker.selectpicker();
  }

  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: "Select value",
        dropdownParent: $this.parent(),
      });
    });
  }
});
(function () {
  const initWizardElement = function (wizard) {
    if (!wizard) {
      return;
    }
    if (typeof Stepper === "undefined") {
      return;
    }
    if (wizard.dataset.stepperInitialized === "true") {
      return;
    }
    wizard.dataset.stepperInitialized = "true";

    const btnNextList = [].slice.call(wizard.querySelectorAll(".btn-next"));
    const btnPrevList = [].slice.call(wizard.querySelectorAll(".btn-prev"));
    const btnSubmit = wizard.querySelector(".btn-submit");

    const stepper = new Stepper(wizard, {
      linear: false,
    });

    if (btnNextList && btnNextList.length) {
      btnNextList.forEach((btnNext) => {
        btnNext.addEventListener("click", (event) => {
          event.preventDefault();
          stepper.next();
        });
      });
    }

    if (btnPrevList && btnPrevList.length) {
      btnPrevList.forEach((btnPrev) => {
        btnPrev.addEventListener("click", (event) => {
          event.preventDefault();
          stepper.previous();
        });
      });
    }
  };

  const wizardSelectors = [
    ".wizard-numbered",
    ".wizard-vertical",
    ".wizard-modern-example",
    ".wizard-modern-vertical",
    ".modern-wizard-example",
    ".wizard-modern",
  ];

  wizardSelectors.forEach((selector) => {
    document.querySelectorAll(selector).forEach((wizard) => {
      initWizardElement(wizard);
    });
  });
})();
