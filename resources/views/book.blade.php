@extends('layouts.app')

@section('content')

<section class="section-main bg padding-y">
    <div class="container-fluid pl-5 px-5">
    <div class="row">
        <aside class="col-md-3">
            <nav class="card">
                <ul class="menu-category">
                    <li><a href="#">Best clothes</a></li>
                    <li><a href="#">Automobiles</a></li>
                    <li><a href="#">Home interior</a></li>
                    <li class="has-submenu"><a href="#">More items</a>
                        <ul class="submenu">
                            <li><a href="#">Submenu name</a></li>
                            <li><a href="#">Great submenu</a></li>
                            <li><a href="#">Another menu</a></li>
                            <li><a href="#">Some others</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside> <!-- col.// -->
        <div class="col-md-9">
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                        <img src="{{ asset('img/1.jpg') }}" class="img-fluid mx-auto d-block" alt="img1">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/1.jpg') }}" class="img-fluid mx-auto d-block" alt="img2">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/2.jpg') }}" class="img-fluid mx-auto d-block" alt="img3">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/3.jpg') }}" class="img-fluid mx-auto d-block" alt="img4">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/4.jpg') }}" class="img-fluid mx-auto d-block" alt="img5">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/5.jpg') }}" class="img-fluid mx-auto d-block" alt="img6">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/6.jpg') }}" class="img-fluid mx-auto d-block" alt="img7">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img src="{{ asset('img/7.jpg') }}" class="img-fluid mx-auto d-block" alt="img8">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">    
    <div class="container-fluid pl-5 px-5">    
    <div class="row">     
            <div class="row">
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <span class="badge badge-danger"> NEW </span>
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/1.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Great item name goes here</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                    <del class="price-old">$1980</del>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/2.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/3.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/4.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/5.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/6.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/7.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <div class="img-wrap"> 
                            <img src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/images/items/1.jpg">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Add to cart </a>	
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            </div> <!-- row end.// -->
            <nav class="mt-4" aria-label="Page navigation sample">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>   
    </div>
    
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer border-top">
        <div class="container-fluid pl-5 px-5">
            <section class="footer-bottom border-top row">
                <div class="col-md-2">
                    <p class="text-muted"> &copy 2019 Company name </p>
                </div>
                <div class="col-md-8 text-md-center">
                    <span  class="px-2">info@pixsellz.io</span>
                    <span  class="px-2">+879-332-9375</span>
                    <span  class="px-2">Street name 123, Avanue abc</span>
                </div>
                <div class="col-md-2 text-md-right text-muted">
                    <i class="fab fa-lg fa-cc-visa"></i>
                    <i class="fab fa-lg fa-cc-paypal"></i>
                    <i class="fab fa-lg fa-cc-mastercard"></i>
                </div>
            </section>
        </div><!-- //container -->
    </footer>
@endsection
