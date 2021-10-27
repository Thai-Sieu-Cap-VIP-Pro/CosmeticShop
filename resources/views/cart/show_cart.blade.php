@extends('frontLayout')
@section('frontEndContent')
<div class="row cart">
    <div class="col-md-12">
        <div class="table_desc">
            <div class="cart_page table-responsive">
                <table>
            <thead>
                <tr>
                    <th class="product_remove">Xóa</th>
                    <th class="product_thumb">Hình ảnh</th>
                    <th class="product_name">Tên sản phẩm</th>
                    <th class="product-price">Giá</th>
                    <th class="product_quantity">Số lượng</th>
                    <th class="product_total">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <td class="product_remove"><a href="#"><i class="fas fa-trash"></i></a></td>
                    <td class="product_thumb"><a href="#"><img src="{{('public/frontEnd/images/pr3.png')}}" alt=""  class="cart_img_product"></a></td>
                    <td class="product_name"><a href="#">Kem dưỡng trắng</a></td>
                    <td class="product-price">200.000đ</td>
                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                    <td class="product_total">200.000đ</td>


                </tr>

                <tr>
                   <td class="product_remove"><a href="#"><i class="fas fa-trash"></i></a></td>
                    <td class="product_thumb"><a href="#"><img src="{{('public/frontEnd/images/pr4.jpg')}}" alt=""  class="cart_img_product"></a></td>
                    <td class="product_name"><a href="#">Dimond White</a></td>
                    <td class="product-price">200.000đ</td>
                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                    <td class="product_total">200.000đ</td>


                </tr>
                <tr>
                   <td class="product_remove"><a href="#"><i class="fas fa-trash"></i></a></td>
                    <td class="product_thumb"><a href="#"><img src="{{('public/frontEnd/images/pr5.jpg')}}" alt="" class="cart_img_product"></a></td>
                    <td class="product_name"><a href="#">Kem trắng da</a></td>
                    <td class="product-price">200.000đ</td>
                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                    <td class="product_total">200.000đ</td>
                </tr>

            </tbody>
        </table>   
            </div>  
            <div class="cart_submit">
                <button type="submit">Cập nhật giỏ hàng</button>
            </div>      
        </div>
     </div>
    <div class="col-lg-6 col-md-6">
        <div class="coupon_code">
            <h3>Tổng tiền hóa đơn</h3>
            <div class="coupon_inner">
               <div class="cart_subtotal">
                   <p>Tổng tiền sản phẩm</p>
                   <p class="cart_amount">600.000đ</p>
               </div>
               <div class="cart_subtotal ">
                   <p>Giảm giá</p>
                   <p class="cart_amount">00.000đ</p>
               </div>
               <div class="cart_subtotal">
                   <p>Tổng tiền</p>
                   <p class="cart_amount">600.000đ</p>
               </div>
               <div class="checkout_btn">
                   <a href="#">Tiến hành thanh toán</a>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection