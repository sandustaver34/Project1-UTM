function quest() {
    var allInputs = $(":input");
    var currentid = "q" + String(allInputs.length - 1);
    var val = document.forms['test'][currentid].value;

    if (currentid == 'q8') {
        $("#button2").html("Stop");
    };

    if (currentid == 'q9') {
        $("#button2").hide();
    };

    $.ajax({
        type: "POST",
        url: "phpscript.php",
        data: { "ans": val, "current": currentid },
        dataType: "json",
        success: function(raspuns) {
            var neww = raspuns;
            $("#new").append(neww);
            $("#" + String(currentid)).attr('disabled', 'disabled');
        }
    });

}