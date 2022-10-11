
// ハンバーガーメニュー
$(function () {
  $('.menu-trigger').click(function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.g-navi').addClass('active');
    } else {
      $('.g-navi').removeClass('active');
    }
  });
  $('.nav-wrapper ul li a').click(function () {
    $('.menu-trigger').removeClass('active');
    $('.g-navi').removeClass('active');
  });
});

// モーダルウインドウ
$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });

  $('.post-input,.td').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
