$(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
// add an extra education input block
  $("#add-education-input-fields-btn").click(function(){
      let container = $("#edu-container")
      let i = parseInt(container.children(":last").attr("id"));
      i += 1;
      let template = `
        <div class="row" id="${i}">
          <div class="mb-3 col">
              <label for="educationLevel-${i}" class="form-label">Level of Education</label>
              <input type="text" class="form-control" id="educationLevel-0" name="ed_levels[]" disabled>
          </div>

          <div class="mb-3 col">
              <label for="edstartDate-${i}" class="form-label">From</label>
              <input type="date" class="form-control" id="edstartDate-${i}" name="ed_start_dates[]]" disabled>
          </div>

          <div class="mb-3 col">
              <label for="edendDate-${i}" class="form-label">To</label>
              <input type="date" class="form-control" id="edendDate-${i}" name="ed_end_dates[]" disabled>
          </div>
            <button type="button" class="btn btn-outline-danger btn-block remove-input-block-btn mb-3" id="edu-remove-btn-${i}"><span><i class="fa fa-times"></i></span></button>
        </div>
    `;
    $("#edu-container").append(template);
  });

    $("#add-referee-input-fields-btn").click(function(){
      let container = $("#ref-input-area")
      let i = parseInt(container.children(":last").attr("id"));
      i += 1;
      let template = `
        <div class="ref-input-block" id="${i}">
            <h5>Referee</h5>
            <div class="row">
                <div class="mb-3 col">
                    <label for="refName-${i}" class="form-label">Name</label>
                    <input type="text" class="form-control" name="ref_names[]" id="refName-${i}">
                </div>
                <div class="mb-3 col">
                    <label for="refRelationship-${i}" class="form-label">Relationship</label>
                    <input type="text" class="form-control" name="ref_relationships[]" id="refRelationship-${i}">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="refPhoneNumber-${i}" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="ref_phone_numbers[]" id="refPhoneNumber-${i}">
                </div>
                <div class="mb-3 col">
                    <label for="refEmail-${i}" class="form-label">Email</label>
                    <input type="email" class="form-control" name="ref_emails[]" id="refEmail-${i}">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="refInstitution-${i}" class="form-label">Institution</label>
                    <input type="text" class="form-control" name="ref_institutions[]" id="refInstitution-${i}">
                </div>
                <div class="mb-3 col">
                    <label for="refPosition-${i}" class="form-label">Position in the Institution</label>
                    <input type="text" class="form-control" name="ref_positions[]" id="refPosition-${i}">
                </div>
            </div>
            <button type="button" class="btn btn-outline-danger btn-block remove-input-block-btn mb-3" id="ref-remove-btn-${i}"><span><i class="fa fa-times"></i></span></button>
        </div>
    `;
    container.append(template);
  });
  // remove extra added input blocks
  $(document).on("click", ".remove-input-block-btn", function(){
    $(this).parent().remove();
  });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
.forEach(function (form) {
form.addEventListener('submit', function (event) {
if (!form.checkValidity()) {
event.preventDefault()
event.stopPropagation()
}

form.classList.add('was-validated')
}, false)
})
})()
