@extends('frontLayout')
@section('frontEndContent')
<div class="row">
    @foreach ($profile as $key => $item)
    <div class="col-md-4">
        <?php
            $account_id = Session::get('account_id');
        ?>
        <div class="profile_image">
            <img src="{{URL::to('public/frontEnd/images/'.$item->account_avatar)}}" alt="">
        </div>
       <form action="{{URL::to('/update_profile/'.$account_id)}}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <label>Chọn ảnh đại diện</label>
        <input type="file" name="avartar" required> <br>
        <input type="submit" value="Cập nhật" class="btn-sm btn-primary">
    </form>
    </div>
    <div class="col-md-8">
       <div class="profile_content">
           <h4>THÔNG TIN CÁ NHÂN</h4>
       
           <p>Tên : {{$item->account_name}} </p>
           <p><i class="fas fa-phone"></i> {{$item->account_phone}}</p>
           <p> <i class="fas fa-envelope-square"></i> {{$item->account_email}}</p>
         
          
       </div>
    </div>
    @endforeach
</div>
@endsection

