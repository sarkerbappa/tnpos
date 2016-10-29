
$(document).ready(function () {

});
    


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
            alertify.success("Find Your New Category Into Category Select Box");

        });
    }
    else {
        alertify.alert("Please Enter a <b>Category Name</b> and <b>Entry Date</b>");

    }

});



