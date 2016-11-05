

//........................................Add category...................................................... 

$("#category_submit").click(function (e) {
    event.preventDefault();
    var category_name       = $('#category_name_id').val();
    var todayDate = new Date();
    var category_entry_date = moment(todayDate).format("YYYY-MM-DD HH:mm:ss");
    if (category_name && category_entry_date) {
        $.post("/api/product_category", {category_name: category_name, category_entry_date: category_entry_date}).done(function (data) {
            $('#category_name_id').val("");
            alertify.success("<b>Success ! </b>  New Category Added Succefully.");
        });
    }

    else {
        alertify.alert("<b>Alert!</b> Please Fillup All Fields Carefully. ");
        }
});


//............................................................Add Sub Category...............................


$("#sub_category_submit").click(function (e) {
    event.preventDefault();
    var category_id = $('#category_id').val();
    var sub_category_name = $('#sub_category_name_id').val();
    var todayDate = new Date();
    var sub_category_entry_date = moment(todayDate).format("YYYY-MM-DD HH:mm:ss");

    if (category_id && sub_category_name && sub_category_entry_date) {

        $.post("/api/product_sub_category", {category_id: category_id, sub_category_name: sub_category_name, sub_category_entry_date: sub_category_entry_date}).done(function (data) {
            console.log(data);
            $('#select_category').val("");
            $('#category_id').val("");
            $('#sub_category_name_id').val("");
            $('#sub_category_entry_date_id').val("");
             alertify.success("<b>Success ! </b>  New SubCategory Added Succefully.");
        });
    }

    else {
        alertify.alert(" <b>Alert!</b>  Please Fillup All Fields Carefully. ");
    }
});

//............................................................Delete Confirmation...............................

$(".delete").click("submit", function () {
    return confirm("Do you want to delete this item?");
     
});