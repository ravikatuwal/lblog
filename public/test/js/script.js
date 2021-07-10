// // auto fill the content of one input to another
// function Copydata() {
//     $("#sectionid").val($("#classid").val());
// }
// //  and add this to the first id ie. classid input
// //  onkeyup=Copydata();

//  */

// To add new input or textarea
/*unction addTextArea() {
    var div = document.getElementById("div_quotes");
    div.innerHTML += "<input name='new_quote[]' />";
    div.innerHTML += "\n<br />";
}
// Add this to view page
<form method="post">
<input type="text" name="text_new_author" /><br />
<div id="div_quotes"></div>
<input type="button" value="Add Text Area" onClick="addTextArea();">
<input type="submit" name="submitted">
</form>
*/
$(document).ready(function() {
    $(document).on("change", "#class", function() {
        var class_id = $(this).val();

        var div = $(this).parent();

        var op = " ";
        // console.log(class_id);
        $.ajax({
            type: "get",
            url: "/get-section-by-class/" + class_id,

            success: function(data) {
                op = "<option value='0' selected>Choose Section</option>";
                for (var i = 0; i < data.length; i++) {
                    op +=
                        '<option value="' +
                        data[i].id +
                        '">' +
                        data[i].section_name +
                        "</option>";
                }
                console.log(div.find(".section"));
                $("#section").html(" ");
                $("#section").append(op);
            },
            error: function() {}
        });
    });
});
