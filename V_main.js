$(function(){
  $(".archive_english").click(function() {
    var id = $(this).attr("id").replace("english", "");
    tmp1 = $("#english" + id).html();
    tmp2 = $("#japanese" + id).html();
    $("#canvas_english").attr("value", tmp1);
    $("#canvas_japanese").attr("value", tmp2);
    $("#canvas_id").attr("value", id);
  });
});
