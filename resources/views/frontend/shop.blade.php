@extends('layouts.frontend')
@section('title', "Shop")
@section('frontend')
<!-- Start Shop Area  -->
<div class="axil-shop-area axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="axil-shop-sidebar">
                    <div class="d-lg-none">
                        <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="toggle-list product-categories active">
                        <h6 class="title">CATEGORIES</h6>
                        <div class="shop-submenu">
                            <ul>
                                @foreach ($categories as $category)
                                <li class="{{ request()->category == $category->slug ? 'current-cat' : '' }}"><a
                                        href="{{ request()->url(). " ?category=".$category->slug }}">{{
                                        $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- End .axil-shop-sidebar -->
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top mb--40">
                            <div
                                class="category-select align-items-center justify-content-lg-end justify-content-between">
                                <!-- Start Single Select  -->
                                {{-- <span class="filter-results">Showing 1-12 of 84 results</span> --}}
                                <select class="single-select" id="sortBy">
                                    <option value="latest">Sort by Latest</option>
                                    <option value="oldest">Sort by Oldest</option>
                                    <option value="name">Sort by Name</option>
                                    <option value="price">Sort by Price</option>
                                </select>
                                <!-- End Single Select  -->
                            </div>
                            <div class="d-lg-none">
                                <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i>
                                    FILTER</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .row -->
                <div class="row row--15">

                    @forelse ($products as $product)
                    <div class="col-xl-4 col-sm-6">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{ route('frontend.product.view', $product) }}">
                                    <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy"
                                        class="main-img" src="{{ asset('storage/'. $product->featured_img)}}"
                                        alt="Product Images">
                                    <img class="hover-img"
                                        src="{{ asset('storage/'. json_decode($product->gall_img)[0])}}"
                                        alt="Product Images">
                                </a>
                                @if ($product->selling_price && $product->selling_price > 0)
                                <div class="label-block label-right">
                                    <div class="product-badget"> {{ 100 - ((100 / $product->price) *
                                        $product->selling_price) }} % Off</div>
                                </div>
                                @endif

                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="index-1.html#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option">
                                            <a href="{{ route('frontend.product.view', $product) }}">
                                                Add to Cart
                                            </a>
                                        </li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    {{-- <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="rating-number">(64)</span>
                                    </div> --}}
                                    <h5 class="title"><a href="{{ route('frontend.product.view', $product) }}">{{
                                            $product->title }}</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        @if ($product->selling_price && $product->selling_price > 0)
                                        <span class="price current-price">BDT {{ $product->selling_price }}</span>
                                        <span class="price old-price">BDT {{ $product->price }}</span>
                                        @else
                                        <span class="price current-price">BDT {{ $product->price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    @empty
                    <div class="text-center">
                        <h4>No Products found!</h4>
                    </div>
                    @endforelse

                    <nav>
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>
<!-- End Shop Area  -->

@push('js')
<script>
    $('#sortBy').change(function(){
            let isOrder = `{{ isset(request()->order) }}`
            let url = null
            if(isOrder){
                    let urlArry = window.location.href.split('&order')
                     url = urlArry[0] +"&order="+ $('#sortBy').val();
            } else{
                 url = window.location.href + "&order="+ $('#sortBy').val();
            }
            window.location.href =url;
        })
</script>
@endpush
@endsection