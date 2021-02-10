@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div class="container-fluid pl-5 px-5"> 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif

    @include('layouts.meniu_slider')

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

@endsection
