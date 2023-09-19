let updateBtns = document.querySelectorAll('.updateBtn');
let deleteBtns = document.querySelectorAll('.deleteBtn');

// MODAL
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

// UPDATE MODAL
var update = document.getElementById("update");

// BUTTONS FOR UPDATE/DELETE
deleteBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var id = btn.getAttribute('data-id');
      deleteContact(id);
    });
});

updateBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var id = btn.getAttribute('data-id');
      console.log('Update button clicked with id:', id);
      openModal(false);
      updateContact(id);
    });
});

function deleteContact(id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'delete.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
        location.reload();
        }
    };
    xhr.send('id=' + id);
}

// function updateContact(id) {
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'update.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
//     xhr.send(`id=` + id); // Added the "&" symbol before the "id" parameter
// }
function updateContact(id) {
  $.ajax({
      type: "POST",
      url: "update.php",
      data: { id: id }, // Send the 'id' parameter
      success: function(response) {
          // Handle the response from the server here
          console.log("Response from server:", response);
      },
      error: function(xhr, status, error) {
          // Handle any errors that occur during the AJAX request
          console.error("Error:", error);
      }
  });
}

function openModal(check){
  if(check){
    modal.style.display = "block";
  } else {
    update.style.display = "block";
  }
}

// MODAL
btn.onclick = function() {
  openModal(true);
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  } else if (event.target == update){
    update.style.display = "none";
  }
}

//CALL FUNCTIONS ON BUTTONS

function validate() {
  var LN = $('#lastName').val();
  var FN = $('#firstName').val();
  var EA = $('#email').val();
  var CN = $('#contact').val();

  let mail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  let phone = /((\+[0-9]{2})|0)[.\- ]?9[0-9]{2}[.\- ]?[0-9]{3}[.\- ]?[0-9]{4}/;

  if (LN == "" || FN == "" || EA == "" || CN == "") {
      alert("Must Fill Out All Information");
  } else {
      if (EA.match(mail) == null && CN.match(phone) == null) {
          alert("Invalid Phone Number and Email Address");
      } else {
          if (CN.match(phone) == null) {
              alert("Invalid Phone Number");
          } else if (EA.match(mail) == null) {
              alert("Invalid Email Address");
          } else {
              $.ajax({
                  url: 'submit.php',
                  method: 'POST',
                  data: {
                      lastName: LN,
                      firstName: FN,
                      email: EA,
                      contact: CN
                  },
                  success: function(data) {
                      display();
                      $('#alert').html(data);
                      modal.style.display = "none";
                      clearinput();
                  },
              });
          }
      }
  }
}