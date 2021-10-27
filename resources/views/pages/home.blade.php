
@extends('frontLayout')
@section('frontEndContent')
  <!-- start slide and sub image -->
    <div class="row slide">
        <div class="col-sm-3 sub_image">
            <div class="sub_image1">
                <img src="{{('public/frontEnd/images/subimage1.jpg')}}" alt="">
                <h4>New products</h4>
            </div>

            <div class="sub_image2">
                <img src="{{('public/frontEnd/images/subimage2.jpg')}}" alt="">
                <h4>Black Fridays</h4>
            </div>

        </div>
        <div class="col-sm-9 main_slide">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{('public/frontEnd/images/slide_1.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('public/frontEnd/images/slider_2.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('public/frontEnd/images/slider_3.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- end slide and sub image -->
    <!-- start main product -->

<div class="row product">
    <!-- start left sidebar include: category, wishlist, popular tag, newsletter -->
    <div class="col-sm-3 sidebar">
        <!--category -->
        <div class="category">
            <h3 class="category_heading">
                CATEGORY
            </h3>
            <ul class="category_list">
                <li><a href=""><i class="fas fa-angle-right"></i> Lips <span>+</span></a></li>
                <li><a href=""><i class="fas fa-angle-right"></i> Eyes <span>+</span></a></li>
                <li><a href=""><i class="fas fa-angle-right"></i> Skin and Face <span>+</span></a></li>
                <li><a href=""><i class="fas fa-angle-right"></i> Body <span>+</span></a></li>
                <li><a href=""><i class="fas fa-angle-right"></i> Mom and Baby <span>+</span></a></li>
                <li><a href=""><i class="fas fa-angle-right"></i> Health <span>+</span></a></li>
            </ul>
        </div>
        <!-- category -->
        <!-- start wishtlist -->
        <div class="wishlist">
            <h3>WISHLIST</h3>
            <div class="wishlist_item">
                <img src="{{('public/frontEnd/images/pr2.png')}}" alt="">
                <div class="wishlist_content">
                    <h4>Kem trị mụn</h4>
                    <p class="wishlist_price">100.000 vnd</p>
                    <p class="wishlist_qty">Quanity: 1</p>
                </div>
                <i class="fas fa-times"></i>
            </div>
            <div class="wishlist_item">
                <img src="{{('public/frontEnd/images/pr3.png')}}" alt="">
                <div class="wishlist_content">
                    <h4>Tẩy tế bào chết</h4>
                    <p class="wishlist_price">200.000 vnd</p>
                    <p class="wishlist_qty">Quanity: 2</p>
                </div>
                <i class="fas fa-times"></i>
            </div>
            <div class="wishlist_qtyitem">
                2 items
            </div>
        </div>
        <!-- end wishlist -->
        <!-- start popular tag -->
        <div class="popular_tag">
            <h3>POPULAR TAGS</h3>
            <ul class="popular_list">
                <li><a href="">Trị mụn</a></li>
                <li><a href="">Bông tẩy trang</a></li>
                <li><a href="">Son môi</a></li>
                <li><a href="">Dưỡng ẩm</a></li>
                <li><a href="">Liền sẹo</a></li>
                <li><a href="">Mặt nạ</a></li>
                <li><a href="">Lột mụn</a></li>
                <li><a href="">Oxy</a></li>
                <li><a href="">Trắng da</a></li>
            </ul>
        </div>
        <!-- end popular tag -->
        <!-- start newsletter -->
        <div class="newsletter">
            <h3>NEWLETTERS</h3>
            <div class="content">
                <p>sign up for your newsletter</p>
                <input type="text" placeholder="Your email here">
                <button>Subcribe</button>
            </div>
            <div class="image">
                <img src="{{('public/frontEnd/images/newletter.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <!-- end newsletter -->
    <!-- end left side bar -->


    <!-- start list product -->
    <div class="col-sm-9 main_product">
        <div class="container">
            <div class="row heading">
                Sản phẩm nổi bật
            </div>
            <div class="row">

                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/kem-tri-mun-1.jpg')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Kem chống nắng caryophy</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                179.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/pr2.jpg')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Serum Tea sea oil</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                310.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/pr2.png')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Kem trị mụn scar</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                120.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/pr3.png')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Thuốc trắng da Angle gold</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                230.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/pr4.jpg')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Diamond white</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                460.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/pr5.jpg')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Bông tẩy trang</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                270.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/prson.jpg')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Son M.O.I đỏ đậm</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                180.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/prdm.webp')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Dưỡng môi ban đêm Laneine</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                390.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 product_wrap">
                    <div class="home-product-item">

                        <div class="product_image">
                            <img src="{{('public/frontEnd/images/kemat.jpg')}}" alt="">
                            <div class="overlay"></div>
                            <div class="add_cart"><i class="fas fa-cart-plus"></i>Add to cart</div>
                        </div>

                        <div class="product_content">
                            <h3 class="name">Chì kẻ mắt siêu mảnh</h3>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="price">
                                200.000 vnđ
                            </p>
                            <div class="add_to">
                                <button>Add to wishlist</button>
                                <button>View detail</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col l-12 m-12 c-12 pagination_wrap">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a class="active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>

                </div>
            </div>
            <div class="row sales">
                <div class="col l-6 m-6 c-12 single_sale">
                    <div class="single_sale_imgae">
                        <img src="{{('public/frontEnd/images/single_sale1.jpg')}}" alt="">
                        <div class="sale_overlay"></div>
                        <div class="sale_discount">Up to 40% off</div>
                    </div>
                </div>
                <div class="col l-6 m-6 c-12 single_sale">
                    <div class="single_sale_imgae">
                        <img src="{{('public/frontEnd/images/single_sale2.jpg')}}" alt="">
                        <div class="sale_overlay"></div>
                        <div class="sale_discount">Sale off 30%</div>
                    </div>
                </div>
            </div>
            <div class="row brands">
                <h3>BRANDS</h3>
                <ul class="col l-12 m-12 c-12 brand_list">
                    <li>
                        <img src="{{('public/frontEnd/images/brand1.jpg')}}" alt="">
                    </li>
                    <li>
                        <img src="{{('public/frontEnd/images/brand2.jpg')}}" alt="">
                    </li>
                    <li>
                        <img src="{{('public/frontEnd/images/brand3.jpg')}}" alt="">
                    </li>
                    <li>
                        <img src="{{('public/frontEnd/images/brand4.jpg')}}" alt="">
                    </li>
                    <li>
                        <img src="{{('public/frontEnd/images/brand5.jpg')}}" alt="">
                    </li>
                    <li>
                        <img src="{{('public/frontEnd/images/brand6.jpg')}}" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end list product -->
</div>

@endsection