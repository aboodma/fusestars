@extends('layouts.website')
@section('style')
<style>
    .bak {
        background: #2a4d6c69;
        width: 100%;
        background-size: cover;
        height: 100%;
        position: absolute;
    }

    .pink-btn {
        color: #d47fa6;
        border-color: #d47fa6;
        border-radius: 20px;
    }

    .pink-btn:hover {
        color: #fff !important;
        background-color: #d47fa6 !important;
        border-color: #d47fa6 !important;
    }

    .sec-btn {
        border-radius: 20px;
    }

</style>
@endsection
@section('content')
    

    


    <div class="services-wrapper bg-white py-5">
        <div class="container">
            <h2>{{$providerType->name}}</h2>
            <div class="row">
                @foreach ($providers->where('is_approved',true) as $provider)
                <div class="col-md-3">
                    <a href="{{route('provider_profile',$provider->id)}}">
                        <div class="freelancer">
                            <img src="{{asset($provider->user->avatar)}}">
                            <h3 style="position: absolute;
                            left: 27px;
                            bottom: 68px;
                            font-size: 14px;
                            font-weight: bold;
                            text-transform: capitalize;
                            color: #3c3c3c;
                            background-color: #dfeaea;
                            padding: 3px;
                            border-radius: 3px;">1000 TL <i class="fa fa-video-camera"></i> </h3>
                            <div class="freelancer-footer">
    
                                <h5 style="padding: 0px;">{{$provider->user->name}}
                                    <span style="font-size: 12px">{{$provider->ProviderType->name}} ,
                                        {{$provider->Country->name}}</span>
                                </h5>
                                <button class="btn btn-default"><i style="font-size: 21px"
                                        class="fa fa-heart-o"></i></button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>



    
    @endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.service-slider').slick({
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 6,
                centerMode: true,
                centerPadding: '60px',
                adaptiveHeight: true,
                responsive:[
                    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
                ]

            });
            $('.freelance-slider').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                centerMode: true,
                centerPadding: '60px',
                adaptiveHeight: true,
                responsive:[
                    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
                ]

            });
            $('.main-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 2000,
                fade: true,
            });
        })
        //   freelance-slider

    </script>
@endsection