@extends('admin_layout')
@section('admin_content')
<div class="x_panel">
    <div class="x_title">
      <h2>Danh sách sản phẩm</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action table_product_admin">
          <thead>
            <tr class="headings">
              <th class="column-title">STT</th>
              <th class="column-title">Tên sản phẩm </th>
              <th class="column-title">Ảnh sản phẩm </th>
              <th class="column-title">Danh mục </th>
              <th class="column-title">Nhãn hiệu </th>
              <th class="column-title">Nhà cung cấp </th>
              <th class="column-title">Giá bán </th>
              <th class="column-title">Số lượng </th>
              <th class="column-title">Trạng thái </th>
              <th class="column-title">Hành động </th>
            </tr>
          </thead>

          <tbody>
          <?php $i =0 ; ?>
        @foreach ($all_product as $keyProduct => $eachProduct)
        <tr>
          <th scope="row">{{++$i}}</th>
          <td>{{$eachProduct->product_name}}</td>
          <td><img src="public/backEnd/images/{{$eachProduct->product_img}}" height="100" width="100"</td>
          
          <td>{{$eachProduct->category_name}}</td>
          <td>{{$eachProduct->brand_name}}</td>
          <td>{{$eachProduct->supplier_name}}</td>
          <td>{{$eachProduct->product_price}}</td>
          <td>{{$eachProduct->product_quanity}}</td>
          <td align="center">
          <?php
          if ($eachProduct->product_status == 0){ ?>
         <a href="{{URL::to('/display-product/'.$eachProduct->product_id)}}"><button class="btn btn-danger btn-sm">Ẩn</button></a>
         <?php }else { ?>
          <a href="{{URL::to('/undisplay-product/'.$eachProduct->product_id)}}"><button class="btn btn-success btn-sm">Hiện</button></a>
           <?php  } ?>
         </td>
          <td>
            <a href="{{URL::to('/edit-product/'.$eachProduct->product_id)}}" class="btn btn-sm btn-primary">Sửa</a>
            <a href="{{URL::to('/delete-product/'.$eachProduct->product_id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm {{$eachProduct->product_name}} không?')">Xóa</a>
          </td>
        </tr>
        @endforeach
            <!-- <tr class=" pointer">
    
              <td> 1</td>
              <td> Kem trắng da</td>
              <td id="img_product_admin">
                  <img src="{{('public/frontEnd/images/pr2.jpg')}}" width="80" alt="">
              </td>
              <td> Về Da</td>
              <td> Daimond</td>
              <td class="a-right a-right ">200.000đ</td>
              <td> Daimond</td>
              <td> Ẩn hiện</td>
              <td class=" last">
                  <a href="" class="btn btn-primary btn-sm">Sửa</a>
                  <a href="" class="btn btn-danger btn-sm">Xóa</a>

              </td>
            </tr>
            <tr class=" pointer">
            
                <td class=" ">1</td>
                <td class=" ">Kem trắng da</td>
                <td id="img_product_admin">
                    <img src="{{('public/frontEnd/images/pr3.png')}}" width="80" alt="">
                </td>
                <td class=" ">Về Da</td>
                <td class=" ">Daimond</td>
                <td class="a-right a-right ">200.000đ</td>
                <td class=" ">Daimond</td>
                <td class=" ">Ẩn hiện</td>
                <td class=" last">
                    <a href="" class="btn btn-primary btn-sm">Sửa</a>
                    <a href="" class="btn btn-danger btn-sm">Xóa</a>
  
                </td>
              </tr> -->
          </tbody>
        </table>
        <a href="{{URL::to('/add-product-admin')}}" class="btn btn-success">Thêm sản phẩm mới</a>
      </div>
              
          
    </div>
  </div>
@endsection