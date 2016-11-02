

//.....................Add category...................................................... 

$("#category_submit").click(function (e) {
    event.preventDefault();
    var category_name = $('#category_name_id').val();
    var category_entry_date = $('#category_entry_date_id').val();

    if (category_name && category_entry_date) {

        $.post("/api/api/product_category", {category_name: category_name, category_entry_date: category_entry_date}).done(function (data) {
            $('#category_name_id').val("");
            $('#category_entry_date_id').val("");
            var success_massege_dialogbox = '';
            success_massege_dialogbox += '<div class="alert alert-success fade in">';
            success_massege_dialogbox += '<a href="#" class="close" data-dismiss="alert">&times;</a>';
            success_massege_dialogbox += '<strong>Success!</strong>' + data.success_massege + '</div>';
            $('#success_massege').append(success_massege_dialogbox);
            alertify.success("Now you have a new category !!");

        });
    }
    
    else {
        if (category_name){
            alertify.alert("Please Enter <b>Entry Date</b>");
        }else{
             alertify.alert("Please Enter a <b>Category Name</b> ");
        }
    }
});


//............................................................Add Sub Category...............................


$("#sub_category_submit").click(function (e) {
    event.preventDefault();
    var category_id = $('#category_id').val();
    var sub_category_name = $('#sub_category_name_id').val();
    var sub_category_entry_date = $('#sub_category_entry_date_id').val();

    if (category_id && sub_category_name && sub_category_entry_date) {

        $.post("/api/api/product_sub_category", {category_id: category_id, sub_category_name: sub_category_name,sub_category_entry_date: sub_category_entry_date}).done(function (data) {
            console.log(data);
            $('#select_category').val("");
            $('#category_id').val("");
            $('#sub_category_name_id').val("");
            $('#sub_category_entry_date_id').val("");
           
            var success_massege_dialogbox_sub_cat = '';
            success_massege_dialogbox_sub_cat += '<div class="alert alert-success fade in">';
            success_massege_dialogbox_sub_cat += '<a href="#" class="close" data-dismiss="alert">&times;</a>';
            success_massege_dialogbox_sub_cat += '<strong>Success!</strong>' + data.success_massege + '</div>';
            $('#success_massege').append(success_massege_dialogbox_sub_cat);
            alertify.success("Now you have a new Sub Category !!");

        });
    }
    
    else {
            alertify.alert("Please Fillup All Fields Carefully! "); 
    }
});