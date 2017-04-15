(function($) {
 
  var enabledClass = "classic-retweet-enabled",
      title = "Find Fake News",
      label = "FindFakeNews",
      shortLabel = "FFN";
  var handler = function(event) {
    var tweet = $(this).closest(".js-actionable-tweet");
    var text = tweet.find(".js-tweet-text").first(); // guard as above
    text.find("a").each(function(index) {
      $(this).text($(this).data("expanded-url"));
    });
    event.preventDefault();
    event.stopPropagation();
    return false;
  };

  $("#page-container").delegate(".js-actionable-tweet", "mouseover", function() {
    if (!$(this).hasClass(enabledClass)) {
      $(this).addClass(enabledClass);

      var replyAction;
      // if this is an old-style page
      if ((replyAction = $(this).find(".action-reply-container").first()).length) {
        // first() call in statemetn above is to guard against embedded copy
        // ("permalink-tweet" vs "original-tweet") on individual tweet page
        var FNFAction = replyAction.clone();
        FNFAction.removeClass("action-reply-container").addClass("action-rt-container"); // so there's left padding
      }
      // else if this is a new-style page
      else if ((replyAction = $(this).find(".ProfileTweet-action--reply")).length) {
        var FNFAction = replyAction.clone();

        var button = FNFAction.find(".js-actionReply");
        button.removeClass("js-actionReply");
        button.removeAttr("data-modal");
        button.attr("title", title);
        button.removeClass("IconContainer");
		
        button.find(".u-isHiddenVisually").html(title);
        button.on("click", handler);

        replyAction.after(FNFAction);
      }
    }
  });
})($);

document.addEventListener('DOMContentLoaded', function() {
    var link = document.getElementById('link');
    // onClick's logic below:
    link.addEventListener('click', function() {
        hellYeah('xxx');
    });
});
