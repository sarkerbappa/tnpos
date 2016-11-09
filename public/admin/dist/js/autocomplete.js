
//................................ Product Category Auto Suggesition for the Add product page.

$(function () {
    $("#category_select_add_product_page").autocomplete({
        minLength: 0,
        source: function (request, response) {
            $.ajax({
                type: 'GET',
                url: 'api/autocompleteCat/' + request.term,
                dataType: "json",
                cache: false,
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            label: item.Product_Category_Name,
                            id: item.id,
                        };
                    }));

                    $("#category_select_add_product_page").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#category_select_add_product_page").val(ui.item.label);
            $("#category_select_add_product_page").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#category_select_add_product_page").val(ui.item.label);
            $("#category_select_add_product_page-id").val(ui.item.id);

            return false;
        }
    }).autocomplete("instance")._renderItem = function (ul, item) {

        return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
    };
});



// ................Product Category Auto Suggesition for the add subcategory modal. ............................     

$(function () {
    $("#select_category").autocomplete({
        minLength: 0,
        source: function (request, response) {
            $.ajax({
                type: 'GET',
                url: 'api/autocompleteCat/' + request.term,
                dataType: "json",
                cache: false,
                success: function (data_category_modal) {
                    response($.map(data_category_modal, function (item) {
                        return {
                            label: item.Product_Category_Name,
                            id: item.id
                        };
                    }));
                    $("#select_category").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#select_category").val(ui.item.label);
            $("#select_category").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#select_category").val(ui.item.label);
            $("#category_id").val(ui.item.id);
            return false;
        }
    }).autocomplete("instance")._renderItem = function (ul, item) {
        return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
    };
});



//................................ Product Sub Category Auto Suggesition for the Add product page.


$(function () {
    $("#sub_category_select_add_product_page").autocomplete({
        minLength: 0,
        source: function (request, response) {

            $.ajax({
                type: 'GET',
                url: 'api/autocompleteSubCat/' + $('#category_select_add_product_page-id').val() + '/' + request.term,
                dataType: "json",
                cache: false,
                success: function (data_sub_category_modal) {
                    response($.map(data_sub_category_modal, function (item) {
                        return {
                            label: item.Product_Sub_Category_Name,
                            id: item.id
                        };
                    }));

                    $("#sub_category_select_add_product_page").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#sub_category_select_add_product_page").val(ui.item.label);
            $("#sub_category_select_add_product_page").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#sub_category_select_add_product_page").val(ui.item.label);
            $("#category_select_add_product_page_id").val(ui.item.id);
            return false;
        },
    }).autocomplete("instance")._renderItem = function (ul, item) {

        return $("<li>")
                .append("<div>" + item.label+ "</div>")
                .appendTo(ul);
    };
});


/////////////////////////////// EDIT PAGE//////////////////////////////////////////////


//................................ Product Category Auto Suggesition for the Update product page..................


$(function () {
    $("#category_select_add_product_page_edit").autocomplete({
        minLength: 0,
        source: function (request, response) {
            $.ajax({
                type: 'GET',
                url: '/api/autocompleteCat/' + request.term,
                dataType: "json",
                cache: false,
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            label: item.Product_Category_Name,
                            id: item.id,
                        };
                    }));

                    $("#category_select_add_product_page_edit").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#category_select_add_product_page_edit").val(ui.item.label);
            $("#category_select_add_product_page_edit").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#category_select_add_product_page_edit").val(ui.item.label);
            $("#category_select_add_product_page_id_edit").val(ui.item.id);
            return false;
        }
    }).autocomplete("instance")._renderItem = function (ul, item) {

        return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
    };
});



//................................ Product Sub Category Auto Suggesition for the Edit product page.


$(function () {
    $("#sub_category_select_add_product_page_edit").autocomplete({
        minLength: 0,
        source: function (request, response) {

            $.ajax({
                type: 'GET',
                url: '/api/autocompleteSubCat/' + $('#category_select_add_product_page_id_edit').val() + '/' + request.term,
                dataType: "json",
                cache: false,
                success: function (data_sub_category_modal) {
                    response($.map(data_sub_category_modal, function (item) {
                        return {
                            label: item.Product_Sub_Category_Name,
                            id: item.id
                        };
                    }));

                    $("#sub_category_select_add_product_page_edit").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#sub_category_select_add_product_page_edit").val(ui.item.label);
            $("#sub_category_select_add_product_page_edit").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#sub_category_select_add_product_page_edit").val(ui.item.label);
            $("#sub_category_select_add_product_page_id_edit").val(ui.item.id);
            return false;
        },
    }).autocomplete("instance")._renderItem = function (ul, item) {

        return $("<li>")
                .append("<div>" + item.label+ "</div>")
                .appendTo(ul);
    };
});



///////////////////////////////  Stock In Entry Form //////////////////////////////////////////////

$(function () {
    $("#product_code_stock_in_form").autocomplete({
        minLength: 0,
        source: function (request, response) {
              var search_key = request.term;
              var is_code = /^-?\d/.test(search_key);
              if(is_code){
                  //search with Product Code
                  var url ='/api/autocompleteProCode/'+ search_key;
              }else{
                   //search with Product Name
                  var url ='/api/autocompleteProName/'+ search_key;
              }
              
            $.ajax({
                type: 'GET',
                url: url,
                dataType: "json",
                cache: false,
                success: function (data_product_info) {
                    response($.map(data_product_info, function (item) {
                        return {
                            code:item.Product_Code,
                            description:item.Product_Description,
                            name:item.Product_Name,
                            serialized: item.Serialized_Nonserialized,
                            id: item.id
                        };
                    }));

                    $("#product_code_stock_in_form").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#product_code_stock_in_form").val(ui.item.name);
            $("#product_code_stock_in_form").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#product_code_stock_in_form").val(ui.item.code);
            $("#product_code_stock_in_name").val(ui.item.name);
            $("#product_code_stock_in_name1").val(ui.item.name); 
            $("#product_id").val(ui.item.id)
            var serialized = ui.item.serialized;
            if(serialized === 0){
                $("#serialized_value").html('<input type="checkbox" name="your-group" value="" checked="true" /> Non Serialized');
                $("#stock_quantity_stockIn").prop( "disabled", true );
            }else{
                $("#serialized_value").html('<input type="checkbox" name="your-group" value="" checked="true" /> Serialized');
                $("#stock_quantity_stockIn").prop( "disabled", false );
             }
            
            $("#product_desc_stock_in").html(ui.item.description);
            
            return false;
        },
    }).autocomplete("instance")._renderItem = function (ul, item) {

        return $("<li>")
                .append("<div>" + item.name+ "</div>")
                .appendTo(ul);
    };
});


///////////////////////////////  Stock In Edit Form //////////////////////////////////////////////



$(function () {
    $("#product_code_stock_in_edit_form").autocomplete({
        minLength: 0,
        source: function (request, response) {
            var search_key = request.term;
            var is_code = /^-?\d/.test(search_key);
            if (is_code) {
                //search with Product Code
                var url = '/api/autocompleteProCode/' + search_key;
            } else {
                //search with Product Name
                var url = '/api/autocompleteProName/' + search_key;
            }

            $.ajax({
                type: 'GET',
                url: url,
                dataType: "json",
                cache: false,
                success: function (data_product_info) {
                    response($.map(data_product_info, function (item) {
                        return {
                            code: item.Product_Code,
                            description: item.Product_Description,
                            name: item.Product_Name,
                            serialized: item.Serialized_Nonserialized,
                            id: item.id
                        };
                    }));

                    $("#product_code_stock_in_edit_form").css({
                        "background": "url(/public/admin/dist/img/Preloader_2.gif) no-repeat center center",
                        "z-index": "1000"
                    });
                },
            });
        },
        focus: function (event, ui) {
            $("#product_code_stock_in_edit_form").val(ui.item.name);
            $("#product_code_stock_in_edit_form").css({
                "background": "#fff"
            });
            return false;
        },
        select: function (event, ui) {
            $("#product_code_stock_in_edit_form").val(ui.item.code);
            $("#product_code_stock_in_edit_name").val(ui.item.name);
            $("#product_edit_id").val(ui.item.id);
            var serialized = ui.item.serialized;
            if (serialized === 0) {
                $("#serialized_edit_value").html('<input type="checkbox" name="your-group" value="" checked="true" /> Non Serialized');
                $("#stock_quantity_edit_stockIn").prop("disabled", true);
            } else {
                $("#serialized_edit_value").html('<input type="checkbox" name="your-group" value="" checked="true" /> Serialized');
                $("#stock_quantity_edit_stockIn").prop("disabled", false);
            }

            $("#product_desc_stock_edit_in").html(ui.item.description);

            return false;
        },
    }).autocomplete("instance")._renderItem = function (ul, item) {

        return $("<li>")
                .append("<div>" + item.name + "</div>")
                .appendTo(ul);
    };
});