function loadForms(page,id){
     $('.menu_items').removeClass('active');
     $('.m'+id).addClass('active');
     $.ajax({
        type: "POST",
        url: base_url +'AdminController/'+ page,
        success: function (data)
        {
           // alert(data);
            $('#mainCntnt').html(data);
        }
    });
 }
 
 function setMenuId(id){
     $.ajax({
        type: "POST",
        url: base_url +'Custom/set_menu_id',
        data: {id:id},
        success: function (data)
        {
            //$('#mainCntnt').html(data);
        }
    });
 }
 

