/* add this code on your iframe page (this iframe page is yours; you need access to this page) */
setInterval(function() 
   {
      window.top.postMessage(document.body.offsetHeight + 25, "*");         
   }, 500);  