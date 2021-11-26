@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ol>
            </div>
            <div class="review-payment">
                <h2>Xem lại đơn hàng</h2>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                /*  echo '<pre>';
                 print_r($content);                                                                                                                                                                                                              echo '</pre>'; */
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình sản phẩm</td>
                            <td class="description">Mô tả sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $all_content)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img
                                            src="{{ URL::to('public/upload/product/' . $all_content->options->image) }}"
                                            alt="image" width="100px" height="100px"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $all_content->name }}</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($all_content->price) . ' VNĐ' }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form method="post" action="{{ URL::to('/update-cart-quantity') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="rowId_cart" value="{{ $all_content->rowId }}"
                                                class="form-control">
                                            <input class="cart_quantity_input" type="number" name="cart_quantity"
                                                value="{{ $all_content->qty }}" autocomplete="off" size="2" min=1
                                                width="20px">
                                            &nbsp;
                                            <input type="submit" name="update_qty" value="Cập nhật"
                                                class="btn btn-success btn-sm">
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php
                                        $result = $all_content->price * $all_content->qty;
                                        echo number_format($result) . ' ' . 'VNĐ';
                                        ?>
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ URL::to('delete-to-cart/' . $all_content->rowId) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h4 style="margin:40px 0px; font-size:20px">Chọn hình thức thanh toán</h4>
            <div class="payment-options">
                <form method="POST" action="{{ URL::to('/order-place') }}">
                    {{ csrf_field() }}
                    <span>
                        <label><input type="checkbox" name="payment_options" value="1"> Thanh toán bằng thẻ ATM</label>
                    </span>
                    <span>
                        <label><input type="checkbox" name="payment_options" value="2"> Thanh toán bằng tiền mặt khi
                            nhận
                            hàng</label>
                    </span>
                    <input type="submit" name="send_order_place" value="Đặt hàng" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>
    <!--/#cart_items-->


@endsection
