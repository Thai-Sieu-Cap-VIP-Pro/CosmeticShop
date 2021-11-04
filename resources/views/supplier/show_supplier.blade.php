@extends('admin_layout')
@section('admin_content')
<div class="x_panel">
    <div class="x_title">
      <h2 class="admin_part_heading">Danh sách nhà cung cấp</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
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
      <table class="table">
        <thead>
          <tr>
            <th>STT</th>
            <th style="width: 200px">Tên nhà cung cấp</th>
            <th>Quốc gia</th>
            <th style="width: 300px">Đặc điểm nhà cung cấp</th>
            <th >Tình trạng (nhấn để thay đổi)</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <?php $i =0 ; ?>
        @foreach ($all_supplier as $keysupplier => $eachsupplier)
        <tr>
          <th scope="row">{{++$i}}</th>
          <td>{{$eachsupplier->supplier_name}}</td>
          <td>{{$eachsupplier->supplier_country}}</td>
          <td>{{$eachsupplier->supplier_desc}}</td>
          <td align="center">
          <?php
          if ($eachsupplier->supplier_status == 0){ ?>
         <a href="{{URL::to('/display-supplier/'.$eachsupplier->supplier_id)}}"><button class="btn btn-danger btn-sm">Ẩn</button></a>
         <?php }else { ?>
          <a href="{{URL::to('/undisplay-supplier/'.$eachsupplier->supplier_id)}}"><button class="btn btn-success btn-sm">Hiện</button></a>
           <?php  } ?>
         </td>
          <td>
            <a href="{{URL::to('/edit-supplier/'.$eachsupplier->supplier_id)}}" class="btn btn-sm btn-primary">Sửa</a>
            <a href="{{URL::to('/delete-supplier/'.$eachsupplier->supplier_id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa nhà cung cấp {{$eachsupplier->supplier_name}} không?')">Xóa</a>
          </td>
        </tr>
        @endforeach
                
         
        </tbody>
      </table>
      <a href="{{URL::to('/add-supplier')}}" class="btn btn-primary">Thêm nhà cung cấp mới</a>
    </div>
  </div>
@endsection