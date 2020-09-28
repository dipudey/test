$(document).ready(function() {
    var count = 0;
    $('body').on('click',"#add",function() {

        // product list 
        let product = "";
        $.ajax({
            url: '/admin/product/all/json',
            method: 'get',
            dataType: 'json',
            async: false,
            success: function(data) {

                let html = ""
                html += "<option value=''>Select Product</option>"
                data.forEach(element => {
                    html += `<option value="${element.id}">${element.name} >> stock in (${element.quantity})</option>`
                })
                
                product = html;
            }
        })

        count++;

        var html = '';
        html += '<tr>';
        html += `<td><select class="form-control" id="product_list" name="product_id[]" data-price_id="${count}">${product}</select></td>`;
        html += `<td><input type="number" name="quantity[]" class="form-control quantityAdd${count}" id="quantityAdd" data-total_amount_id="${count}" disabled/></td>`;
        html += `<td><input type="text" name="price[]" class="form-control" id="price${count}" readonly/></td>`;
        html += `<td><input type="text" name="total[]" class="form-control total" value="0" id="totalPrice${count}" readonly/></td>`;
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span>-</button></td></tr>';
        $('#item_table').append(html);
    })



    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
        $("#add_total_amount").text(sum())
        $("#add_total_amount_input").val(sum())

        sumbitButton();

    });

    $(document).on('input',"#quantityAdd",function(e) {
        let total_amount_id = $(this).data('total_amount_id')
        let price = $(`#price${total_amount_id}`).val()
        let val = e.target.value
        let total_price = val * price 
        $(`#totalPrice${total_amount_id}`).val(total_price)

        $("#add_total_amount").text(sum())
        $("#add_total_amount_input").val(sum())

        sumbitButton()

        
    })

    $(document).on('change','#product_list',function(){
        let price_id = $(this).data('price_id')
        let product_id = $(this).val()
        
        $(`.quantityAdd${price_id}`).removeAttr('disabled')

        $(this).attr('readonly',true)
        

        $.ajax({
            url: `/admin/product/price/${product_id}/json`,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $(`#price${price_id}`).val(data)
            }
        })


    })



    // budget data 
    $(document).on('input',"#budget",function(e) {
        let val = e.target.value
        $("#add_budget").text(val)
    })



    // total Amount 
    function sum(){
        var total = 0;
        $('tr').each(function() {
            $(this).find('.total').html($('input:eq(0)', this).val() * $('input:eq(1)', this).val());
        });
        $('.total').each(function() {
            total += parseInt($(this).text(),10);
        });
        return total
    }


    function sumbitButton() {
        let budget = $("#budget").val()
        let total_amount = $("#add_total_amount_input").val()

        if (budget < sum()) {
             $("#alert").text("Your Total Amount Is High To Your Budget")
             $("#submitbutton").attr('disabled',true)
        }

        if(budget > sum()) {
             $("#alert").text(" ")
             $("#submitbutton").removeAttr('disabled')
        }

        if(budget == sum()) {
             $("#alert").text(" ")
             $("#submitbutton").removeAttr('disabled')
        } 
        
    }


    
    
})