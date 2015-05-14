<?php
  header('Content-Type: text/javascript');
?>
$(function() {
  'use strict';

  var pageviews = new Firebase('https://choosewithalice.firebaseio.com/pageview');
  var waitlist = new Firebase('https://choosewithalice.firebaseio.com/waitlist');

  var referrer = '';

  try {
    referrer = window.top.document.referrer;
  } catch (e) {
    if (window.parent) {
      try {
        referrer = window.parent.document.referrer;
      } catch (e2) {
        referrer = '';
      }
    }
  }

  if (referrer === '') {
    referrer = document.referrer;
  }

  var user = window.user = {
    ip: "<?php echo $_SERVER["REMOTE_ADDR"] ?>",
    userAgent: navigator.userAgent,
    platform: navigator.platform,
    languages: navigator.languages,
    screen: screen.width + 'x' + screen.height,
    referrer: referrer
  };

  var pageview = pageviews.push();
  pageview.set({
    date: (new Date()).toISOString(),
    user: user
  });

  $('#form').submit(function(e) {
    e.preventDefault();
    e.stopPropagation();

    $('#name').removeClass('border-red');
    $('#email').removeClass('border-red');

    var name = $('#name').val();
    var email = $('#email').val();

    if (name === '') {
      $('#name').addClass('border-red');
    } else if (email === '') {
      $('#email').addClass('border-red');
    } else {
      var item = waitlist.push();

      $('#submit').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>')

      item.set({
        date: (new Date()).toISOString(),
        name: name,
        email: email,
        user: user
      }, function(){
        $('#name').slideUp();
        $('#email').slideUp();
        $('#submit').addClass('bg-green').text('Awesome! We\'ll let you know!');
      });
    }

  });

});
