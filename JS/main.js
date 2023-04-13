$(document).ready(function() {
  // hide all textboxes


var myButton = document.getElementById('delete-product-btn');
if (isStale(myButton)) {
  console.log('Button is stale!');
}

var myButton2 = document.getElementById('AddButton');
if (isStale(myButton2)) {
  console.log('Button is stale!');
}

  $('#DVDForm, #DVDdesc').hide();
  $('#FurnitureForm, #FurnitureDesc').hide();
  $('#BookForm, #BookDesc').hide();

  $('#productType').change(function() {
    var selectedValue = $(this).val();

    // toggle the visibility of the textboxes based on the selected value
    $('#DVDForm,#DVDdesc').toggle(selectedValue === 'DVD');
    $('#FurnitureForm,#FurnitureDesc').toggle(selectedValue === 'Furniture');
    $('#BookForm, #BookDesc').toggle(selectedValue === 'Book');
  });
  


  $('.main-navbar').on('click', '#AddButton', function() {
  
    // Show the form modal for adding a product
    window.location.href='addproduct.php';
  });

  $('.main-navbar').on('click', '#delete-product-btn', function() {
    // Create an array to store the IDs of selected rows
    event.preventDefault();
    var selectedIds = [];

    // Iterate over each checked checkbox and push its ID to the array
    $('input[name="product_ids[]"]:checked').each(function() {
      selectedIds.push($(this).val());
    });

    // Make an AJAX request to delete the selected rows
    console.log("Before Ajax Request");
    $.ajax({
      url: 'delete.php',
      method: 'POST',
      data: { ids: selectedIds },
      success: function(response) {
        console.log("AJAX request successful");
        console.log("Response from server:", response);
        // Reload the page to reflect the changes
        $('input[name="ids[]"]').prop('checked', false);
        location.reload();
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

  $.validator.addMethod("integer", function(value, element) {
    return this.optional(element) || /^-?\d+$/.test(value);
  }, "Please enter a valid integer.");

  $("#product_form").validate({
    errorPlacement: function(error, element) {
      if (element.attr("name") === "sku") {
        alert("Please enter a valid SKU");
      } else if (element.attr("name") === "name") {
        alert("Please enter a valid name");
      } else if (element.attr("name") === "price") {
        alert("Please enter a valid price");
      } else if (element.attr("name") === "height") {
        alert("Please enter a valid height");
      } else if (element.attr("name") === "width") {
        alert("Please enter a valid width");
      } else if (element.attr("name") === "length") {
        alert("Please enter a valid length");
      } else if (element.attr("name") === "weight") {
        alert("Please enter a valid weight");
      } else if (element.attr("name") === "size") {
        alert("Please enter a valid size");
      }
    },
    highlight: function(element, errorClass) {
      $(element).addClass(errorClass);
    },
    unhighlight: function(element, errorClass) {
      $(element).removeClass(errorClass);
    },
    rules: {
      sku: "required",
      name: "required",
      price: {
        required: true,
        number: true
      },
      height: {
        required: function() {
          return $("#productType").val() === "Furniture";
        },
        digits: true
      },
      width: {
        required: function() {
          return $("#productType").val() === "Furniture";
        },
        digits: true
      },
      length: {
        required: function() {
          return $("#productType").val() === "Furniture";
        },
        digits: true
      },
      weight: {
        required: function() {
          return $("#productType").val() === "Book";
        },
        digits: true
      },
      size: {
        required: function() {
          return $("#productType").val() === "DVD";
        },
        digits: true
      }
    },
    messages: {
      sku: "Please enter a valid SKU",
      name: "Please enter a valid name",
      price: {
        required: "Please enter a valid price",
        number: "Please enter a valid number"
      },
      height: {
        required: "Please enter a valid height",
        digits: "Please enter a valid integer"
      },
      width: {
        required: "Please enter a valid width",
        digits: "Please enter a valid integer"
      },
      length: {
        required: "Please enter a valid length",
        digits: "Please enter a valid integer"
      },
      weight: {
        required: "Please enter a valid weight",
        digits: "Please enter a valid integer"
      },
      size: {
        required: "Please enter a valid size",
        digits: "Please enter a valid integer"
      }
    }
  });

});


var isStale = function(element) {
  try {
    // Try to interact with the element to see if it's still attached to the DOM
    element.click();
    return false; // Element is not stale
  } catch (e) {
    return true; // Element is stale
  }
};


