document.addEventListener('DOMContentLoaded', function () {
  var alerts = document.querySelectorAll('.alert');
  alerts.forEach(function (a) {
    setTimeout(function(){ a.classList.add('fade'); a.classList.remove('show'); a.style.display='none'; }, 4000);
  });
  var addAdminForm = document.querySelector('#add-admin-form');
  if (addAdminForm) {
    var emailInput = addAdminForm.querySelector('input[name="email"]');
    var errorBox = addAdminForm.querySelector('#admin-email-error');
    addAdminForm.addEventListener('submit', function (e) {
      var v = (emailInput.value || '').trim();
      if (!v || v.indexOf('@') === -1) {
        e.preventDefault();
        if (errorBox) {
          errorBox.textContent = 'Please enter a valid email with @';
          errorBox.style.display = 'block';
        } else {
          alert('Please enter a valid email with @');
        }
        emailInput.focus();
      } else {
        if (errorBox) errorBox.style.display = 'none';
      }
    });
  }
});
