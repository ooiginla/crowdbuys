<div id="updates" class="tabs">
<h2>Member Announcements</h2>
     <p>Find general information meant for all members.</p>
            
    @if(auth()->user())
    <a href="#" class="btn-primary" id="add-announcementForm-btn" onclick="event.preventDefault(); document.getElementById('announcementForm').style.display='block';">Add Announcement</a>
  
        <ul class="mt-10">
            @foreach($announcements as $announcement)
                <li>
                    <p class="date">{{ date("d-m-Y", strtotime($announcement->created_at)) }}</p>
                    <h3>{{ $announcement->title }}</h3>
                    <div class="desc"><p>{{ $announcement->details }}</p></div>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('post.announcement') }}" id="announcementForm" method="POST" style="margin-top: 20px; display:none">
            @csrf
            <h2 class="text-primary mb-10">Add Announcement</h2>

            <input type="hidden" id="campaign-id" name="campaign_id" value="{{ $campaign->id }}" />
            <div class="field">
                <label for="title">Announcement Title</label>
                <input type="text" id="title" name="title" value="">
            </div>

            <div class="field">
                <label for="title">Announcement Details</label>
                <textarea type="text" id="details" name="details" style="width: 100%"></textarea>
            </div>

            <div class="reminder">
                <input type="submit" name="submit" value="Add Announcement" class="btn-primary">
            </div>
        </form>
    @else
        <table class="table"><tr><td colspan="3"><a href="" class="btn-primary">Members Only</a></td></tr></table>
    @endif
    
</div>