<script src="//platform.linkedin.com/in.js" type="text/javascript">
  lang: en_US
</script>
<script>
function addBookmark(title, url) {
    if(document.all) { // ie
        window.external.AddFavorite(url, title);
    }
    else if(window.opera && window.print) { // opera
        var elem = document.createElement('a');
        elem.setAttribute('href',url);
        elem.setAttribute('title',title);
        elem.setAttribute('rel','sidebar');
        elem.click(); // this.title=document.title;
    }
    else { // webkit - safari/chrome
                alert('Go to the publication and press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
    }
}

//Facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
//Twitter
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}
</script>

<?php

function get_share_btns($link, $title){
				//Bookmarks
				if (isset($_SERVER['HTTP_USER_AGENT'])) {
					//Get the agent to check which browser to user for the bookmark
					$agent = $_SERVER['HTTP_USER_AGENT'];
				}
				if (strlen(strstr($agent, 'Firefox')) > 0) {
					$return .= "<br><a href='$link' title='$title' rel='sidebar'><button>Bookmark</button></a>  ";	 
				}
				else{
					$return .= "<br><button><a href=\"javascript:addBookmark('$title', '$link')\" style='text-decoration: none; cursor:default; color:black;'>Bookmark</a></button>  ";
				}
				//End Bookmarks
				
				
				//Facebook, Twitter, and LinkedIn Share Buttons
  					$return .= "<div id='dd' class='wrapper-dropdown-3' tabindex='1'>
						<span style='padding-left:2px;' class='share'>Share</span>
						<ul class='dropdown' style='z-index:100'>	
							<li>
								<div class='fb-share-button' data-href='$link'></div>
							</li> 
							<li>
								<a href='https://twitter.com/share' class='twitter-share-button' data-url='$link' data-lang='en' data-count='none'>Tweet</a>
							</li>
							<li>
								<script type='IN/Share' data-url='$link' data-counter='right'></script>
							</li>
							<li>
								<a class='mailbutton' href='mailto:?subject=I wanted you to see this publication&amp;body=Check out this publication $link'>
									<img src='http://png-2.findicons.com/files/icons/573/must_have/48/mail.png' style='height:20px;'/>
								</a>
							</li>
							<li>
								<a href='https://plus.google.com/share?url=$link' onclick=\"javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\" target='_blank'>
  									<img src='https://www.gstatic.com/images/icons/gplus-16.png' alt='Share on Google+'/>
  								</a>
  							</li>
  						</ul>
					</div>";
				//End Facebook, Twitter, and LinkedIn Share Buttons
  	}			
?>