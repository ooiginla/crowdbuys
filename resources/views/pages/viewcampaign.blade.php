<div class="campaign-content">
    <div class="container">
    @include('pages.error')
        <div class="campaign">
            <div class="campaign-item clearfix">
                <div class="campaign-image">
                    <div id="owl-campaign" class="campaign-slider">
                        <div class="item"><img src="{{ asset('images/campaign-recent-01.jpg') }}" alt=""></div>
                    </div>
                </div>
                <div class="campaign-box">
                    <a href="campaign_detail.html#" class="category">{{ Helper::getCategories($campaign->category) }}</a>
                    <div style="margin-bottom: 10px">
                                <span style="margin: 5px" ><strong class="text-primary">Goal:</strong> {{ Helper::gc($campaign->currency) }}{{ Helper::nf($campaign->goal_amount) }}</span>
                                <span style="margin: 5px"><strong class="text-primary">Needed:</strong> {{ $campaign->people_target }} Person(s)</span>
                                <span style="margin: 5px"><strong  class="text-primary">To Pay:</strong> {{ Helper::gc($campaign->currency) }}{{ $campaign->unit_amount }} Each</span>
                            </div>
                    <h3>{{ ucwords($campaign->title) }}</h3>
                    <div class="campaign-description"><p>{{ $campaign->description }}</p></div>
                    <div class="campaign-author clearfix">
                        <div class="author-profile">
                            <a class="author-icon" href="#"><img src="{{ asset('images/author-01.png') }}" alt=""></a>by <a class="author-name" href="#">{{ $campaign->user->fullname() }}</a>
                        </div>
                        <div class="author-address"><span class="ion-location"></span>{{ $campaign->user->city }}</div>
                    </div>
                    <div class="process">
                        <div class="raised"><span></span></div>
                        <div class="process-info">
                            <div class="process-pledged"><span>{{ Helper::gc($campaign->currency) }}{{ $campaign->total_raised }}</span>Raised </div>
                            <div class="process-funded"><span>{{ $campaign->people_target }}</span>From</div>
                            <div class="process-time"><span>{{ $campaign->left2go() }}</span>Person(s) to go</div>
                        </div>
                    </div>
                    <div class="button">
                    @if(auth()->user())
                        <form id="paymentForm" class="campaign-price-quantity">
                            <input type="hidden" id="email-address"  value="{{ auth()->user()->email }}" required />
                            <input type="hidden" id="amount" required value="{{ $campaign->unit_amount }}" />
                            <input type="hidden" id="first-name" value="{{ auth()->user()->firstname }}" />
                            <input type="hidden" id="last-name" value="{{ auth()->user()->lastname }}" />
                            <label><strong> Slots: </strong></label>
                            <input type="number" id="quantity" name="quantity" min="1" max="{{ $campaign->left2go() }}" value="1" style="font-style: normal">
                            <button type="submit" onclick="payWithPaystack(event)" class="btn-primary"> Join Campaign </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary">Join Campaign</a>
                    @endif
                        <div class="share" style="float: right; margin-top: -20px">
                        <p>Share this project</p>
                        <ul>
                            <li class="share-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="share-twitter"><a href="https://twitter.com/intent/tweet?text={{ url()->current() }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li class="share-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $campaign->title }}&summary={{ $campaign->description }}&source={{ url('/') }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div><!-- .campaign-content -->


<div class="campaign-history">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="campaign-tabs">
                    <ul class="tabs-controls">
                        <li class="active" data-tab="comment"><a href="campaign_detail.html#">Comments</a></li>
                        <li data-tab="backer"><a href="campaign_detail.html#">Members List</a></li>
                        <li data-tab="resource"><a href="campaign_detail.html#">Resources</a></li>
                        <li data-tab="updates"><a href="campaign_detail.html#">Announcements</a></li>
                    </ul>
                    <div class="campaign-content">
                        @include('tabs.backers')
                        @include('tabs.resources')
                        @include('tabs.updates')
                       @include('tabs.comments')
                    </div>
                </div>
            </div><!-- .main-content -->
            
            @include('pages.sideads')
            <!-- .sidebar -->
        </div>
    </div>
</div><!-- .campaign-history -->