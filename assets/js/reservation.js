//auto generate date and time value
// function myChangeFunction(input1) {
//     var input2 = document.getElementById('DateForm');
//     input2.value = input1.value;
// }

// function myChangeFunction1(input3) {
//     var input4 = document.getElementById('TimeForm');
//     input4.value = input3.value;
// }


// //Form validation
// function GEEKFORGEEKS() {
//     var name = document.forms["RegForm"]["Name"];
//     var email = document.forms["RegForm"]["EMail"];
//     var phone = document.forms["RegForm"]["Telephone"];
//     var address = document.forms["RegForm"]["Address"];
//     if (name.value == "") {
//         window.alert("Please enter your name.");
//         name.focus();
//         return false;
//     }
//     if (address.value == "") {
//         window.alert("Please enter your address.");
//         name.focus();
//         return false;
//     }
//     if (email.value == "") {
//         window.alert("Please enter a valid e-mail address.");
//         email.focus();
//         return false;
//     }
//     if (email.value.indexOf("@", 0) < 0) {
//         window.alert("Please enter a valid e-mail address.");
//         email.focus();
//         return false;
//     }
//     if (email.value.indexOf(".", 0) < 0) {
//         window.alert("Please enter a valid e-mail address.");
//         email.focus();
//         return false;
//     }
//     if (phone.value == "") {
//         window.alert("Please enter your telephone number.");
//         phone.focus();
//         return false;
//     }



//     return true;
// }

//date and time picker
$(function() {
    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "2019:2020",
        minDate: '0',
        beforeShowDay: function(date) { return [date.getDay() == 5 || date.getDay() == 4 || date.getDay() == 3 || date.getDay() == 2 || date.getDay() == 1, ""] }

    });
});
$(document).ready(function() {
    $('#timepicker').timepicker({
        timeFormat: 'H:00',
        dropdown: true,
        scrollbar: true,
        minTime: '10:00',
        maxTime: '18:00',
    });
    // $('#numberImg').click(function() {
    //     var $this = $(this);
    //     if ($this.hasClass('active')) {
    //         $this.removeClass('active');
    //     } else {
    //         $('.active').removeClass('active');
    //         $this.addClass('active');
    //     }
    // });
});

//Incrementer and decrementer 
jQuery(document).ready(function() {
    // This button will increment the value
    $('.qtyplus').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 1 there
            $('input[name=' + fieldName + ']').val(1);
        }
    });
    // This button will decrement the value till 1
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 1 there
            $('input[name=' + fieldName + ']').val(1);
        }
    });
});


//to call show() function to display the plan image

$("#checkbutton").click(function() {

    $(document.getElementsByClassName('selectable')).attr('class', 'nonselectable')
    $(document.getElementsByClassName('click')).attr('class', 'nonselectable')
    var quantity = document.getElementById('quantity').value;

    if ($("#datepicker").val().length == 0 || $("#timepicker").val().length == 0 || quantity == 0)
    //{
    // if ($("#datepicker").val().length == 0) {
    //     window.alert("Please select date before checking seat availability.");
    // }
    // if ($("#timepicker").val().length == 0) {
    //     window.alert("Please select time before checking seat availability.");
    // }
    // if (quantity == 0) {
    //     window.alert("Please select number of seat before checking seat availability.");
    // }
    {
        window.alert("Veuillez remplir des champs avant de commancer.");
        document.getElementById('Plan').style.display = "none";
    } else {
        $(document.getElementsByClassName('selectable')).attr('class', 'nonselectable,st3').trigger('change');
        $(document.getElementsByClassName('click')).attr('class', 'nonselectable,st3').trigger('change');
        switch (true) {
            case (quantity === "1"):
                {
                    var items = document.querySelectorAll('#svg_45,#svg_43,#svg_41,#svg_39,#svg_47');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                    }
                }

                break;
            case (1 < quantity && quantity < 5):
                {
                    var items = document.querySelectorAll('#svg_2,#svg_19,#svg_21,#svg_49,#svg_6,#svg_17,#svg_23,#svg_11,#svg_15,#svg_13');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                    }
                }
                break;
            case (4 < quantity && quantity < 7):
                {
                    var items = document.querySelectorAll('#svg_37,#svg_35,#svg_33,#svg_25');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                    }
                }
                break;
            case (6 < quantity && quantity < 13):
                {
                    var items = document.querySelectorAll('#svg_27,#svg_29,#svg_31,#svg_25');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                    }
                }
                break;
        }
        document.getElementById('Plan').style.display = "block";
    }
});

