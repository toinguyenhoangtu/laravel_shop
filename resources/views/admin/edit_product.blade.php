@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬT SẢN PHẨM
                </header> <?php
$message = Session::get('message');
if ($message) {
    echo '<span class="text-alert">' . $message . '</span>';
    Session::put('message', null);
}
?>
                <div class="panel-body">
                    @foreach ($edit_product as $key => $pro)
                        <div class="position-center">
                            <form role="form" action="{{ URL::to('/update-product/' . $pro->product_id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control"
                                        value="{{ $pro->product_name }}" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá sản phẩm</label>
                                    <textarea style="resize: none" rows="5" class="form-control" type="text"
                                        name="product_price" class="form-control"
                                        id="exampleInputPassword1">{{ $pro->product_price }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{ URL::to('public/upload/product/' . $pro->product_image) }}"
                                        height="100px" width="100px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" class="form-control" type="text"
                                        name="product_desc" class="form-control"
                                        id="exampleInputPassword1">{{ $pro->product_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5" class="form-control" type="text"
                                        name="product_content" class="form-control"
                                        id="exampleInputPassword1">{{ $pro->product_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach ($cate_product as $key)
                                            @if ($key->category_id == $key->category_id)
                                                <option selected value="{{ $key->category_id }}">
                                                    {{ $key->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $pro->category_id }}">
                                                    {{ $key->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach ($brand_product as $key)
                                            @if ($key->brand_id == $key->brand_id)
                                                <option selected value="{{ $key->brand_id }}">
                                                    {{ $key->brand_name }}
                                                </option>
                                            @else
                                                <option value="{{ $pro->brand_id }}">
                                                    {{ $key->brand_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_product" class="btn btn-info">Cập
                                    nhật</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
@endsection
