$(document).ready(function () {
    //js dynamic author form
    var count_author = 1;
    $(".btn-add-author").click(function () {
        var authorRow = $(".author-row").first().clone();
        authorRow.find("input").val("");
        $("#author-container").append(authorRow);
        count_author++;
        if (count_author !== 1) {
            $(".btn-remove-author").prop("disabled", false);
        } else {
            $(".btn-remove-author").attr("disabled", true);
        }
    });

    $("#participant_category").change(function (e) {
        if (e.target.value === "mahasiswa") {
            $("#ktm_field").css("display", "flex");
            $("#ktm_file").attr("required", true);
        }
        if (e.target.value === "dosen") {
            $("#ktm_file").prop("required", false);
            $("#ktm_file").val("");
            $("#ktm_field").css("display", "none");
        }
    });

    $(document).on("click", ".btn-remove-author", function () {
        $(this).closest(".author-row").remove();
        count_author--;
        if (count_author !== 1) {
            $(".btn-remove-author").prop("disabled", false);
        } else {
            $(".btn-remove-author").attr("disabled", true);
        }
    });
});
