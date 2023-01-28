// script menu responsive
var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;
function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    //Nav Menu
    if (!checkParent(target, navMenuDiv)) {
        if (checkParent(target, navMenu)) {
            if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
            } else {
                navMenuDiv.classList.add("hidden");
            }
        } else {
            navMenuDiv.classList.add("hidden");
        }
    }
}
function checkParent(t, elm) {
    while (t.parentNode) {
        if (t == elm) {
            return true;
        }
        t = t.parentNode;
    }
    return false;
}

// js back to top button
$(window).on("scroll load", function () {
    if ($("#header").offset().top > 40) {
        $("#header").addClass("shrink");
        $(".Gototop").css("visibility", "visible");
    } else {
        $("#header").removeClass("shrink");
        $(".Gototop").css("visibility", "hidden");
    }
});

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
        }
        if (e.target.value === "dosen") {
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