// $("input[name=quantity]").change(function() {
//     $(document.getElementsByClassName('selectable')).attr('class', 'unselectable');

// });

//on chaging color to select it
function changecolor1() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_2')).attr('class', 'click');
        title = document.getElementById("svg_5").textContent;
        document.getElementById("selectionTitle").innerHTML = "You Have Selected Table " + title;
    }
}

function changecolor2() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_19')).attr('class', 'click');
    }
}

function changecolor3() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_21')).attr('class', 'click');
    }
}

function changecolor4() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_49')).attr('class', 'click');
    }
}

function changecolor5() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_6')).attr('class', 'click');
    }
}

function changecolor6() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_17')).attr('class', 'click');
    }
}

function changecolor7() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_23')).attr('class', 'click');
    }
}

function changecolor8() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_11')).attr('class', 'click');
    }
}

function changecolor9() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_15')).attr('class', 'click');
    }
}

function changecolor10() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_13')).attr('class', 'click');
    }
}

function changecolor11() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_25')).attr('class', 'click');
    }
}

function changecolor12() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_37')).attr('class', 'click');
    }
}

function changecolor13() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_35')).attr('class', 'click');
    }
}

function changecolor14() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_33')).attr('class', 'click');
    }
}

function changecolor15() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_27')).attr('class', 'click');
    }
}

function changecolor16() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_29')).attr('class', 'click');
    }
}

function changecolor17() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_31')).attr('class', 'click');
    }
}

function changecolor18() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_45')).attr('class', 'click');
    }
}

function changecolor19() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_43')).attr('class', 'click');
    }
}

function changecolor20() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_41')).attr('class', 'click');
    }
}

function changecolor21() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_39')).attr('class', 'click');
    }
}

function changecolor22() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_47')).attr('class', 'click');
    }
}


//double click on table number will take to the page redirect
// if ($(".click")) {
//     title = document.getElementsByClassName("st4 st5").textContent;
//     document.getElementById("selectionTitle").innerHTML = "You Have Selected Table " + title;
// }


// //Border change on clicking image
// $(document).ready(function() {
//     // wait until all images are loaded
//     $(window).on("load", function() {
//         $('img').click(function() {
//             if ($(this).hasClass("selected")) {
//                 $(this).removeClass('selected').addClass('unselected');
//             } else {
//                 $(this).removeClass('unselected').addClass('selected');
//             }
//         });
//     });
// });

// //Compare the class of selected and unselected of the image to upadte the database
// $(document).ready(function() {
//     (function updateAvalilability() {
//         if ($(this).hasClass("selected")) {
//             alert("LOL");
//         }
//     });
// });

// //get full url while click on image
// // document.addEventListener('DOMContentLoaded', function() {
// //     document.addEventListener('click', function(event) {
// //         if (event.target.tagName.toUpperCase() == 'IMG') {

// //             document.getElementById('ImgSrc').value = event.target.src;
// //             console.log(document.getElementById('ImgSrc').value);
// //         }
// //     });
// // });

// //trim url
// document.addEventListener('DOMContentLoaded', function() {
//     document.addEventListener('click', function(event) {
//         if (event.target.tagName.toUpperCase() == 'IMG') {
//             var trimPath = RemoveFirstDirectoryPartOf(event.target.src);
//             document.getElementById('ImgSrc').value = trimPath;
//             console.log(document.getElementById('ImgSrc').value);
//         }
//     });
// });

// function RemoveFirstDirectoryPartOf(srcPath) {
//     return srcPath.replace("http://aboweb.local:8080/gustocoffee/", '');
// }