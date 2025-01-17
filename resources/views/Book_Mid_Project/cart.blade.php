@extends('Book_Mid_Project._layout_2')
@section('content')


<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shop Single</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="#" class="h-primary">Home</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                <a href="#" class="h-primary">Shop</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Shop Single
            </nav>
        </div>
    </div>
</div>
<div class="site-content bg-punch-light overflow-hidden" id="content">
    <div class="container">
        <header class="entry-header space-top-2 space-bottom-1 mb-2">
            <h1 class="entry-title font-size-7">Your cart: {{count($data[1])}} items</h1>
        </header>
        <div class="row pb-8">
            <div id="primary" class="content-area">
                <main id="main" class="site-main ">
                    <div class="page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <form class="woocommerce-cart-form table-responsive" action="#" method="post">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-remove">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $totalCartPrice = 0
                                            @endphp
                                            @foreach ($data[1] as $key=> $book)
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-name" data-title="Product">
                                                    <div class="d-flex align-items-center">
                                                        <a href="#">
                                                            <img src="{{$book->BookSampleImage1}}" width="120px" height="150px" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                        </a>
                                                        <div class="ml-3 m-w-200-lg-down">
                                                            <a href="#">{{$book->Name}}</a>
                                                            <a href="#" class="text-gray-700 font-size-2 d-block" tabindex="0">{{$book->AuthorName}}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Taka </span>{{$book->Price}}</span>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity d-flex align-items-center">

                                                        <div class="border px-3 width-120">
                                                            <div class="js-quantity">
                                                                <div class="d-flex align-items-center">
                                                                    <label class="screen-reader-text sr-only">Quantity</label>
                                                                    <a class="js-minus text-dark" href="javascript:;">
                                                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="1px">
                                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z" />
                                                                        </svg> -->
                                                                    </a>

                                                                    <input type="number" readonly class="input-text qty text js-result form-control text-center border-0" step="1" min="1" max="100" name="quantity" value="{{$data[0][$key]->Quantity}}" title="Qty">


                                                                    <a class="js-plus text-dark" href="javascript:;">
                                                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px">
                                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z" />
                                                                        </svg> -->
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Taka </span>{{$data[0][$key]->Quantity * $book->Price}}</span>
                                                    @php
                                                    $totalCartPrice = $totalCartPrice + $data[0][$key]->Quantity * $book->Price
                                                    @endphp
                                                </td>
                                                <td class="product-remove">
                                                    <a href="#" class="remove" aria-label="Remove this item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.011,13.899 L13.899,15.012 L7.500,8.613 L1.101,15.012 L-0.012,13.899 L6.387,7.500 L-0.012,1.101 L1.101,-0.012 L7.500,6.387 L13.899,-0.012 L15.011,1.101 L8.613,7.500 L15.011,13.899 Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" class="actions">

                                                    <input type="submit" class="button" name="update_cart" value="Update cart">
                                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="db025d7a70"><input type="hidden" name="_wp_http_referer" value="/storefront/cart/">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
            <div id="secondary" class="sidebar cart-collaterals order-1" role="complementary">
                <div id="cartAccordion" class="border border-gray-900 bg-white mb-5">
                    <!-- <div class="p-4d875 border">
                        <div id="cartHeadingOne" class="cart-head">
                            <a class="d-flex align-items-center justify-content-between text-dark" href="#" data-toggle="collapse" data-target="#cartCollapseOne" aria-expanded="true" aria-controls="cartCollapseOne">
                                <h3 class="cart-title mb-0 font-weight-medium font-size-3">Cart Totals</h3>
                                <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                </svg>
                                <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div id="cartCollapseOne" class="mt-4 cart-content collapse show" aria-labelledby="cartHeadingOne" data-parent="#cartAccordion">
                            <table class="shop_table shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>79.99</span>
                                        </td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <th>Shipping</th>
                                        <td data-title="Shipping">Free Shipping</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    <!-- <div class="p-4d875 border">
                        <div id="cartHeadingTwo" class="cart-head">
                            <a class="d-flex align-items-center justify-content-between text-dark" href="#" data-toggle="collapse" data-target="#cartCollapseTwo" aria-expanded="true" aria-controls="cartCollapseTwo">
                                <h3 class="cart-title mb-0 font-weight-medium font-size-3">Shipping</h3>
                                <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                </svg>
                                <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div id="cartCollapseTwo" class="mt-4 cart-content collapse show" aria-labelledby="cartHeadingTwo" data-parent="#cartAccordion">

                            <ul id="shipping_method">
                                <li>
                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method">
                                    <label for="shipping_method_0_flat_rate1">Free shipping</label>
                                </li>
                                <li>
                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" class="shipping_method" checked="checked">
                                    <label for="shipping_method_0_flat_rate2">Flat rate: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15</span></label>
                                </li>
                                <li>
                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate3" value="flat_rate:2" class="shipping_method" checked="checked">
                                    <label for="shipping_method_0_flat_rate3">Local pickup:: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>8</span></label>
                                </li>
                            </ul>

                            <span class="font-size-2">Shipping to Turkey.</span><a href="#" class="font-weight-medium h-primary ml-3 font-size-2">Change Address</a>
                        </div>
                    </div> -->
                    <!-- <div class="p-4d875 border">
                        <div id="cartHeadingThree" class="cart-head">
                            <a class="d-flex align-items-center justify-content-between text-dark" href="#" data-toggle="collapse" data-target="#cartCollapseThree" aria-expanded="true" aria-controls="cartCollapseThree">
                                <h3 class="cart-title mb-0 font-weight-medium font-size-3">Coupon</h3>
                                <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                </svg>
                                <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div id="cartCollapseThree" class="mt-4 cart-content collapse show" aria-labelledby="cartHeadingThree" data-parent="#cartAccordion">
                            <div class="coupon">
                                <label for="coupon_code">Coupon:</label>
                                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" autocomplete="off">
                                <input type="submit" class="button" name="apply_coupon" value="Apply coupon">
                            </div>
                        </div>
                    </div> -->
                    <div class="p-4d875 border">
                        <table class="shop_table shop_table_responsive">
                            <tbody>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount">{{$totalCartPrice}}</span> <span class="woocommerce-Price-currencySymbol"> Taka </span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="wc-proceed-to-checkout">
                    <a href="{{url('/book/checkout')}}" class="checkout-button button alt wc-forward btn btn-dark btn-block rounded-0 py-4">Proceed
                        to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('ready', function() {
        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // init zeynepjs
        var zeynep = $('.zeynep').zeynep({
            onClosed: function() {
                // enable main wrapper element clicks on any its children element
                $("body main").attr("style", "");

                console.log('the side menu is closed.');
            },
            onOpened: function() {
                // disable main wrapper element clicks on any its children element
                $("body main").attr("style", "pointer-events: none;");

                console.log('the side menu is opened.');
            }
        });

        // handle zeynep overlay click
        $(".zeynep-overlay").click(function() {
            zeynep.close();
        });

        // open side menu if the button is clicked
        $(".cat-menu").click(function() {
            if ($("html").hasClass("zeynep-opened")) {
                zeynep.close();
            } else {
                zeynep.open();
            }
        });
    });
</script>

@endsection