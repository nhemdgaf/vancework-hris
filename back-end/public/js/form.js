const tab = document.getElementsByClassName("tab");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn")
const step = document.getElementsByClassName("step");

let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    const x = tab;
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        prevBtn.style.display = "none";
    } else {
        prevBtn.style.display = "inline";
    }
    if (n == (x.length - 1)) {
        nextBtn.innerHTML = "Save";
    } else {
        nextBtn.innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = tab;
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = tab;
    y = x[currentTab].getElementsByTagName("input", "option", "radio");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "" && y[i].className != "nullable") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        step[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = step;
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}

// Add the following code if you want the name of the file appear on select
// $(".custom-file-input").on("change", function () {
//     var fileName = $(this).val().split("\\").pop();
//     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// });

// Preview Picture
// $("#file").on('change', function () {
//     var imgPath = $(this)[0].value;
//     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

//     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
//         if (typeof (FileReader) != "undefined") {

//             // var image_holder = $("#image-holder");
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 $('.display-image').attr('src', e.target.result).css("height", "120px");
//             }
//             reader.readAsDataURL($(this)[0].files[0]);
//         } else {
//             alert("This browser does not support FileReader.");
//         }
//     } else {
//         alert("Pls select only images");
//     }
// });

// Birthdate
// $("#BirthDate").flatpickr({
//     altInput: true,
//     altFormat: "F j, Y",
//     dateFormat: "Y-m-d",
// });
