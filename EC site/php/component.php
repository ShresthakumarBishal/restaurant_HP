<?php
$element="";
   function component($productname, $productprice, $productimg, $productid) {
    $element = "
            <div class=\"col-4\">
                  <a href='productdetails.php?id=$productid'><img src=\"$productimg\" alt=\"me\"></a>
                  <h4>Rs $productprice</h4>
                  <form>
                 <input type='hidden' name='product_id' value='$productid'>
                 </form>
                 
            </div>
    ";
    return $element;
   }

   function cart($productname, $productprice, $productimg, $productid) {
        $element = "
                <div class=\"col-4\">
                <a href='productdetails.php'><img src=\"$productimg\" alt=\"me\"></a>
                      <h4>$productname</h4>
                     <p>rps $productprice</p>
                     <form action=\"cart.php?action=remove&id=$productid\" method='POST'>
                     <button type='submit' name='remove'>Delete</button>
                     <input type='hidden' name='product_id' value='$productid'>
                     </form>
                     
                </div>
        ";
        return $element;
       }

       function delete($productprice, $productimg, $productid) {
        $element = "
                <div class=\"col-4\">
                <a href='productdetails.php?id=$productid'><img src=\"$productimg\" alt=\"me\"></a>
                     <p>rps $productprice</p>
                     <form action='deletefile.php' method='POST'>
                     <button type='submit' name='remove'>Delete</button>
                     <input type='hidden' name='product_id' value='$productid'>
                     </form>
                     
                </div>
        ";
        return $element;
       }

       
       function productdetails($productname, $productprice, $productimg, $productimg1, $productimg2, $productimg3, $productid, $view) {
        $element = "
  
        <div class=\"small-contanier single-product\">
             <div class=\"row\">
                 <div class=\"col-2\">
                     <img src=\"$productimg\" width=\"100%\" id=\"ProductImg\">
                     <div class=\"col\">
                     <a class=\"prev\" onclick=\"plusSlides(-1)\">❮</a>
                     <a class=\"next\" onclick=\"plusSlides(1)\">❯</a>
                     </div>
                     <div class=\"small-img-row\">
                        <div class=\"small-img-col\">
                        <img src=\"$productimg\" onclick=\"side(this)\" alt=\"bishal\" width=\"100%\" class=\"small-img\">
                        </div>
                        <div class=\"small-img-col\">
                            <img src=\"$productimg1\" onclick=\"side(this)\" alt=\"bishal\"  width=\"100%\" class=\"small-img\">
                        </div>
                        <div class=\"small-img-col\">
                            <img src=\"$productimg2\" onclick=\"side(this)\" alt=\"bishal\" width=\"100%\" class=\"small-img\">
                        </div>
                        <div class=\"small-img-col\">
                            <img src=\"$productimg3\" onclick=\"side(this)\" alt=\"bishal\" width=\"100%\" class=\"small-img\">
                        </div>

                   </div>

    
                 </div>
                 <div class=\"col-2\">
                     <p>Home/$productname  views: $view</p>
                     <h2>$productname</h2>
                     <h4>Price: Rps $productprice</h4>
                     
                     <select>
                         <option>select size</option>
                         <option>XXL</option>
                         <option>Small</option>
                     </select>
                     <input type=\"number\" value=\"1\">
                     <a href='' class=\"btn\">Add to Card</a><br>
                     <h3>Product Details</h3>
                     <p>hugf huuhreth huerhuehuyurt ba hrew wehuew ufgewyr vbbpiruyr uw uwertyr </p>
                     </div>
                    </div>
                 
             </div>
        </div>
        ";
        return $element;
       }

       function category() {
        //-----example Featured categories--
         $element="<div class=\"categories\">
            <div class=\"small-contanier\">
                <h2>categories</h2>
            <div class=\"row\">
                <div class=\"col-3\">
                   <img src=\"image/mobile.png\" alt=\"me\">
                </div>
                <div class=\"col-3\"> <img src=\"image/shoes.png\" alt=\"me\"></div>
                <div class=\"col-3\"> <img src=\"image/wrist-watch.jpg\" alt=\"me\"></div>
                <div class=\"col-3\"> <img src=\"image/wrist-watch.jpg\" alt=\"me\"></div>
                <div class=\"col-3\"> <img src=\"image/wrist-watch.jpg\" alt=\"me\"></div>
                
            </div>
            <a class=\"prev\" onclick=\"plusSlides(-1)\">&#10094;</a>
            <a class=\"next\" onclick=\"plusSlides(1)\">&#10095;</a>
            </div>
        </div>
        ";
        return $element;
     }

?>