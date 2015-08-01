$(document).ready(function()
    {
      $(".books").hide();
    $(".search").hide();
      $("#account_button").addClass('active');
      $("#account_button").click(function()
        {
          $(".books").hide();
          $(".search").hide();
          $(".account").show();
          $(this).addClass('active');
          $("#books_button").removeClass('active');
          $("#search_button").removeClass('active');
        });
                               
      $("#books_button").click(function()
        {
          $(".account").hide();
          $(".search").hide();
          $(".books").show();
          $(this).addClass('active');
          $("#account_button").removeClass('active');
          $("#search_button").removeClass('active');

        });
    
    $("#search_button").click(function()
        {
          $(".account").hide();
          $(".books").hide();
        $(".search").show();
          $(this).addClass('active');
          $("#account_button").removeClass('active');
          $("#books_button").removeClass('active');

        });
    });


        