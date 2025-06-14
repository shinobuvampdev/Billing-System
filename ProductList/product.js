$(document).ready(function(){
    $("#submit_btn").click(function(){
      $.ajax({
        url:"http://127.0.0.1:5500/products.php",
        method: "POST", 
        headers: {
        'Access-Control-Allow-Origin': '*'
        },
        data:$("#requestForm").serialize(),
        success:function(response)
        {
        alert("Well done!");
        }
      });
    });
  });