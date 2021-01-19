<div class="col-md-3" style="padding: 5px;">
    <div style="border: 1px solid blue;margin:5px; height: 240px; background-color: #00a6eb; color: #fff;">
        <a href="#">
            <img src="{{ asset('uploads/'. $campaign->logo) }}" alt="Campaign Logo">
        </a>
        <div style="margin-top: 5px; padding-left: 10px"><h4><a href="{{ route('campaign.view', $campaign->slug) }}">{{ $campaign->title }}</a></h4></div>
        <div style="margin-top: 2px; padding-left: 10px; font-size: 10px;">
        Status: {{ $campaign->status }} | 
        Role: {{ ($campaign->isAdmin()) ? 'Admin':'Member' }} |

        @if($campaign->left2go() > 0)
            Goal: {{ $campaign->left2go() }} more.
        @else
            Goal: Reached.
        @endif
         
    </div>
    </div>
</div>