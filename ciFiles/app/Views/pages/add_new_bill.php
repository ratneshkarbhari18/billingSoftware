<main class="page-content" id="add-new-invoice">

    <div class="container" style="width: 90%;">

        <a style="margin: 2% 0;" href="<?php echo site_url(); ?>" class="btn">BACK TO DASHBOARD</a>
        <h4 class="page-title">Create New Bill</h4>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>
    
        <form action="<?php echo site_url('create-bill-and-download'); ?>" method="post" id="invoice-create-form" enctype="multipart/form-data">

            <div class="">
                <label for="payee_name">Payee Name</label>
                <input type="text" name="payee_name" id="payee_name" required>
            </div>
           

            <div class="">
                <label for="bill_code">Bill Code</label>
                <input type="text" value="<?php echo date('d-m-y').'-'.uniqid(); ?>" name="bill_code" id="bill_code" readonly>
            </div>


            <div class="row">
                <div class="col l6 m12 s12" style="margin: 0; padding: 0;">
                    <label for="payee_email">Payee Email</label>
                    <input type="email" name="payee_email" id="payee_email" required>
                </div>
                <div class="col l6 m12 s12" style="margin: 0; padding: 0;">
                    <label for="payee_mobile_number">Payee Contact Number</label>
                    <input type="text" name="payee_mobile_number" id="payee_mobile_number" required>
                </div>
                <div class="col l12 m12 s12" style="margin: 0; padding: 0;">
                    <label for="payee_address">Payee Address</label>
                    <textarea name="payee_address" id="payee_address" class="materialize-textarea"></textarea>
                </div>
            </div>

            <div id="invoice-items">

                <div class="invoice-item row">

                    <div class="col l3 m12 s12">
                        <label for="item-0">Item</label>
                        <select name="items[]" item-pos="0" id="item-0" class="browser-default changer">
                            <?php foreach($items as $item): ?>
                            <option value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-price-0">Price</label>
                        <input type="text" name="items-prices[]"  value="<?php echo $items[0]["price"]; ?>" id="item-price-0" readonly>
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-price-with-gst-0">Price with GST</label>
                        <input  type="text"  name="items-prices-with-gst[]" value="<?php echo $price_with_gst = (($items[0]["gst"]*0.001)*$items[0]["price"])+$items[0]["price"]; ?>" id="item-price-with-gst-0" readonly>
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-qty-0">Qty.</label>
                        <input type="number" item-pos="0" class="changer" name="item-qty[]" min="1" value="1" id="item-qty-0">
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-total-0">Total</label>
                        <input type="number" name="item-total[]" class="item-cost-total" value="<?php echo $price_with_gst; ?>" id="item-total-0" readonly>
                    </div>
                </div>

            </div>
            <center>
            <button type="button" class="btn" id="add-item-button">+</button>
            </center>

            <div class="row" style="margin: 3% 0;">
            
                <div class="col l6 m6 s12 center" style="margin: 2% 0;">
                                
                    <button type="button" id="calculate-grand-total-prod-cost-trigger" class="btn">Calculate Grand total Prod Cost:</button>
                
                </div>
                <div class="col l6 m6 s12 right" style="margin: 2% 0;">
                    <!-- <label for="grand-total-prod-cost">Rs.</label> -->
                    <input type="text" name="grand-total-prod-cost" id="grand-total-prod-cost" value="0.00" readonly>
                
                </div>

                





            </div>

            <center>
        <button style="margin: 5% 0;" type="submit" class="btn"  id="create_download_invoice">CREATE AND DOWNLOAD BILL</button>
        </center>            

        
        </form>

                


    </div>

</main>

<script>


    // Add new invoice item
    let currenLatesttInvoiceItemPos = 1;
    $("form#invoice-create-form").on('click',"button#add-item-button",function(){
        $("div#invoice-items").append("<div class='invoice-item row'> <div class='col l3 m12 s12'> <label for='item-"+currenLatesttInvoiceItemPos+"'>Item</label> <select name='items[]' item-pos='"+currenLatesttInvoiceItemPos+"' id='item-"+currenLatesttInvoiceItemPos+"' class='browser-default changer'> <?php foreach($items as $item): ?> <option value='<?php echo $item['id']; ?>'><?php echo $item['title']; ?></option> <?php endforeach; ?> </select> </div><div class='col l2 m12 s12'> <label for='item-price-"+currenLatesttInvoiceItemPos+"'>Price</label> <input type='text' name='items-prices[]' value='<?php echo $items[0]['price']; ?>' id='item-price-"+currenLatesttInvoiceItemPos+"' readonly> </div><div class='col l2 m12 s12'> <label for='item-price-with-gst-"+currenLatesttInvoiceItemPos+"'>Price with GST</label> <input type='text' name='items-prices-with-gst[]' value='<?php echo $price_with_gst=(($items[0]['gst']*0.001)*$items[0]['price'])+$items[0]['price']; ?>' id='item-price-with-gst-"+currenLatesttInvoiceItemPos+"' readonly> </div><div class='col l2 m12 s12'> <label for='item-qty-"+currenLatesttInvoiceItemPos+"'>Qty.</label> <input type='number' item-pos='"+currenLatesttInvoiceItemPos+"' class='changer' name='item-qty[]' min='1' value='1' id='item-qty-"+currenLatesttInvoiceItemPos+"'> </div><div class='col l2 m12 s12'> <label for='item-total-"+currenLatesttInvoiceItemPos+"'>Total</label> <input type='number' name='item-total[]' value='<?php echo $price_with_gst; ?>' class='item-cost-total' id='item-total-"+currenLatesttInvoiceItemPos+"' readonly> </div></div>");
        currenLatesttInvoiceItemPos++;
    });

    function roundKaro(value, precision) {
        var aPrecision = Math.pow(10, precision);
        return Math.round(value*aPrecision)/aPrecision;
    }

    /* Pulling item data and calculating total production cost with cloth and prod cost.*/
    $("div#invoice-items").on('change','.changer',function (e) { 
        e.preventDefault();
        let itemPos = $(this).attr('item-pos');
        let itemId = $("select#item-"+itemPos).val();
        let itemQty = $("input#item-qty-"+itemPos).val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('fetch-item-price-exe-api'); ?>",
            data: {
                item_id : itemId,
            },
            success: function (response) {
                let parsedResponse = JSON.parse(response);
                let price = parseFloat(parsedResponse.price);
                $("input#item-price-"+itemPos).val(price);
                let itemQty = parseInt($("input#item-qty-"+itemPos).val());
                let gstPercent = parseFloat(parsedResponse.gst);
                let priceWithGst = parseFloat(((gstPercent/100)*price)+price);
                $("input#item-price-with-gst-"+itemPos).val(priceWithGst);
                totalProdCostCal = itemQty*priceWithGst;
                totalProdCostCal = roundKaro(totalProdCostCal,2);
                $("input#item-total-"+itemPos).val(totalProdCostCal);
            }
        });
    });

    // Caclulating grand total
    $("button#calculate-grand-total-prod-cost-trigger").click(function (e) { 
        e.preventDefault();
        let allTotalProdCosts = document.getElementsByClassName('item-cost-total');
        let grandProdTotal = 0.00;
        for (let index = 0; index < allTotalProdCosts.length; index++) {
            let prodCost = allTotalProdCosts[index].value;
            grandProdTotal = roundKaro(parseFloat(grandProdTotal)+parseFloat(prodCost),2);
        }
        $("input#grand-total-prod-cost").val(grandProdTotal);
    });

</script>