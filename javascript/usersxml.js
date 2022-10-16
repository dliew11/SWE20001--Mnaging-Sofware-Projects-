/*
$(document).ready(function(){
   $.ajax({
    type: "GET" ,
    url: "https://res.cloudinary.com/dmsxwwfb5/raw/upload/v1591716537/book.xml",
    dataType: "xml",
    success: function(xml) {

    $(xml).find('book').each(function(){
     $("#xmldata").append('<li>' + $(this).text() + '</li>');  
    }); 
    }       
	
	
});
});
*/


$(document).ready(function(){
   $.ajax({
    type: "GET" ,
    url: "database/users.xml",
    dataType: "xml",
    success: function(xml) 
	{

    $(xml).find('Users').each(function(){
     $("#xmldata").append('<li>' + $(this).text() + '</li>');  
    }); 
	
	xml.__setitem__("Access-Control-Allow-Origin", "*") 
	return xml 
    }       
	
	
	
});
});
