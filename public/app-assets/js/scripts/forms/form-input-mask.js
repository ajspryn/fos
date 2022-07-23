/*=========================================================================================
        File Name: form-input-mask.js
        Description: Input Masks
        ----------------------------------------------------------------------------------------
        Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
        Author: Pixinvent
        Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    "use strict";

    var creditCard = $(".credit-card-mask"),
        phoneMask = $(".phone-number-mask"),
        dateMask = $(".date-mask"),
        timeMask = $(".time-mask"),
        numeralMask = $(".numeral-mask"),
        numeralMask1 = $(".numeral-mask1"),
        numeralMask2 = $(".numeral-mask2"),
        numeralMask3 = $(".numeral-mask3"),
        numeralMask4 = $(".numeral-mask4"),
        numeralMask5 = $(".numeral-mask5"),
        numeralMask6 = $(".numeral-mask6"),
        numeralMask7 = $(".numeral-mask7"),
        numeralMask8 = $(".numeral-mask8"),
        numeralMask9 = $(".numeral-mask9"),
        numeralMask10 = $(".numeral-mask10"),
        blockMask = $(".block-mask"),
        delimiterMask = $(".delimiter-mask"),
        customDelimiter = $(".custom-delimiter-mask"),
        prefixMask = $(".prefix-mask"),
        prefixMask1 = $(".prefix-mask1"),
        prefixMask2 = $(".prefix-mask2"),
        prefixMask3 = $(".prefix-mask3"),
        prefixMask4 = $(".prefix-mask4"),
        prefixMask5 = $(".prefix-mask5"),
        prefixMask6 = $(".prefix-mask6"),
        prefixMask7 = $(".prefix-mask7"),
        prefixMask8 = $(".prefix-mask8"),
        prefixMask9 = $(".prefix-mask9"),
        prefixMask10 = $(".prefix-mask10"),
        persen = $(".persen"),
        persen0 = $(".persen0");

    // Credit Card
    if (creditCard.length) {
        creditCard.each(function () {
            new Cleave($(this), {
                creditCard: true,
            });
        });
    }

    // Phone Number
    if (phoneMask.length) {
        new Cleave(phoneMask, {
            phone: true,
            phoneRegionCode: "ID",
        });
    }

    // Date
    if (dateMask.length) {
        new Cleave(dateMask, {
            date: true,
            delimiter: "-",
            datePattern: ["Y", "m", "d"],
        });
    }

    // Time
    if (timeMask.length) {
        new Cleave(timeMask, {
            time: true,
            timePattern: ["h", "m", "s"],
        });
    }

    //Numeral
    if (numeralMask.length) {
        new Cleave(numeralMask, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask1, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask2, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask3, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask4, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask5, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask6, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask7, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask8, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask9, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask10, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }

    //Block
    if (blockMask.length) {
        new Cleave(blockMask, {
            blocks: [4, 3, 3],
            uppercase: true,
        });
    }

    // Delimiter
    if (delimiterMask.length) {
        new Cleave(delimiterMask, {
            delimiter: "·",
            blocks: [3, 3, 3],
            uppercase: true,
        });
    }

    // Custom Delimiter
    if (customDelimiter.length) {
        new Cleave(customDelimiter, {
            delimiters: [".", ".", "-"],
            blocks: [3, 3, 3, 2],
            uppercase: true,
        });
    }

    // Prefix
    if (prefixMask.length) {
        new Cleave(prefixMask, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask1, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask2, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask3, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask4, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask5, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask6, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask7, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask8, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask9, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (prefixMask.length) {
        new Cleave(prefixMask10, {
            prefix: "+62",
            blocks: [3, 3, 4, 4],
            uppercase: true,
        });
    }
    if (persen.length) {
        new Cleave(persen, {
            // prefix: "+62",
            // delimiters: ["."],
            // blocks: [2, 2],
            // uppercase: true,
            numeral: true,
            numeralPercentageGroupStyle: "percentage",
        });
    }
    if (persen.length) {
        new Cleave(persen0, {
            // prefix: "+62",
            // delimiters: ["."],
            // blocks: [2, 2],
            // uppercase: true,
            numeral: true,
            numeralPercentageGroupStyle: "percentage",
        });
    }
});
