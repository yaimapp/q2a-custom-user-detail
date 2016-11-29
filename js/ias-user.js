$(function(){
  $('.ias-spinner').hide();
  if($("#activities").length && $(".qa-page-links-list").length) {
    var ias = $(".mdl-layout__content").ias({
      container: "#activities"
      ,item: ".qa-q-list-item"
      ,pagination: ".qa-page-links-list"
      ,next: ".qa-page-next"
      ,delay: 600
    });
    ias.extension(new IASTriggerExtension({
        text: "続きを読む",
        textPrev: "前を読む",
        offset: 100,
    }));
    ias.extension(new IASNoneLeftExtension({
      html: '<div class="ias_noneleft">最後の記事です</div>', // optionally
    }));
    ias.on('load', function() {
      $('.ias-spinner').show();
    });
    ias.on('noneLeft', function() {
      $('.ias-spinner').hide();
    });
  }
});