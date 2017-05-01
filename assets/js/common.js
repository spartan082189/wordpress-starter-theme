(function($) {
  /*
    ### Variables ###
  */
  var baseApiUrl = theme.url + '/api/index.php'; //api url

  /*
    ############### Handle newsletter validation ###############
  */
  $("#subscribe-form").on("submit", function() {
    var email = $("#newsletter-email").val(); //Email value
    UIkit.notification.closeAll(); //Close all notification messages
    //Send AJAX call to subscribe to newsletter
    $.post(baseApiUrl + '/subscribe', { "email": email }, function(data) {
      if (data.error) {
        //Send error message if the email is invalid
        notify(data.error, 'danger');
      } else {
        //Send success message if the email was subscribed successfully
        notify(data.success, 'success');
        $("#subscribe-form")[0].reset(); //Clear the form
      } //End if/else
    }, "json").fail(function(error) {
      //Handle errors in the "fail" promise
      notify('There was an error with the request. <br />Please try again.', 'danger');
    }); //End "fail" promise
  }); //End submit handler

  /*
    ############### Handle contact form validation ###############
  */
  $("#contact-form").on("submit", function(event) {
    var formData = $(this).serialize(); //Serialize form data into a string (ex. firstName=Mike&lastName=Doe)
    UIkit.notification.closeAll(); //Close all notification messages
    //If the form has no errors, submit AJAX call
    if (validate(formData).length === 0) {
      //Send AJAX call to send message
      $.post(baseApiUrl + '/contact', formData, function(data) {
        if (data.error) {
          //Send error message if the form is invalid
          notify(data.error, 'danger');
        } else {
          //Send success message if the form was ok
          notify(data.success, 'success');
          $("#contact-form")[0].reset(); //Clear the formm
          $("#contact-form").find("textarea, input").removeClass("uk-form-danger");
        } //End if/else
      }, "json").fail(function(error) {
        //Handle errors in the "fail" promise
        notify('There was an error with the request. <br />Please try again.', 'danger');
      }); //End "fail" promise
    } else {
      //Loop through fields and add/remove error class
      $("#contact-form").find("textarea, input").each(function() {
        var nameAttr = $(this).attr("name"); //Name attribute
        if ($.inArray(nameAttr, validate(formData)) > -1) {
          $(this).addClass("uk-form-danger"); //Add error class
        } else {
          $(this).removeClass("uk-form-danger"); //Remove error class
        }
      });
      //Handle errors in the "fail" promise
      notify('Invalid form data. Please try again.', 'danger');
    }
  });

  /*
    ############### Handle getting tweets ###############
  */
  if (localStorage) {
    //Make call to get tweets from Twitter...
    var localTweets = JSON.parse(localStorage.getItem('tweets'));
    $.getJSON(baseApiUrl + '/getTweets', function(data) {
      UIkit.notification.closeAll(); //Close all notification messages
      if (data.error) {
        handleTweetError(localTweets);
        // notify('Unable to get tweets from Twitter. <br />Using cached tweets instead (if they exist).', 'warning');
        console.warn('Unable to get tweets from Twitter. Using cached tweets instead (if they exist).');
      } else {
        localStorage.setItem('tweets', JSON.stringify(data));
        displayTweets(data);
      }
    }).fail(function(error) {
      //Handle errors in the "fail" promise
      //notify('Cannot get tweets from Twitter. <br />Please try again.', 'danger');
      console.error('Cannot get tweets from Twitter. Please try again.');
      handleTweetError(localTweets);
    }); //End "fail" promise;
  } else {
    UIkit.notification.closeAll(); //Close all notification messages
    notify('LocalStorage API not supported.', 'danger');
  }

  /*
    ############### Overrides/Fixes ###############
  */

  //Close mobile nav when you click any of the menu items
  $("#nav .uk-list li a").on('click', function(event) {
    $('#offcanvas-push').removeClass('uk-offcanvas-overlay uk-open').css('display', 'none');
    $("html").removeClass("uk-offcanvas-page uk-offcanvas-page-animation uk-offcanvas-page-overlay").removeAttr("style");
    $('#nav').removeClass('uk-offcanvas-bar-animation uk-offcanvas-push');
  });

}(jQuery));


/*
  ############### Form validation function (Lazy) ###############
*/
function validate(formData) {
  var errors = []; //Hold the errors
  //Iterate through each form field and check if they exist
  $.each(formData.split("&"), function(i, data) {
    var key = data.split("=")[0];
    var value = data.split("=")[1];
    if (value.length === 0) {
      errors.push(key);
    }
  });
  return errors;
}

/*
  ############### Handle Notifications ###############
*/
function notify(message, status, pos, timeout) {
  var message = message || '';
  var status = status || 'primary';
  var pos = pos || 'top-center';
  var timeout = timeout || 5000;

  UIkit.notification({
    message: message,
    status: status,
    pos: pos,
    timeout: timeout
  })
}

/*
  ############### Handle Tweet iteration ###############
*/
function displayTweets(tweets) {
  //Iterate through each tweet and place them into the #tweets div
  $.each(tweets, function(i, tweet) {
    i = i + 1;
    var delay = i * 300; //Create delayed animation effect
    $("#tweets").append('<p class="uk-heading-bullet" uk-scrollspy="cls: uk-animation-slide-top; delay:' + delay + '; repeat: true">' + tweet.text + '</p>');
  });
}

/*
  ############### Handle Tweet error ###############
*/
function handleTweetError(localTweets) {
  //Do you have any cached tweets?
  if (localTweets) {
    displayTweets(localTweets);
  } else {
    //Return error if you have no cached tweets in localstorage
    var dummyTweets = [{ 'text': 'No tweets to display :(. #error' }, { 'text': 'Please #tryAgain later.' }];
    $.each(dummyTweets, function(i, tweet) {
      i = i + 1;
      var delay = i * 300; //Create delayed animation effect
      $("#tweets").append('<p class="uk-heading-bullet" uk-scrollspy="cls: uk-animation-slide-top; delay:' + delay + '; repeat: true">' + tweet.text + '</p>');
    });
  }
}