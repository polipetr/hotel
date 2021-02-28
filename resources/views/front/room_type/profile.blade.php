@extends('layouts.front')

@section('content')

    <!--TOP SECTION-->
    <div class="hp-banner"> <img src="{{'/storage/room_types/'.$room_type->images->first()->name}}" alt=""> </div>
    <!--END HOTEL ROOMS-->
    <!--CHECK AVAILABILITY FORM-->
    <div class="check-available">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inn-com-form">
                        {!! Form::open(array('url' => 'room_type/'.$room_type->id.'/book', 'class' => 'col s12')) !!}
                        {{ Form::hidden('_method', 'POST') }}
                        @csrf

                        @if ($errors->any())
                            <div class="row">
                                <div class="col-md-12 alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                            <div class="row">
                                <div class="col s12 avail-title">
                                    <h4>Провери за свободни</h4>
                                    <p>Финалната цена се калкулира {{$room_type->discount_percentage}}% discount, adding {{config('app.service_charge_percentage')}}% service charge and adding {{config('app.vat_percentage')}}% ДДС от оригиналнта цена.</p>
                                </div>
                            </div>
                        <input name="booking_validation" type="hidden" value="0">

                        <div class="row">
                                <div class="input-field col s12 m4 l2">
                                    <input type="text" style="color: black" value="{{$room_type->finalPrice  }}" class="form-btn" disabled>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <select name="number_of_adult">
                                        <option value="" disabled selected>Брой възрастни</option>
                                        @for($i = 1; $i <= $room_type->max_adult; $i++ )
                                        <option value="{{ $i }}" @if (Input::old('number_of_adult') == $i) selected="selected" @endif>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <select name="pay_method">
                                        <option value="" disabled selected>Начин на плащане</option>
                                        <option value="Брой" >В брой</option>
                                        <option value="Карта" >С карта</option>
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <select name="number_of_child">
                                        <option value="" disabled selected>Брой деца</option>
                                        @for($i = 0; $i <= $room_type->max_adult; $i++ )
                                            <option value="{{ $i }}" @if (Input::old('number_of_child') == $i && Input::old('number_of_child') != 0 ) selected="selected" @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="text" id="from" name="arrival_date" value="{{ old('arrival_date') }}">
                                    <label for="from">Дата на пристигане</label>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="text" id="to" name="departure_date" value="{{ old('departure_date') }}">
                                    <label for="to">Дата на напускане</label>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="submit" value="Запиши" class="form-btn">
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CHECK AVAILABILITY FORM-->
    <div class="hom-com">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>{{ $room_type->name }}</span> Стаи</h4>
                            </div>
                            <div class="hp-amini">
                                <p>{{ $room_type->description }}</p>
                            </div>
                        </div>
                        @if(count($room_type->facilities) > 0)
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Помещения</span></h4>
                                <p></p>
                            </div>
                            <div class="hp-amini">
                                <ul>
                                    @foreach($room_type->facilities as $facility)
                                    <li><img src="{{('/storage/facilities/'.$facility->icon)}}" alt="">{{ $facility->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Преглед</span></h4>
                                <p></p>
                            </div>
                            <div class="hp-over">
                                <ul class="nav nav-tabs hp-over-nav">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home"><img src="{{ asset("front/images/icon/a8.png") }}" alt=""> <span class="tab-hide">Преглед</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active tab-space">
                                        <div class="hp-main-overview">
                                            <ul>
                                                <li>Заетост: <span>Max {{ $room_type->max_adult + $room_type->max_child }} хора</span>
                                                </li>
                                                <li>Размер : <span>{{ $room_type->size }} кв.</span>
                                                </li>
                                                <li>Room Service : <span>{{  $room_type->room_service==true ? "Наличен" : "Няма" }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($room_type->images) > 0)
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Галерия</span></h4>
                                <p>Снумки на стаите.</p>
                            </div>
                            <div class="">
                                <div class="h-gal">
                                    <ul>
                                        @foreach($room_type->images as $image)
                                        <li><img class="materialboxed" data-caption="{{ $image->caption }}" src="{{('/storage/room_types/'.$image->name)}}" alt="">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Ratings</span></h4>
                                <p>Ревю на хотела</p>
                            </div>
                            <div class="hp-review">
                                <div class="hp-review-left">
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Чудесен</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Добър</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-Good"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Задоволителен</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-satis"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Под средния</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-below"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Лош</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-poor"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hp-review-right">
                                    <h5>Overall Ratings</h5>
                                    <p><span>
                            {{ $room_type->getAggregatedRating() }} <i class="fa fa-star" aria-hidden="true"></i></span> based on {{$room_type->getRatingsCount() }} reviews</p>
                                </div>
                            </div>
                        </div>
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Гост</span> REVIEWS</h4>
                                <p>Разгледай всички отзиви.</p>
                            </div>
                            <div class="lp-ur-all-rat">
                                <ul>
                                    @if(count($room_type->rooms) > 0)
                                    @foreach($room_type->rooms as $room)
                                            @if(count($room->reviews) > 0)
                                            @foreach($room->reviews as $review)

                                                    <li>
                                                        <div class="lr-user-wr-img"> <img src="{{'/storage/avatars/'.$review->room_booking->user->avatar}}" alt=""> </div>
                                                        <div class="lr-user-wr-con">
                                                            <h6>{{ $review->room_booking->user->first_name." ".$review->room_booking->user->last_name }} @if($review->rating > 0)<span> {{ $review->rating }} <i class="fa fa-star" aria-hidden="true"></i></span>@endif</h6> <span class="lr-revi-date"> {{ \Carbon\Carbon::parse($review->updated_at)->diffForHumans() }}</span>
                                                            <p>{{ $review->review }}</p>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--=========================================-->
                    <div class="hp-call hp-right-com">
                        <div class="hp-call-in"> <img src="{{ asset("front/images/icon/dbc4.png") }}" alt="">
                            <h3><span>Call us!</span> {{ config('app.phone_number') }}</h3> <small>Ние сме свободно 24/7 он Подеделник до Неделя</small> <a href="#">Обади се</a> </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-book hp-right-com">
                        <div class="hp-book-in">
                            <a href="" id="bookmark_button" class="like-button"><i class="fa fa-heart-o"></i> Списък</a> <!--<span>159 people bookmarked this place</span>-->
                            <ul>
                                <li><a href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" rel="me" title="Facebook" target="_blank"><i class="fa fa-facebook"></i> Сподели</a>
                                </li>
                                <li><a href="https://twitter.com/share?url={{ Request::url() }}&text={{ $room_type->name }}" rel="me" title="Twitter" target="_blank"><i class="fa fa-twitter"></i> Tweet</a>
                                </li>
                                <li><a href="https://plus.google.com/share?url={{ Request::url() }}" rel="me" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i> Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-card hp-right-com">
                        <div class="hp-card-in">
                            <h3>We Accept</h3> <img src="{{ asset("front/images/card.png") }}" alt=""> </div>
                    </div>
                    <!--=========================================-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        $(function() {
            $('#bookmark_button').click(function() {
                if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
                    window.sidebar.addPanel(document.title, window.location.href, '');
                } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
                    window.external.AddFavorite(location.href, document.title);
                } else if (window.opera && window.print) { // Opera Hotlist
                    this.title = document.title;
                    return true;
                } else { // webkit - safari/chrome
                    alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
                }
            });
        });
    </script>

    @endsection
