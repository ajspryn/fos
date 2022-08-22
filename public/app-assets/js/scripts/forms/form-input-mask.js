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
        numeralMask11 = $(".numeral-mask11"),
        numeralMask12 = $(".numeral-mask12"),
        numeralMask13 = $(".numeral-mask13"),
        numeralMask14 = $(".numeral-mask14"),
        numeralMask15 = $(".numeral-mask15"),
        numeralMask16 = $(".numeral-mask16"),
        numeralMask17 = $(".numeral-mask17"),
        numeralMask18 = $(".numeral-mask18"),
        numeralMask19 = $(".numeral-mask19"),
        numeralMask20 = $(".numeral-mask20"),
        numeralMask21 = $(".numeral-mask21"),
        numeralMask22 = $(".numeral-mask22"),
        numeralMask23 = $(".numeral-mask23"),
        numeralMask24 = $(".numeral-mask24"),
        numeralMask25 = $(".numeral-mask25"),
        numeralMask26 = $(".numeral-mask26"),
        numeralMask27 = $(".numeral-mask27"),
        numeralMask28 = $(".numeral-mask28"),
        numeralMask29 = $(".numeral-mask29"),
        numeralMask30 = $(".numeral-mask30"),
        numeralMask31 = $(".numeral-mask31"),
        numeralMask32 = $(".numeral-mask32"),
        numeralMask33 = $(".numeral-mask33"),
        numeralMask34 = $(".numeral-mask34"),
        numeralMask35 = $(".numeral-mask35"),
        numeralMask36 = $(".numeral-mask36"),
        numeralMask37 = $(".numeral-mask37"),
        numeralMask38 = $(".numeral-mask38"),
        numeralMask39 = $(".numeral-mask39"),
        numeralMask40 = $(".numeral-mask40"),
        numeralMask41 = $(".numeral-mask41"),
        numeralMask42 = $(".numeral-mask42"),
        numeralMask43 = $(".numeral-mask43"),
        numeralMask44 = $(".numeral-mask44"),
        numeralMask45 = $(".numeral-mask45"),
        numeralMask46 = $(".numeral-mask46"),
        numeralMask47 = $(".numeral-mask47"),
        numeralMask48 = $(".numeral-mask48"),
        numeralMask49 = $(".numeral-mask49"),
        numeralMask50 = $(".numeral-mask50"),
        numeralMask51 = $(".numeral-mask51"),
        numeralMask52 = $(".numeral-mask52"),
        numeralMask53 = $(".numeral-mask53"),
        numeralMask54 = $(".numeral-mask54"),
        numeralMask55 = $(".numeral-mask55"),
        numeralMask56 = $(".numeral-mask56"),
        numeralMask57 = $(".numeral-mask57"),
        numeralMask58 = $(".numeral-mask58"),
        numeralMask59 = $(".numeral-mask59"),
        numeralMask60 = $(".numeral-mask60"),
        numeralMask61 = $(".numeral-mask61"),
        numeralMask62 = $(".numeral-mask62"),
        numeralMask63 = $(".numeral-mask63"),
        numeralMask64 = $(".numeral-mask64"),
        numeralMask65 = $(".numeral-mask65"),
        numeralMask66 = $(".numeral-mask66"),
        numeralMask67 = $(".numeral-mask67"),
        numeralMask68 = $(".numeral-mask68"),
        numeralMask69 = $(".numeral-mask69"),
        numeralMask70 = $(".numeral-mask70"),
        numeralMask71 = $(".numeral-mask71"),
        numeralMask72 = $(".numeral-mask72"),
        numeralMask73 = $(".numeral-mask73"),
        numeralMask74 = $(".numeral-mask74"),
        numeralMask75 = $(".numeral-mask75"),
        numeralMask76 = $(".numeral-mask76"),
        numeralMask77 = $(".numeral-mask77"),
        numeralMask78 = $(".numeral-mask78"),
        numeralMask79 = $(".numeral-mask79"),
        numeralMask80 = $(".numeral-mask80"),
        numeralMask81 = $(".numeral-mask81"),
        numeralMask82 = $(".numeral-mask82"),
        numeralMask83 = $(".numeral-mask83"),
        numeralMask84 = $(".numeral-mask84"),
        numeralMask85 = $(".numeral-mask85"),
        numeralMask86 = $(".numeral-mask86"),
        numeralMask87 = $(".numeral-mask87"),
        numeralMask88 = $(".numeral-mask88"),
        numeralMask89 = $(".numeral-mask89"),
        numeralMask90 = $(".numeral-mask90"),
        numeralMask91 = $(".numeral-mask91"),
        numeralMask92 = $(".numeral-mask92"),
        numeralMask93 = $(".numeral-mask93"),
        numeralMask94 = $(".numeral-mask94"),
        numeralMask95 = $(".numeral-mask95"),
        numeralMask96 = $(".numeral-mask96"),
        numeralMask97 = $(".numeral-mask97"),
        numeralMask98 = $(".numeral-mask98"),
        numeralMask99 = $(".numeral-mask99"),
        numeralMask100 = $(".numeral-mask100"),
        numeralMask101 = $(".numeral-mask101"),
        numeralMask102 = $(".numeral-mask102"),
        numeralMask103 = $(".numeral-mask103"),
        numeralMask104 = $(".numeral-mask104"),
        numeralMask105 = $(".numeral-mask105"),
        numeralMask106 = $(".numeral-mask106"),
        numeralMask107 = $(".numeral-mask107"),
        numeralMask108 = $(".numeral-mask108"),
        numeralMask109 = $(".numeral-mask109"),
        numeralMask110 = $(".numeral-mask110"),
        
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
        // prefixMask11 = $(".prefix-mask11"),
        // prefixMask12 = $(".prefix-mask12"),
        // prefixMask13 = $(".prefix-mask13"),
        // prefixMask14 = $(".prefix-mask14"),
        // prefixMask15 = $(".prefix-mask15"),
        // prefixMask16 = $(".prefix-mask16"),
        // prefixMask17 = $(".prefix-mask17"),
        // prefixMask18 = $(".prefix-mask18"),
        // prefixMask19 = $(".prefix-mask19"),
        // prefixMask20 = $(".prefix-mask20"),
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
    if (numeralMask.length) {
        new Cleave(numeralMask11, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask12, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask13, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask14, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask15, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask16, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask17, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask18, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask19, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask20, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask21, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask22, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask23, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask24, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask25, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask26, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask27, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask28, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask29, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask30, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask31, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask32, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask33, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask34, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask35, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask36, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask37, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask38, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask39, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask40, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask41, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask42, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask43, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask44, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask45, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask46, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask47, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask48, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask49, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask50, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask51, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask52, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask53, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask54, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask55, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask56, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask57, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask58, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask59, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask60, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask61, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask62, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask63, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask64, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask65, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask66, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask67, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask68, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask69, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask70, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask71, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask72, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask73, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask74, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask75, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask76, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask77, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask78, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask79, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask80, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask81, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask82, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask83, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask84, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask85, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask86, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask87, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask88, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask89, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask90, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask91, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask92, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask93, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask94, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask95, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask96, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask97, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask98, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask99, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask100, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask101, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask102, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask103, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask24, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask25, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask106, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask107, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask108, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask109, {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if (numeralMask.length) {
        new Cleave(numeralMask0, {
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
