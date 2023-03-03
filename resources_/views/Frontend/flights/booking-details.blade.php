<div class="rightmain_rv ">
            <div class="pritotal_main  mtprew1">
                <div class="bookingtimer whitebrd pdbox_wht">
                    <h6>Book now before tickets run out!</h6>
                    <div id="clockdiv"></div>
                    <script>
                        $(document).ready(function() {
                            // 10 minutes from now
                            var time_in_minutes = Date.parse("{{ date('D M d Y H:i:s', strtotime($data->lastTicketingDate))}}");
                            var current_time = Date.parse(new Date());
                            
                            var deadline = new Date(time_in_minutes +10 * 60 * 1000);
                        console.log(deadline);
                            function time_remaining(endtime) {
                                var t = Date.parse(endtime) - Date.parse(new Date());
                                var seconds = Math.floor((t / 1000) % 60);
                                var minutes = Math.floor((t / 1000 / 60) % 60);
                                var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                                return {
                                    'total': t
                                    , 'days': days
                                    , 'hours': hours
                                    , 'minutes': minutes
                                    , 'seconds': seconds
                                };
                            }

                            function run_clock(id, endtime) {
                                var clock = document.getElementById(id);

                                function update_clock() {
                                    var t = time_remaining(endtime);
                                    //clock.innerHTML = +t.days+'<b>d</b>' + '<span>:</span>' + t.minutes + '<b>m</b>' + '<span>:</span>' + t.seconds + '<b>s</b>';
                                     clock.innerHTML = +t.minutes + '<b>m</b>' + '<span>:</span>' + t.seconds + '<b>s</b>';
                                    if (t.total <= 0) {
                                        clearInterval(timeinterval);
                                    }
                                }
                                update_clock(); // run function once at first to avoid delay
                                var timeinterval = setInterval(update_clock, 1000);
                            }
                            run_clock('clockdiv', deadline);

                        });

                    </script>
                </div>

                <div class="farebox whitebrd ">
                    <h3>Flight Base Fare</h3>
                    @php $totals = explode('.',$total['total_amount']) @endphp

                    <div class="paybx cngfet">
                        <ul class="basefareul">                           
                             <li><span>Adults x 1</span></li> 
                             <li><span>Base Fare</span><span><b>₦&nbsp;121,250<sup>  </sup></b></span></li>
                             <li><span>Discount</span><span><b>₦&nbsp;0<sup>  </sup></b></span></li>
                             <li><span>Total Fare</span><span><b>₦&nbsp;121,250<sup>  </sup></b></span></li>
                        </ul>
                    </div>






                    <!-- <div class="fareclps">
                        <button data-toggle="collapse" data-target="#BaseFare"><span>Base Fare <b>({{$total['total_passenger']}}
                                    travellers)</b><i class="fas fa-angle-down"></i></span>
                                    <span><b>{{$total['currency']}}
                                    {{-- {{ $total[0]}}.<sup>{{ $total[1]}}</sup></b></span></button> --}}
                        <div id="BaseFare" class="collapse">
                            <ul class="basefareul brdbase">
                            @foreach($ticketDetails as $key => $value)
                            @php $ticketp = explode('.',$value['amount']) @endphp
                                <li>
                                <span>{{ $value['total']}} {{$value['name']}}</span>
                                <span>{{$value['currency']}} {{$value['amount']}}<sup></sup></span> 
                                </li>
                           @endforeach
                            </ul>
                        </div>
                    </div> -->

                    <div class="paybx brdtopd">
                        <ul class="basefareul">
                           
                             <li><span><b>Total</b></span><span><b>{{$total['currency']}} {{   $total['total_amount']}}.<sup>  </sup></b></span></li> 
                        </ul>

                        <div class="upcrt">
                            <span><i class="fas fa-chart-line" aria-hidden="true"></i>&nbsp;This price may increase if you book later.
</span>
                        </div>
                    </div>

                    <div class="bookbtn_fare">
                     @if(Request::segment(1) == "Flight")
                        <a href={{route('FlightBooking')}} class="anchor-btn cntsd_book">Continue to Book<i class="fas fa-long-arrow-alt-right"></i></a>
                     @endif
                     @if(Request::segment(1)  == "FlightBooking")
                        <button type="submit" class="cntsd_book">Continue to Pay<i class="fas fa-long-arrow-alt-right"></i></button>
                     @endif
                    </div>
                </div>


                <div class="cntfare whitebrd pdbox_wht">
                    <span><i class="fa fa-question"></i></span>
                    <div class="prcntvd">
                        <h5>For customer support</h5>
                        <p>
Please call <a href="tel:0000000000">0000000000</a> or
<span>24/7 (Monday to Sunday).</p>
                    </div>
                </div>

            </div>
        </div>