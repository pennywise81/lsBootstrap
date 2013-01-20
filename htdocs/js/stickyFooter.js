// Window load event used just in case window height is dependant upon images
$(window).bind("load", function() {
  var footerHeight = 0,
    footerTop = 0,
    $footer = $("footer.main");
    console.log($footer.height());

  positionFooter();

  function positionFooter()
  {
    footerHeight = $footer.height();
    footerTop = ($(window).scrollTop() + $(window).height() - footerHeight) + "px";

    if (($(document.body).height() + footerHeight) < $(window).height())
    {
      $footer.css({
        position: "absolute"
      }).animate({
        top: footerTop
      });
    }
    else
    {
      $footer.css({
        position: "static"
      });
    }
  }
});