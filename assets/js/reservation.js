// //auto generate date and time value
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
        timeFormat: 'H:mm',
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
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
});


//to call show() function to display the plan image
function show() {
    var quantity = document.getElementById('quantity').value;
    if ($("#datepicker").val().length == 0 || $("#timepicker").val().length == 0 || quantity == 0) {
        if ($("#datepicker").val().length == 0) {
            window.alert("Please select date before checking seat availability.");
        }
        if ($("#timepicker").val().length == 0) {
            window.alert("Please select time before checking seat availability.");
        }
        if (quantity == 0) {
            window.alert("Please select number of seat before checking seat availability.");
        }
        document.getElementById('Plan').style.display = "none";
        //document.getElementById('regform').style.display = "none";
    } else {
        document.getElementById('Plan').style.display = "block";
        //document.getElementById('regform').style.display = "block";
    }
    //document.getElementById('planImg').style.maxHeight = "200px";
    //document.getElementById('planImg').background = "IMAGES/plan2.PNG";

}



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
//     return srcPath.replace("http://localhost:8080/gustocoffee/", '');
// }