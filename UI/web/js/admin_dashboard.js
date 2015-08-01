$(document).ready(function()
    {
        
    $(".click-row").click(function() {
        window.document.location = $(this).data("href");
    });    
    
      var i=0;
      $(".admin").show();
      $(".user").hide();
      $("#formdel").hide();
      $("#admin_button").addClass('active');
      $("#admin_button").click(function()
        {
          $(".user").hide();
           $("#formdel").hide();
          $(".admin").show();
          $(this).addClass('active');
          $("#user_button").removeClass('active');
        });
                               
      $("#user_button").click(function()
        {      $("#formdel").hide();
          $(".admin").hide();
          $(".user").show();
          $(this).addClass('active');
          $("#admin_button").removeClass('active');

        });
        
              $("#one").click(function()
        {    $(".admin").hide();
                $("#admin_button").addClass('active');
             $(".user").hide();
             $("#formdel").show();
             i=1;
             
        });
        
        
                      $("#two").click(function()
        {     $(".admin").hide();
                $("#user_button").addClass('active');
             $(".user").hide();
             $("#formdel").show();
         
             i=2;
         
             
        });
        
        
        
                         $("#back").click(function()
        {
        
        	if(i==1)
        	{
        	 $(".admin").show();
                $("#admin_button").addClass('active');
             $(".user").hide();
             $("#formdel").hide();
             $("#user_button").removeClass('active');
             
            }
             else{
             
             $(".user").show();
                $("#user_button").addClass('active');
             $(".admin").hide();
             $("#formdel").hide();
             $("#admin_button").removeClass('active');
             
             }
             
        });
        
        
        
    });
        

