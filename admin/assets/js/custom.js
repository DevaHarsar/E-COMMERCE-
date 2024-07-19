$(document).ready(function(){
    $('.delete_product_btn').click(function(e)
    {
            e.preventDefault();

            var id = $(this).val();
            alert(id);
            
    });
}) ;