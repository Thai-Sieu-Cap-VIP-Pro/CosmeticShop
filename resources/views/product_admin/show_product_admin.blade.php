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
    <?php
      $message = Session::get('message');
      if ($message)
      {
        ?>
            <div class="alert alert-success" role="alert">
             <?php echo $message; ?>
             <i class="fa fa-times"></i>
            </div>
        <?php
        Session::put('message','');
      }
    ?>
    <!-- <div class="search_box">
          <form action="">
            {{ csrf_field() }}
            <input type="text" placeholder="Tìm kiếm..." name="tukhoaproduct">
            <button type="submit" name="search-items" value="Tìm kiếm sản phẩm"><i class="fa fa-search"></i></button>
          </form>
      </div> -->
    <div class="row">
            <label for="amount"> Sắp xếp theo</label>
            <form id="form-sort">
            {{ csrf_field() }}
                <select name="sort_by" id="sort" class="form-control" form="form-sort">
                    <option value="none">--Lọc--</option>
                    <option value="tang_dan">--Giá tăng dần--</option>
                    <option value="giam_dan">--Giá giảm dần--</option>
                    <option value="kytu_az">Lọc theo tên A đến Z</option>
                    <option value="kytu_za">Lọc theo tên Z đến A</option>
                </select>
            </form>
        </div>
      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action table_product_admin">
          <thead>
            <tr class="headings">
              <th class="column-title">STT</th>
              <th class="column-title">Tên sản phẩm</th>
              <th class="column-title">Thư viện hình ảnh</th>
              <th class="column-title">Ảnh</th>
              <th class="column-title">Danh mục</th>
              <th class="column-title">Nhãn hiệu</th>
              <th class="column-title">Nhà cung cấp</th>
              <th class="column-title">Giá bán</th>
              <th class="column-title">Số lượng</th>
              <th class="column-title">Trạng thái sản phẩm</th>
              <th class="column-title">Trạng thái</th>
              <th class="column-title">Hành động </th>
            </tr>
          </thead>

          <tbody>
          <?php $i =0 ; ?>
          @foreach ($all_product as $keyProduct => $eachProduct)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$eachProduct->product_name}}</td>
            <td><a href="{{URL::to('add-gallery/'.$eachProduct->product_id)}}">Thư viện ảnh</a></td>
            <td><img src="{{asset('public/backEnd/images/'.$eachProduct->product_img)}}" height="100" width="100"</td>           
            <td>{{$eachProduct->category_name}}</td>
            <td>{{$eachProduct->brand_name}}</td>
            <td>{{$eachProduct->supplier_name}}</td>
            <td>{{number_format($eachProduct->product_price).' vnđ'}}</td>
            <td>{{$eachProduct->product_quanity}}</td>
            <td align="center">
            <?php
            if ($eachProduct->product_state == 0){ ?>
            <a href="{{URL::to('/state-product/'.$eachProduct->product_id)}}"><button class="btn btn-danger btn-sm">Ẩn</button></a>
            <?php }else { ?>
              <a href="{{URL::to('/unstate-product/'.$eachProduct->product_id)}}"><button class="btn btn-success btn-sm">Hiện</button></a>
              <?php  } ?>
            </td>
            <td align="center">
              <?php
              if ($eachProduct->product_status == 0){ ?>
            <a href="{{URL::to('/status-product/'.$eachProduct->product_id)}}"><button class="btn btn-danger btn-sm">Hết</button></a>
            <?php }else { ?>
              <a href="{{URL::to('/unstatus-product/'.$eachProduct->product_id)}}"><button class="btn btn-success btn-sm">Còn</button></a>
              <?php  } ?>
            </td>
              
            <td>
              <a href="{{URL::to('/edit-product/'.$eachProduct->product_id)}}" class="btn btn-sm btn-primary">Sửa</a>
              <a href="{{URL::to('/delete-product/'.$eachProduct->product_id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa nhãn hiệu {{$eachProduct->product_name}} không?')">Xóa</a>
            </td>
          </tr>
        @endforeach
          </tbody>
        </table>
        <a href="{{URL::to('/add-product-admin')}}" class="btn btn-success">Thêm sản phẩm mới</a>
      </div>
              
          
    </div>
  </div>
@endsection