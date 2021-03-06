function postTo($url) {
  var form = $('<form id="autoform" action="' + $url + '" method="POST" style="display: none"></form>');
  $(document.body).append(form);
  $('#autoform')[0].submit();
}

/**
 * Configure all links that go off-site to open in a new window
 */
function putExternalLinksInNewWindow() {
  // Use current host if no root explicitely defined
  var root = this.SITE_ROOT || (location.protocol + '//' + location.host);
  $('A').each(function(i, link) {
    var href = link.href;
    if (/^http:/.test(href) && href.indexOf(root) != 0) {
      link.target = '_blank';
    }
  });
}

putExternalLinksInNewWindow();
