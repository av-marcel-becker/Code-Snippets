/* use this for your page that include a iframe */
function resize_Iframe(obj)
   { 
      window.addEventListener('message', function(e)
         {
            var scroll_height = e.data;
            obj.style.height = scroll_height + 'px';
         } , false);
         
   };
/* use "resize_Iframe(this);" as onload attr.: <iframe src="" onload="resize_Iframe(this);"></iframe> */