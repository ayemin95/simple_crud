$(document).ready(function () {
  // When the "Edit" link is clicked
  $("a.link-warning").on("click", function (e) {
    e.preventDefault();
    var userId = $(this).data("bs-id");

    // Fetch user data via AJAX
    $.ajax({
      url: "<?= base_url(" / users / getUserData / ") ?>" + userId,
      type: "GET",
      dataType: "json",
      success: function (response) {
        // Populate modal fields with retrieved user data
        $('#editUserModal input[name="name"]').val(response.name);
        $('#editUserModal input[name="email"]').val(response.email);
      },
    });
  });
});
