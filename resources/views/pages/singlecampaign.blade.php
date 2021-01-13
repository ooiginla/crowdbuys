<div class="col-lg-3 col-sm-6 col-6">
    <div class="campaign-item">
        
        <a href="#">
            <img src="{{ asset('uploads/'. $single->logo) }}" alt="Campaign Logo">
        </a>
        <div style="width: 60px; position: relative; float: right; top: -100px; padding: 5px" class="bg-primary text-white">Slot: <strong>{{ $single->total_backers }}</strong></div>
        <div class="campaign-box" style="padding: 10px; height: 180px;">
                <div class="campaign-author" style="position: relative; top: -20px; margin-bottom: 0px">
                <a class="author-icon" href="#" style="border: 3px solid #fff; border-radius: 50%"><img src="images/author-01.png" alt="" ></a>
                <i class="fa fa-check-circle" style="position: relative; left: -20px"></i>
                <a class="author-name" href=""><strong>{{ $single->user->fullname() }}</strong></a>
            </div>
            <div style="position: relative; top: -15px">
                <div style="margin-bottom: 10px; font-size: 12px;">
                    <span style="margin: 5px; margin-left: 0p" ><strong class="text-primary"><i class="fa fa-flag-checkered"></i></strong> ₦{{ Helper::nf($single->goal_amount) }}</span>
                    <span style="margin: 5px"><strong class="text-primary"><i class="fa fa-users"></i></strong> {{ $single->people_target }} Person(s)</span>
                    <span style="margin: 5px"><strong  class="text-primary"><i class="fa fa-money"></i></strong> ₦{{ $single->unit_amount }} </span>
                </div>
                <h3><a href="{{ route('campaign.view', $single->slug) }}">{{ ucwords($single->title) }}</a></h3>
                <div class="campaign-description" style="margin-bottom: 3px; height: 50px; min-height: 50px; max-height: 50px">{{ Helper::get_words($single->description, 20) }}</div>
            
                <a href="#" class="category"><i class="fa fa-briefcase"></i> {{ ucwords($single->category) }}</a>
                <div class="author-address" style="float: right;"><span class="ion-location"></span> {{ $single->user->city }}</div>

                <!--
                    <div class="process">
                        <div class="raised"><span style="width: 100%"></span></div>
                        <div class="process-info">
                            <div class="process-pledged"><span>₦{{ Helper::nf($single->total_raised) }}</span>Raised </div>
                            <div class="process-funded"><span>{{ $single->people_target }}</span>From</div>
                            <div class="process-time"><span>{{ $single->total_raised }}</span>People to go</div>
                        </div>
                    </div>
                -->
            </div>
        </div>
    </div>
</div> 