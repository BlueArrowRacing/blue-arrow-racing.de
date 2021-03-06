
// Code from: https://www.w3schools.com/howto/howto_html_include.asp
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("include-html");
    if (file) {
      /* Make an HTTP request using the attribute value as the file name: */
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText}
          if (this.status == 404) {elmnt.innerHTML = "<!-- Page could not be loaded -->"; console.error("Page could not be loaded ("+file+")")}
          /* Remove the attribute, and call this function once more: */
          elmnt.removeAttribute("include-html");
          includeHTML();
        }
      }
      xhttp.open("GET", file, false);
      xhttp.send();
      /* Exit the function: */
      return;
    }
  }
}

function includeYT() {
  z = document.getElementsByTagName("*")
  for(i = 0; i < z.length; i++) {
    elmnt = z[i];
    id = elmnt.getAttribute("include-youtube");
    if(id) {
      elmnt.classList.add("yt-embed")
      elmnt.removeAttribute("include-youtube");
      elmnt.innerHTML = '<iframe class="ytplayer" type="text/html" src="https://www.youtube.com/embed/'+id+'" frameborder="0"></iframe>'
    }
  }
}

includeHTML();

includeYT();
