@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬT THƯƠNG HIỆU SẢN PHẨM
                </header> <?php
$message = Session::get('message');
if ($message) {
    echo '<span class="text-alert">' . $message . '</span>';
    Session::put('message', null);
}
?>
                <div class="panel-body">
                    @foreach ($edit_brand_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{ URL::to('/update-brand-product/' . $edit_value->brand_id) }}"
                                method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" class="form-control"
                                        value="{{ $edit_value->brand_name }}" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="5" class="form-control" type="text"
                                        name="brand_product_desc" class="form-control"
                                        id="exampleInputPassword1">{{ $edit_value->brand_desc }}</textarea>
                                </div>
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập
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
