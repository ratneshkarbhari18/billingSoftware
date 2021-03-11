<main class="page-content" id="add-new-invoice">

    <div class="container" style="width: 90%;">

        <a style="margin: 2% 0;" href="<?php echo site_url(); ?>" class="btn">BACK TO DASHBOARD</a>
        <h4 class="page-title">Create New Bill</h4>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>
    
        <form action="<?php echo site_url('create-invoice-and-download'); ?>" method="post" id="invoice-create-form" enctype="multipart/form-data">

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
                        <select name="items[]" id="item-0" class="browser-default changer">
                            <?php foreach($items as $item): ?>
                            <option value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-price-0">Price</label>
                        <input type="text" name="items-prices[]" value="<?php echo $items[0]["price"]; ?>" id="item-price-0" readonly>
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-price-with-gst-0">Price with GST</label>
                        <input type="text" name="items-prices-with-gst[]" value="<?php echo $price_with_gst = (($items[0]["gst"]*0.001)*$items[0]["price"])+$items[0]["price"]; ?>" id="item-price-with-gst-0" readonly>
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-qty-0">Qty.</label>
                        <input type="number" class="changer" name="item-qty[]" min="1" value="1" id="item-qty-0">
                    </div>
                    <div class="col l2 m12 s12">
                        <label for="item-total-0">Total</label>
                        <input type="number" name="item-total[]" value="<?php echo $price_with_gst; ?>" id="item-total-0" readonly>
                    </div>
                </div>

            </div>
            <center>
            <button type="button" class="btn" id="add-item">+</button>
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


    Add new invoice item
    let currenLatesttInvoiceItemPos = 1;
    $("form#invoice-create-form").on('click',"button#add-item",function(){
        $("div#invoice-items").append('');
        currenLatesttInvoiceItemPos++;
    });

    // function roundKaro(value, precision) {
    //     var aPrecision = Math.pow(10, precision);
    //     return Math.round(value*aPrecision)/aPrecision;
    // }

    /* Pulling item data and calculating total production cost with cloth and prod cost.*/
    // $("div#invoice-items").on('change','.invoice-item .cost-changer',function (e) { 
    //     e.preventDefault();
    //     let itemPos = $(this).attr('item-pos');
    //     let itemId = $("select#item-"+itemPos).val();
    //     let itemSize = $("select#size-"+itemPos).val();
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo site_url('fetch-costs-and-cloth-reqd'); ?>",
    //         data: {
    //             item_id : itemId,
    //             item_size : itemSize
    //         },
    //         success: function (response) {
    //             let parsedResponse = JSON.parse(response);
    //             let prodCost = parseFloat(parsedResponse.production_cost);
    //             $("input#prod-cost-"+itemPos).val(prodCost);
    //             let clothReqd = parseFloat(parsedResponse.cloth_reqd);
    //             $("input#cloth-reqd-"+itemPos).val(clothReqd);
    //             let itemQty = parseInt($("input#qty-"+itemPos).val());
    //             let clothCost = parseFloat($("input#cloth-cost-"+itemPos).val());
    //             let totalProdCostCal = (prodCost+(clothReqd*clothCost))*itemQty;
    //             totalProdCostCal = totalProdCostCal+(0.25*totalProdCostCal);
    //             totalProdCostCal = roundKaro(totalProdCostCal,2);
    //             $("input#total-prod-cost-"+itemPos).val(totalProdCostCal);
    //         }
    //     });
    // });

    // Caclulating grand total
    // $("button#calculate-grand-total-prod-cost-trigger").click(function (e) { 
    //     e.preventDefault();
    //     let allTotalProdCosts = document.getElementsByClassName('total-prod-costs');
    //     let grandProdTotal = 0.00;
    //     for (let index = 0; index < allTotalProdCosts.length; index++) {
    //         let prodCost = allTotalProdCosts[index].value;
    //         grandProdTotal = parseFloat(grandProdTotal)+parseFloat(prodCost);
    //     }

    //     $("input#grand-total-prod-cost").val(grandProdTotal);
    // });

    // Calculating final price with GSt and margin
    // $("button#calculate-final-price-with-gst-margin").click(function(){
    //     let grandTotalProdCost = $("input#grand-total-prod-cost").val();
    //     let grandTotalPriceWithGstMargin = parseFloat(grandTotalProdCost) + parseFloat(grandTotalProdCost)*0.05;
    //     grandTotalPriceWithGstMargin = roundKaro(grandTotalPriceWithGstMargin,2);
    //     $("input#final-price-with-gst-margin").val(grandTotalPriceWithGstMargin);
    // });

</script>