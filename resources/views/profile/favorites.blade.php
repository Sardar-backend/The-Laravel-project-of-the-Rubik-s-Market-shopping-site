
@extends('base')
@section('content')
<section class="inner-page" id="profile-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>ناحیه کاربری</h1>
                            <p>به ناحیه کاربری روبیک مارکت خوش آمدید.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <div class="row">
                    @include('layouts.sidbar_prof')
                        <div class="col-12 col-lg-9 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">
                            <!-- Favorite Products -->
                            <div class="custom-container" id="favorites">
                                <div class="row pt-2 px-3">
                                    <div class="col-12"><h1>محصولات مورد علاقه</h1></div>
                                </div>
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gx-md-4">
                                        <!-- Products -->
                                         @foreach ($favorites as $favorite )
                                        <div class="col">
                                            <!-- Product Box -->
                                            <div class="encode4326654321vfb">
                                                <a href="{{route('product',['id'=>$favorite->id])}}"><div class="image" style="background-image: url('{{$favorite->gallery()->first()->image}}')"></div></a>
                                                <div class="details p-3">
                                                <div class="category">
                                                        <a href="/products?search={{$favorite->category()->first()->name}}">{{$favorite->category()->first()->name}}</a>
                                                        &nbsp;/&nbsp;
                                                        <a href="/products?search={{$favorite->Brand}}">{{$favorite->Brand}}</a>
                                                </div>
                                                    <a href="{{route('product',['id'=>$favorite->id])}}"><h2>{{$favorite->name}}</h2></a>
                                                    <div class="encode4365gbf265g43d">{{$favorite->price}} </div>
                                                    <div class="rate">
                                                    @for ( $i=0; $i < $favorite->stars; $i++ )
                                                    <i class="fa fa-star"></i>

                                                    @endfor
                                                        <span class="encode43bf265g43d">@if($favorite->comment->count())( ({{$favorite->comment->count()}}) رای دهنده)@endif</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Product Box -->
                                        </div>
                                         @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- /Favorite Products -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
