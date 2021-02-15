<section class="section-main bg padding-y">
    <div class="container-fluid pl-5 px-5">
    <div class="row">
        <aside class="col-md-3">
            <nav class="card">
                <ul class="menu-category">
                    @foreach($genres as $genre)     
                    <li><a href="{{ route('genres_view', $genre->id) }}">{{$genre->genre}} </a></li>
                    @endforeach
                </ul>
            </nav>
        </aside>
        <div class="col-md-9">
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($books->shuffle()->take(4) as $book) 
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <a href="{{ route('books.show', $book->id) }}">
                                            <img class="card-img-top" alt="{{$book->id}}" src="{{ asset("storage/".$book->cover) }}">
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $book->str_title }}</h4>
                                            <p class="card-text">{{ $book->AuthorsList($book->authors) }}</p>
    
                                        </div>
    
                                    </div>
                                </div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
</div>
</section>
