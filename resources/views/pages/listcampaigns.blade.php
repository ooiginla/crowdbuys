<div class="campaigns-action clearfix">
    <div class="container">
        <div class="sort">
            <ul>
                <li class="active"><a href="{{ route('campaign.new') }}" class="btn-primary text-white">Create A Campaign</a></li>
            </ul>	
        </div>
        <div class="filter">
            <span>Filter by:</span>
            <form action="explore_layout_two.html#">
                <div class="field-select">
                    <select name="s">
                        <option value="">All Stages</option>
                        <option value="">Active</option>
                        <option value="">Completed</option>
                    </select>
                </div>
                <div class="field-select">
                    <select name="s">
                        <option value="">All Category</option>
                        @foreach(Helper::getCategories() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-select">
                    <input type="submit" name="search" value="search" class="btn-primary"/>
                </div>
            
            </form>
        </div><!-- .filter -->
    </div>
</div><!-- .campaigns-action -->

<div class="campaigns">
    <div class="container">
        <div class="campaign-content">
            <div class="row" id="posts">
                <div class="col-lg-12">
                    <a href="{{ route('campaign.view', $sponsored->slug) }}" class="btn-primary" style="position: absolute; right:15px;">Join</a>
                    <div class="campaign-big-item clearfix">
                        <a href="#" class="campaign-big-image"><img src="{{ asset('uploads/'.$sponsored->logo) }}" alt=""></a>
                        <div class="campaign-big-box">
                            <a href="#" class="category">{{ Helper::getCategories($sponsored->category) }}</a>
                            <div style="margin-bottom: 10px">
                                <span style="margin: 5px" ><strong class="text-primary">Goal:</strong> {{ Helper::gc($sponsored->currency) }} {{ $sponsored->goal_amount }}</span>
                                <span style="margin: 5px"><strong class="text-primary">Needed:</strong> {{ $sponsored->people_target }} Person(s)</span>
                                <span style="margin: 5px"><strong  class="text-primary">To Pay:</strong> {{ Helper::gc($sponsored->currency) }}{{ $sponsored->unit_amount }} Each</span>
                            </div>

                            <h3><a href="{{ route('campaign.view', $sponsored->slug) }}">{{ $sponsored->title }}</a></h3>
                            
                            <div class="campaign-description">{{ Helper::get_words($sponsored->description, 30) }}</div>
                            <div class="staff-picks-author">
                                <div class="author-profile">
                                    <a class="author-avatar" href="#"><img src="images/staff-picks-author.png" alt=""></a>by <a class="author-name" href="explore_layout_two.html#">{{ $sponsored->user->fullname() }}</a>
                                </div>
                                <div class="author-address"><span class="ion-location"></span>{{ ucwords($sponsored->user->city) }}</div>
                            </div>
                            <div class="process">
                                <div class="raised"><span></span></div>
                                <div class="process-info">
                                    <div class="process-pledged"><span>{{ Helper::gc($sponsored->currency) }}{{ $sponsored->total_raised }}</span>Raised </div>
                                    <div class="process-funded"><span>{{ $sponsored->people_target }}</span>From</div>
                                    <div class="process-time"><span>{{ $sponsored->total_raised }}</span>People to go</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                @each('pages.singlecampaign', $latest_campaigns, 'single')
            </div>
        </div>

        <div class="latest-button">
            <a href="#" class="btn-primary see-more" data-page="1" data-link="{{ route('getposts') }}?page=" data-div="#posts">Load more</a>
        </div>
    </div>
</div><!-- .latest -->