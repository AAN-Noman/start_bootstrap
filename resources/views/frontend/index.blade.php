@extends('layouts.frontendapp')

@section('title', 'index-')

@section('content')
    <header class="masthead">
        @forelse ($banners as $banner)
            <div class="container">
                <div class="masthead-subheading">{{ $banner->title }}</div>
                <div class="masthead-heading text-uppercase">{{ $banner->description }}</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        @empty
        @endforelse

    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                        architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                        architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                        architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        @forelse ($portfolios as $portfolio )
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ $portfolio->title }}</h2>
                <h3 class="section-subheading text-muted">{{ $portfolio->shortDescription }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#{{ $portfolio->id }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('storage/portfolio/' . $portfolio->photo) }}" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $portfolio->client }}</div>
                            <div class="portfolio-caption-subheading text-muted">{{ $portfolio->category }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </section>


    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                @forelse ($abouts as $about)
                    <h2 class="section-heading text-uppercase">{{ $about->title }}</h2>
                    <h3 class="section-subheading text-muted">{{ $about->description }}</h3>
                @empty
                @endforelse

            </div>
            <ul class="timeline">
            @forelse ($storys as $story)
                <li class="{{ $story->id == [5 and 8] ? '' : 'timeline-inverted' }}">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('storage/story/' . $story->photo) }}" alt="{{ $story->title }}" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>{{ $story->date }}</h4>
                            <h4 class="subheading">{{ $story->title }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">{{ $story->description }}</p>
                        </div>
                    </div>
                </li>
            @empty
            @endforelse

                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            @forelse ($teams as $team)
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">{{ $team->title }}</h2>
                    <h3 class="section-subheading text-muted">{{ $team->shortDescription }}</h3>
                </div>
            @empty
            @endforelse
            <div class="row">
                @forelse ($datas as $data)
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('storage/teamMember/' . $data->photo) }}"
                                alt="{{ $data->name }}" />
                            <h4>{{ $data->name }}</h4>
                            <p class="text-muted">{{ $data->proportion }}</p>
                            <a class="btn btn-dark btn-social mx-2" href="{{ $data->twitter }}" aria-label="Parveen Anand Twitter Profile" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="{{ $data->facebook }}"
                                aria-label="Parveen Anand Facebook Profile" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="{{ $data->linkedin }}"
                                aria-label="Parveen Anand LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="row">
            @forelse ($teams as $team)
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">{{ $team->description }}</p>
                </div>
            @empty
            @endforelse

            </div>
        </div>
    </section>
@endsection

@section('portfolio')
@forelse ($portfolios as $portfolio )
<!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="{{ $portfolio->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('frontend/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">{{ $portfolio->title }}</h2>
                                <p class="item-intro text-muted">{{ $portfolio->shortDescription }}</p>
                                <img class="img-fluid d-block mx-auto" src="{{ asset('storage/portfolio/' . $portfolio->photo) }}" alt="{{ $portfolio->title }}" />
                                <p>{{ $portfolio->description }}</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        {{  $portfolio->client }}
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        {{ $portfolio->category }}
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse

@endsection
