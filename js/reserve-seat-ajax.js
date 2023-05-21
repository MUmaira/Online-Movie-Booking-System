$(document).ready(() => {
  $("#movie").on("change", () => {
    let movieId = $("#movie").val();
    let url = "get-results-ajax.php?id=" + movieId;

    $.get(url, (data, status) => {
      $("#theatre").html(data);
    });
  });
});
