@extends('layouts.front')

@section('content')

    <div class="inn-body-section pad-bot-55">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>Типове стаи</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Списък със свободни стаи</p>
                </div>

            @forelse($room_types as $room_type)
                <!--ROOM SECTION-->
                <div class="room">
                    @if($room_type->cost_per_day !== $room_type->discountedPrice)
                    <div class="ribbon ribbon-top-left"><span>Намаление</span>
                    </div>
                    @endif
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="{{'/storage/room_types/'.$room_type->images->first()->name}}" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>{{ $room_type->name }}</h4>

                        <div class="r2-ratt">
                            @if($room_type->getAggregatedRating() > 0)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 1)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 2)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 3)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 4)
                            <i class="fa fa-star"></i>
                            @endif
                            <p>
                                @if($room_type->getAggregatedRating() == 0)
                                     Няма рейтинг
                                @elseif($room_type->getAggregatedRating() <= 2)
                                Below Average
                                @elseif($room_type->getAggregatedRating() <= 3)
                                    Satisfactory
                                @elseif($room_type->getAggregatedRating() <= 4)
                                    Добър
                                @elseif($room_type->getAggregatedRating() <= 5)
                                    Отличен
                                @endif
                                {{$room_type->getAggregatedRating()}} / 5
                            </p>
                        </div>
                        <ul>
                            <li>Max възрастни : {{ $room_type->max_adult }}</li>
                            <li>Max Деца : {{ $room_type->max_child }}</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            @foreach($room_type->facilities as $facility)
                                <li>{{ $facility->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>

                        <p>
                            <span class="room-price-1">{{ config('app.currency').$room_type->discountedPrice}}</span>
                            @if($room_type->cost_per_day !== $room_type->discountedPrice)
                            <span class="room-price">{{ config('app.currency').$room_type->cost_per_day }}</span>
                            @endif
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com"> <a href="{{url('/room_type/'.$room_type->id)}}" class="inn-room-book">Запази</a> </div>
                </div>
                <!--END ROOM SECTION-->
                @empty
                <!--ROOM SECTION-->
                    <div class="room">
                        </div>
                        <!--ROOM IMAGE-->
                        <div class="r1 r-com"><img src="{{ asset("front/images/room/1.jpg") }}" />
                        </div>
                        <!--ROOM RATING-->
                        <div class="r2 r-com">
                            <h4>Апартманет/h4>
                            <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.5 / 5</span> </div>
                            <ul>
                                <li>Max Adult : 3</li>
                                <li>Max Child : 1</li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <!--ROOM AMINITIES-->
                        <div class="r3 r-com">
                            <ul>
                                <li>Ютия</li>
                                <li>Кафемашина</li>
                                <li>Климатик</li>
                                <li>Телевизор</li>
                                <li>Събуждане по телефон</li>
                            </ul>
                        </div>
                        <!--ROOM PRICE-->
                        <div class="r4 r-com">
                            <p>Цена за една нощ</p>
                            <p><span class="room-price-1">120</span> <span class="room-price">$: 160</span>
                            </p>
                            <p>Невъзвръщаема</p>
                        </div>
                        <!--ROOM BOOKING BUTTON-->
                        <div class="r5 r-com">
                            <div class="r2-available">Свободен</div>
                            <p>Цена за 1 нощ</p> <a href="room-details-block.html" class="inn-room-book">Резервирай</a> </div>
                    </div>
                    <!--END ROOM SECTION-->
                <!--ROOM SECTION-->
                <div class="room">
                    <div class="ribbon ribbon-top-left"><span>Бъдещи</span>
                    </div>
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="images/room/2.jpg" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>Малък апртамент</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.2 / 5</span> </div>
                        <ul>
                            <li>Max Възрастни : 2</li>
                            <li>Max Деца : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                        <li>Ютия</li>
                                <li>Кафемашина</li>
                                <li>Климатик</li>
                                <li>Телевизор</li>
                                <li>Събуждане по телефон</li>
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="room-price-1">70</span> <span class="room-price">$: 120</span>
                        </p>
                        <p>Невъзвръщаема</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Свободен</div>
                        <p>Цена за нощувка</p> <a href="room-details.html" class="inn-room-book">Резервирай</a> </div>
                </div>
                <!--END ROOM SECTION-->
                <!--ROOM SECTION-->
                <div class="room">
                    <!--<div class="ribbon ribbon-top-left"><span>Featured</span></div>
                    -->
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="images/room/3.jpg" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>Супер лукс</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  3.9 / 5</span> </div>
                        <ul>
                            <li>Max Възрастни : 2</li>
                            <li>Max Деца : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                        <li>Ютия</li>
                                <li>Кафемашина</li>
                                <li>Климатик</li>
                                <li>Телевизор</li>
                                <li>Събуждане по телефон</li>
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="room-price-1">190</span> <span class="room-price">$: 210</span>
                        </p>
                        <p>Невъзвръщаема</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Свободен</div>
                        <p>Цена за една нощ</p> <a href="room-details-1.html" class="inn-room-book">Запази</a> </div>
                </div>
                <!--END ROOM SECTION-->
                <!--ROOM SECTION-->
                <div class="room">
                    <!--<div class="ribbon ribbon-top-left"><span>Best Room</span></div>-->
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="images/room/4.jpg" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>Luxury Room</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.0 / 5</span> </div>
                        <ul>
                            <li>Max Въздрастни : 5</li>
                            <li>Max Деца : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                        <li>Ютия</li>
                                <li>Кафемашина</li>
                                <li>Климатик</li>
                                <li>Телевизор</li>
                                <li>Събуждане по телефон</li>
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="room-price-1">3000</span> <span class="room-price">$: 3500</span>
                        </p>
                        <p>Невъзвръщаема</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Свободен</div>
                        <p>Price for 1 night</p> <a href="room-details.html" class="inn-room-book">Запази</a> </div>
                </div>
                <!--END ROOM SECTION-->
                <!--ROOM SECTION-->
                <div class="room">
                    <div class="ribbon ribbon-top-left"><span>Special</span>
                    </div>
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="images/room/5.jpg" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>Premium Room</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.5 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 5</li>
                            <li>Max Child : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                        <li>Ютия</li>
                                <li>Кафемашина</li>
                                <li>Климатик</li>
                                <li>Телевизор</li>
                                <li>Събуждане по телефон</li>
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="room-price-1">4000</span> <span class="room-price">$: 5000</span>
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        <p>Цена за една нощ</p> <a href="room-details-block.html" class="inn-room-book">Запази</a> </div>
                </div>
                <!--END ROOM SECTION-->
                <!--ROOM SECTION-->
                <div class="room">
                    <!--<div class="ribbon ribbon-top-left"><span>Featured</span></div>-->
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="images/room/6.jpg" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>Normal Room</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  3.5 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 4</li>
                            <li>Max Child : 4</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                        <li>Ютия</li>
                                <li>Кафемашина</li>
                                <li>Климатик</li>
                                <li>Телевизор</li>
                                <li>Събуждане по телефон</li>
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="room-price-1">600</span> <span class="room-price">$: 700</span>
                        </p>
                        <p>Невъзвръщаема</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        
                        <p>Цена за една нощ</p> <a href="room-details.html" class="inn-room-book">Запази</a> </div>
                </div>
                <!--END ROOM SECTION-->
                @endforelse
            </div>
        </div>
@endsection
