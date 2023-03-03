
                        <div class="listticket">
                            <ul class="tktlist">
                                @foreach($flightresult['data'] as $searchFlight)

                                @if(count($searchFlight['itineraries']) == 1)
                                <li class="trip"> 
                                    <div class="largehead">
                                        <h4>Departure Journey &nbsp;&nbsp;|&nbsp;&nbsp;<span> {{ date('M d Y', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}</h4>
                                    </div>
                                    <div class="flexlist">
                                        <div class="inuot_bx">
                                            <div class="tmingtk ">
                                                <ul class="dflex_js mbs">

                                                    <li>
                                                        <div class="airnm">
                                                            <span>
                                                                @php $file = getFileName($searchFlight['itineraries'][0]["segments"][0]['carrierCode']) @endphp
                                                                @if($file)
                                                                <img src="{{$file}}" class="img-res" alt="{{$searchFlight['itineraries'][0]["segments"][0]['carrierCode']}}">
                                                                @else
                                                                <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                                                                @endif
                                                            </span>
                                                            <h6>{{ $flightresult['dictionaries']['carriers'][$searchFlight['itineraries'][0]["segments"][0]['carrierCode']]}}</h6>
                                                        </div>
                                                    </li>
                                                    @php $depaturecountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']); @endphp
                                                    <li class="tooltip1">
                                                        <p> {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']}})</span></p><span class="blkts">{{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }} .</strong> {{ date('M-d-Y', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}
                                                                <span>
                                                                    {{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li><span class="blkts cnts">{{ strtolower(str_replace('H','H     ',substr($searchFlight['itineraries'][0]["duration"], 2)))}}</span>
                                                        <span class="hrst"></span>
                                                        <span class="blkts cnts">{{(count($searchFlight['itineraries'][0]["segments"]) -1)}} Stop</span>
                                                    </li>
                                                    @php $arrivalcountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']); @endphp

                                                    <li class="tooltip1">

                                                        <p>

                                                            {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']}})</span></p>
                                                        <span class="blkts">{{ $arrivalcountryDetails->country_name ?? Null }} ({{ $arrivalcountryDetails->city_name ?? Null }})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong> {{$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']}} {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }} .</strong> {{ date('M-d-y', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}
                                                                <span>{{ $arrivalcountryDetails->country_name ?? Null   }} ({{ $arrivalcountryDetails->city_name ?? Null }})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="bagbx">
                                                    <span><img src="http://24hr.lightmytrip.com/public/images/Baggage-gray.svg" />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? '' }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>

                                                    {{-- <span><img src="http://24hr.lightmytrip.com/public/images/Baggage-gray.svg"  />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prishow">
                                            <div class="tbfare">

                                                <div class="bookprc">
                                                    <h5>{{ $searchFlight["price"]["currency"] .', '.$searchFlight["price"]['total']}}</h5>
                                                    <a href="{{ url('FlightList/details?data='.json_encode($searchFlight,true).'&dictionaries='.json_encode($flightresult['dictionaries']).'&px='.Request::get('px'))}}" type="button" class="btnvw"><i class="fas fa-plane"></i>&nbsp;&nbsp;Book Now</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                @else



                             
                                    @foreach($searchFlight['itineraries'] as $key =>$value)
									   <li class="trip">
                                    <div class="largehead">
                                        <h4>Departure Journey &nbsp;&nbsp;|&nbsp;&nbsp;<span> {{ date('M d Y', strtotime($value["segments"][0]['departure']['at'])) }}</h4>
                                    </div>
                                    <div class="flexlist">
                                        <div class="inuot_bx">
                                            <div class="tmingtk ">
                                                <ul class="dflex_js mbs">

                                                    <li>
                                                        <div class="airnm">
                                                            <span>
                                                                @php $file = getFileName($searchFlight['itineraries'][0]['segments'][0]['carrierCode']) @endphp
                                                                @if($file)
                                                                <img src="{{$file}}" class="img-res" alt="{{$searchFlight['itineraries'][0]["segments"][0]['carrierCode']}}">
                                                                @else
                                                                <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                                                                @endif
                                                            </span>
                                                            <h6>{{ $flightresult['dictionaries']['carriers'][$searchFlight['itineraries'][0]["segments"][0]['carrierCode']]}}</h6>
                                                        </div>
                                                    </li>
                                                    @php $depaturecountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']); @endphp
                                                    <li class="tooltip1">
                                                        <p> {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']}})</span></p><span class="blkts">{{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }} .</strong> {{ date('M-d-Y', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}
                                                                <span>
                                                                    {{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li><span class="blkts cnts">{{ strtolower(str_replace('H','H     ',substr($searchFlight['itineraries'][0]["duration"], 2)))}}</span>
                                                        <span class="hrst"></span>
                                                        <span class="blkts cnts">{{$searchFlight['itineraries'][0]["segments"][0]['numberOfStops']}} Stop</span>
                                                    </li>
                                                    @php $arrivalcountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']); @endphp
                                                    <li class="tooltip1">
                                                        <p>

                                                            {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']}})</span></p>
                                                        <span class="blkts">{{ $arrivalcountryDetails->country_name ?? Null }} ({{ $arrivalcountryDetails->city_name ?? Null }})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }} .</strong> {{ date('M-d-y', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}
                                                                <span>{{ $arrivalcountryDetails->country_name ?? Null   }} ({{ $arrivalcountryDetails->city_name ?? Null }})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>

                                                </ul>

                                                {{-- <div class="bagbx">
								
													<span><img src="http://24hr.lightmytrip.com/public/images/Baggage-gray.svg"  />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>
                                            </div> --}}
                                             </div>

                                        <div class="tmingtk ">
                                            <ul class="dflex_js mbs">

                                                <li>
                                                    <div class="airnm">
                                                        <span>
                                                            @php $file = getFileName($searchFlight['itineraries'][1]['segments'][0]['carrierCode']) @endphp
                                                            @if($file)
                                                            <img src="{{$file}}" class="img-res" alt="{{$searchFlight['itineraries'][1]["segments"][0]['carrierCode']}}">
                                                            @else
                                                            <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                                                            @endif
                                                        </span>
                                                        <h6>{{ $flightresult['dictionaries']['carriers'][$searchFlight['itineraries'][1]["segments"][0]['carrierCode']]}}</h6>
                                                    </div>
                                                </li>
                                                @php $depaturecountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][1]["segments"][0]['departure']['iataCode']]["countryCode"],$searchFlight['itineraries'][1]["segments"][0]['departure']['iataCode']); @endphp
                                                <li class="tooltip1">
                                                    <p> {{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][0]['departure']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][1]["segments"][0]['departure']['iataCode']}})</span></p><span class="blkts">{{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})</span>
                                                    <div class="tooltiptext">
                                                        <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][0]['departure']['at'])) }} .</strong> {{ date('M-d-Y', strtotime($searchFlight['itineraries'][1]["segments"][0]['departure']['at'])) }}
                                                            <span>
                                                                {{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})
                                                            </span>
                                                        </h6>
                                                    </div>
                                                </li>
                                                <li><span class="blkts cnts">{{ strtolower(str_replace('H','H     ',substr($searchFlight['itineraries'][1]["duration"], 2)))}}</span>
                                                    <span class="hrst"></span>
                                                    <span class="blkts cnts">{{$searchFlight['itineraries'][1]["segments"][0]['numberOfStops']}} Stop</span>
                                                </li>
                                                @php $arrivalcountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['iataCode']]["countryCode"],$searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['iataCode']); @endphp
                                                <li class="tooltip1">
                                                    <p>{{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['iataCode']}})</span></p>
                                                    <span class="blkts">{{ $arrivalcountryDetails->country_name ?? Null }} ({{ $arrivalcountryDetails->city_name ?? Null }})</span>
                                                    <div class="tooltiptext">
                                                        <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['at'])) }} .</strong> {{ date('M-d-y', strtotime($searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['at'])) }}
                                                            <span>{{ $arrivalcountryDetails->country_name ?? Null   }} ({{ $arrivalcountryDetails->city_name ?? Null }})
                                                            </span>
                                                        </h6>
                                                    </div>
                                                </li>
                                            </ul>

                                            <div class="bagbx">

                                                <span><img src="http://24hr.lightmytrip.com/public/images/Baggage-gray.svg" />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? '' }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prishow">
                                        <div class="tbfare">

                                            <div class="bookprc">
                                                <h5>{{ $searchFlight["price"]["currency"] .', '.$searchFlight["price"]['total']}}</h5>
                                                <a href="{{ url('FlightList/details?data='.json_encode($searchFlight,true).'&dictionaries='.json_encode($flightresult['dictionaries']).'&px='.Request::get('px'))}}" type="button" class="btnvw"><i class="fas fa-plane"></i>&nbsp;&nbsp;Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                           
                    	 </li>
                        @endforeach
   
                        @endif
                        @endforeach
						 </div>
                        </ul>
                    
                    <div class="loadbtn">
                        <button type="button" class="lotds">LOAD MORE RESULTS </button>
                    </div>