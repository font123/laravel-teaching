$(document).ready(function() {

  var jobCount = $('#lists .in').length;
  $('.list-count').text('共 ' + jobCount + ' 条');
   
  var btn = document.getElementById("research");
  btn.onclick=function () {
     //$(this).addClass('hidden');
  
    var searchTerm = $("#search-text").val();
    var listItem = $('#lists').children('li');
  
    
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
      //extends :contains to be case insensitive
  $.extend($.expr[':'], {
  'containsi': function(elem, i, match, array)
  {
    return (elem.textContent || elem.innerText || '').toLowerCase()
    .indexOf((match[3] || "").toLowerCase()) >= 0;
  }
});
    
    
    $("#lists li").not(":containsi('" + searchSplit + "')").each(function(e)   {
      $(this).addClass('hiding out').removeClass('in');
      setTimeout(function() {
          $('.out').addClass('hidden');
        }, 300);
    });
    
    $("#lists li:containsi('" + searchSplit + "')").each(function(e) {
      $(this).removeClass('hidden out').addClass('in');
      setTimeout(function() {
          $('.in').removeClass('hiding');
        }, 1);
    });
    
  
      var jobCount = $('#lists .in').length;
    $('.list-count').text('共 ' + jobCount + ' 条');
    
    //shows empty state text when no jobs found
   if(jobCount == '0') {
      $('#lists li').addClass('empty');
    }
    else {
      $('#lists').removeClass('empty');
    } 
    
  }

  
                              
});