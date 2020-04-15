jQuery(function(){
  jQuery(".menu").on("click",function(){
    jQuery(".sp-menu").slideToggle();
    jQuery(".icon-menu").toggle();
    jQuery(".icon-close").toggle();
    return false;
  })
})

$(function () {
  var index = 0;
  $('li').click(function() {
    if (index != $('li').index(this)) {
      index = $('li').index(this);
      // タブの内容
      $('article').hide().eq(index).fadeIn('fast');
      // タブ
      $('li').removeClass('selected').eq(index).addClass('selected');
    }
  });
});