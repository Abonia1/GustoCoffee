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
        minDate: '1',
        beforeShowDay: function(date) { return [date.getDay() == 5 || date.getDay() == 4 || date.getDay() == 3 || date.getDay() == 2 || date.getDay() == 1, ""] }

    });
});
$(document).ready(function() {
    $('#timepicker').timepicker({
        timeFormat: 'HH:00',
        'scrollDefault': 'now',
        //dropdown: true,
        scrollbar: true,
        minTime: '07:00',
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

jQuery(document).ready(function() {
    $("#durationpicker").focusin(function() {
        var $el = $("#durationpicker");
        var timeheader = document.getElementById('timepicker').value;
        var t1 = timeheader.split(':');
        var durationheader = 19 - t1[0];
        $el.empty();
        var i = 0;
        while (i < durationheader) {
            i = i + 1;
            $el.append($("<option></option>").attr("value", i).text(i + "h"));
        }
    });
});

function changeheure() {
    $('#durationpicker').timepicker('destroy');
    var $el = $("#durationpicker");
    $el.empty();
}

$('#datepicker,#timepicker,#durationpicker').bind('input', function() {
    document.getElementById('Plan').style.display = "none";
    // get the current value of the input field.
});


//Incrementer and decrementer 
jQuery(document).ready(function() {
    // This button will increment the value
    $('.qtyplus').click(function(e) {
        document.getElementById('Plan').style.display = "none";
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            if (currentVal < 13) {
                // Increment
                $('input[name=' + fieldName + ']').val(currentVal + 1);
            }
        } else {
            // Otherwise put a 1 there
            $('input[name=' + fieldName + ']').val(1);
        }
    });
    // This button will decrement the value till 1
    $(".qtyminus").click(function(e) {
        document.getElementById('Plan').style.display = "none";
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

    $(document.getElementsByClassName('selectable')).attr('class', 'nonselectable');
    $(document.getElementsByClassName('click')).attr('class', 'nonselectable');

    //document.getElementById('selectionTitle').style.display = "none";
    var quantity = document.getElementById('quantity').value;
    document.getElementById('personheader').innerHTML = quantity;
    var dateheader = document.getElementById('datepicker').value;
    document.getElementById('dateheader').innerHTML = dateheader;
    var timeheader = document.getElementById('timepicker').value;
    document.getElementById('timeheader').innerHTML = timeheader;
    var dureeheader = document.getElementById('durationpicker').value;
    document.getElementById('dureeheader').innerHTML = dureeheader;

    if ($("#datepicker").val().length == 0 || $("#timepicker").val().length == 0 || $("#durationpicker").val().length == 0 || quantity == 0)
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
        window.alert("Veuillez remplir des champs avant de commencer.");
        document.getElementById('Plan').style.display = "none";
    } else {
        $(document.getElementById("selectionTitle")).css("display", "none");
        $(document.getElementsByClassName('selectable')).attr('class', 'nonselectable,st3').trigger('change');
        $(document.getElementsByClassName('click')).attr('class', 'nonselectable,st3').trigger('change');
        switch (true) {
            case (quantity === "1"):
                {
                    var items = document.querySelectorAll('#svg_45,#svg_43,#svg_41,#svg_39,#svg_47');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                        document.getElementById('Plan').style.display = "block";
                    }
                }

                break;
            case (1 < quantity && quantity < 5):
                {
                    var items = document.querySelectorAll('#svg_2,#svg_19,#svg_21,#svg_49,#svg_6,#svg_17,#svg_23,#svg_11,#svg_15,#svg_13');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                        document.getElementById('Plan').style.display = "block";
                    }
                }
                break;
            case (4 < quantity && quantity < 7):
                {
                    var items = document.querySelectorAll('#svg_37,#svg_35,#svg_33,#svg_27,#svg_29,#svg_31');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                        document.getElementById('Plan').style.display = "block";
                    }
                }
                break;
            case (6 < quantity && quantity <= 13):
                {
                    var items = document.querySelectorAll('#svg_25');
                    for (var i = 0; i < items.length; i++) {
                        $(items[i]).attr('class', 'selectable');
                        document.getElementById('Plan').style.display = "block";
                    }
                }
                break;
            case (quantity > 13):
                {
                    window.location.href = 'contact';
                }
                break;
        }

        $(document.getElementById("selectionTitle")).css("display", "none");
        //ajax to check date
        //var data = 'dateheader=' + dateheader & 'name=' + name;
        //var dateheader = document.getElementById('datepicker').value;
        var dateheader = $('input[name="Date"]').val();
        var timeheader = $('input[name="Time"]').val();
        var dureeheader = $('input[name="Duree"]').val();
        //var dateheader = JSON.stringify({ dateheader: dateheader });
        var quantity = $('input[name="quantity"]').val();
        console.log(dateheader);
        //var dataToSend = JSON.stringify({'dateheader':dateheader});
        tablenumbers = new Array();
        $.ajax({
            type: "POST",
            //url: 'compare',
            url: "compare",
            //cache: false,
            //contentType: "application/json; charset=utf-8",
            //dataType: "json",
            data: { quantity: quantity, 'dateheader': dateheader, 'timeheader': timeheader },
            //data: JSON.stringify({ 'dateheader': dateheader, 'timeheader': timeheader, 'quantity': quantity }),
            // //data: { 'dateheader': dateheader, 'timeheader': timeheader, 'quantity': quantity },
            success: function(response) {
                response = JSON.stringify(response);
                $.each(JSON.parse(response), function(i, v) {
                    console.log(v.tbnumber);
                    switch (v.tbnumber) {
                        case "1":
                            $(document.getElementById('svg_2')).attr('class', 'nonselectable');
                            break;
                        case "2":
                            $(document.getElementById('svg_19')).attr('class', 'nonselectable');
                            break;
                        case "3":
                            $(document.getElementById('svg_21')).attr('class', 'nonselectable');
                            break;
                        case "4":
                            $(document.getElementById('svg_49')).attr('class', 'nonselectable');
                            break;
                        case "5":
                            $(document.getElementById('svg_6')).attr('class', 'nonselectable');
                            break;
                        case "6":
                            $(document.getElementById('svg_17')).attr('class', 'nonselectable');
                            break;
                        case "7":
                            $(document.getElementById('svg_23')).attr('class', 'nonselectable');
                            break;
                        case "8":
                            $(document.getElementById('svg_11')).attr('class', 'nonselectable');
                            break;
                        case "9":
                            $(document.getElementById('svg_15')).attr('class', 'nonselectable');
                            break;
                        case "10":
                            $(document.getElementById('svg_13')).attr('class', 'nonselectable');
                            break;
                        case "11":
                            $(document.getElementById('svg_25')).attr('class', 'nonselectable');
                            break;
                        case "12":
                            $(document.getElementById('svg_37')).attr('class', 'nonselectable');
                            break;
                        case "13":
                            $(document.getElementById('svg_35')).attr('class', 'nonselectable');
                            break;
                        case "14":
                            $(document.getElementById('svg_33')).attr('class', 'nonselectable');
                            break;
                        case "15":
                            $(document.getElementById('svg_27')).attr('class', 'nonselectable');
                            break;
                        case "16":
                            $(document.getElementById('svg_29')).attr('class', 'nonselectable');
                            break;
                        case "17":
                            $(document.getElementById('svg_31')).attr('class', 'nonselectable');
                            break;
                        case "18":
                            $(document.getElementById('svg_45')).attr('class', 'nonselectable');
                            break;
                        case "19":
                            $(document.getElementById('svg_43')).attr('class', 'nonselectable');
                            break;
                        case "20":
                            $(document.getElementById('svg_41')).attr('class', 'nonselectable');
                            break;
                        case "21":
                            $(document.getElementById('svg_39')).attr('class', 'nonselectable');
                            break;
                        case "22":
                            $(document.getElementById('svg_47')).attr('class', 'nonselectable');
                            break;
                        case "":
                            break;
                    };
                });
                // if (data.notify == "Success") {
                //     console.log(data);
                //tablenumbers = data;
                //document.getElementById('tablenumbercollect').innerHTML = data;
                ///var json = JSON.parse(JSON.stringify(data));
                //console.log(data);
                // } else {
                //     console.log("There is no reservation with this data");
                // }
                // if (data.reservation != "") {
                //     document.getElementById('tablenumbercollect').innerHTML = data.reservation
                // }
                //console.log(msg);


            },
            //data: '&dateheader=' + dateheader + '&timeheader=' + timeheader + '&quantity=' + quantity,
            // success: function(data) {
            //     if (data.notify == "Success") {
            //         console.log(data.notify);
            //     } else {
            //         console.log(data.notify);
            //     }
            // },
            error: function() {
                //alert("Invalide!");
            }

        });
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
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;

    }
}

function changecolor2() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_19')).attr('class', 'click');
        title = document.getElementById("svg_20").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor3() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_21')).attr('class', 'click');
        title = document.getElementById("svg_22").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor4() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_49')).attr('class', 'click');
        title = document.getElementById("svg_50").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor5() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_6')).attr('class', 'click');
        title = document.getElementById("svg_7").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor6() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_17')).attr('class', 'click');
        title = document.getElementById("svg_18").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor7() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_23')).attr('class', 'click');
        title = document.getElementById("svg_24").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor8() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_11')).attr('class', 'click');
        title = document.getElementById("svg_12").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor9() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_15')).attr('class', 'click');
        title = document.getElementById("svg_16").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor10() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_13')).attr('class', 'click');
        title = document.getElementById("svg_14").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor11() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_25')).attr('class', 'click');
        title = document.getElementById("svg_26").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor12() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_37')).attr('class', 'click');
        title = document.getElementById("svg_38").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor13() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_35')).attr('class', 'click');
        title = document.getElementById("svg_36").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor14() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_33')).attr('class', 'click');
        title = document.getElementById("svg_34").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor15() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_27')).attr('class', 'click');
        title = document.getElementById("svg_28").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor16() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_29')).attr('class', 'click');
        title = document.getElementById("svg_30").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor17() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_31')).attr('class', 'click');
        title = document.getElementById("svg_32").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor18() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_45')).attr('class', 'click');
        title = document.getElementById("svg_46").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor19() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_43')).attr('class', 'click');
        title = document.getElementById("svg_44").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor20() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_41')).attr('class', 'click');
        title = document.getElementById("svg_42").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor21() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_39')).attr('class', 'click');
        title = document.getElementById("svg_40").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}

function changecolor22() {
    if ($('.selctable')) {
        $(document.getElementsByClassName('click')).attr('class', 'selectable');
        $(document.getElementById('svg_47')).attr('class', 'click');
        title = document.getElementById("svg_48").textContent;
        document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
        $(document.getElementById("selectionTitle")).css("display", "block");
        document.getElementById("tablenumber").value = title;
    }
}




//double click on table number will take to the page redirect
// if ($(".click")) {
//     title = document.getElementsByClassName("st4 st5").textContent;
//     document.getElementById("selectionTitle").innerHTML = "Vous avez sélectionné la table " + title;
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