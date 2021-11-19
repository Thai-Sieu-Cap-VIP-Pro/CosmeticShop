@extends('admin_layout')
@section('admin_content')
<div class="x_panel">
    <div class="x_title">
        <h2 class="admin_part_heading abc">Thêm khuyến mãi mới</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
           
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{URL::to('/update-discount/'.$edit_discount->discount_id)}}">
                {{ csrf_field() }}
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_product_name" >Tên khuyến mãi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="first-name" required="required" class="form-control " name="discount_name" value="{{$edit_discount->discount_name}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mô tả khuyến mãi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea id="first-name" required="required" class="form-control " cols="30" rows="5" name="discount_desc">{{$edit_discount->discount_desc}}</textarea>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_product_name">Phần trăm <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="first-name" required="required" class="form-control " name="discount_percent" value="{{$edit_discount->discount_percent}}">
                </div>
            </div>
            <div class="form-group item">
                <label class="control-form-label col-md-3 col-sm-3 label-align" >Danh mục</label>
                <div class="col-md-6 col-sm-6 ">
                    <select name="category_id" class="form-control">

                        @foreach($danhmuc as $key =>$muc)
                            <option value="{{$muc->category_id}}" {{ $muc->category_id== $edit_discount->discount_category ? 'selected' : '' }} >{{$muc->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tình trạng</label>
                <div class="col-md-6 col-sm-6 ">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="category_product_status" value="0" class="join-btn" checked >  &nbsp; Ẩn &nbsp;
                        </label>
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="category_product_status" value="1" class="join-btn" > Hiện
                        </label>
                    </div>
                </div>
            </div> --}}
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <a class="btn btn-primary" href="{{URL::to('/show-discount')}}" type="button">Danh sách khuyến mãi</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection