<?php
// function in your Theme: template.php
function THEME_page_delivery_callback_alter(&$delivery_callback) 
   {      
      // whitelist
      $host = 'example.com'; // iframe host
      $domains = [
            'example.de',
            'www.example.de',
         ];
         
      // get current ref. url
      $current_ref = parse_url(check_plain($_SERVER['HTTP_REFERER']));
      $current_ref_host = $current_ref['host']; 
   
      // check if the host is in the whitelist
      // it must always be checked if the url still agrees. 
      // In the iFrame, the ref. can change to itself or 
      // the main page can, for. For example, switch to another subdomain    
      if(in_array($current_ref_host,$domains))
         {
            $_SESSION['referer'] = $current_ref;
            // Loggout destroys the session, so you need a cookie fallback
            setcookie('ref', check_plain($_SERVER['HTTP_REFERER']),  NULL, '/');
         }
         
      // by clicking in iframe you reference yourself eg. example.com not example.de
      // you need this for prevent cookie manipulation
      if(!$_SESSION['referer'] && $_COOKIE['ref'] && $_SERVER['HTTP_HOST'] == $host)
         {
            // get current ref. url from cookie
            $current_ref = parse_url(check_plain($_COOKIE['ref']));
            $current_ref_host = $current_ref['host'];  
            
            // check if the host is in the whitelist
            if(in_array($current_ref_host,$domains))
               {
                  $_SESSION['referer'] = $current_ref;
               }
         }   
      // get ref. from session 
      $ref = $_SESSION['referer'];       
      $ref_host = $ref['host'];    
      $ref_scheme = $ref['scheme'];    
                     
      if(in_array($ref_host,$domains))
         {
            // sets the X-frame-options on the URL so that this can be used in the iframe
            variable_set('x_frame_options', 'ALLOW-FROM '.$ref_scheme.'://'.$ref_host);
         } 
      else 
         {
            // sets the X-frame-options as sameorigin, so that this can't be used in the extern iframe
            variable_set('x_frame_options', 'SAMEORIGIN');
         }
   }
