<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Resource;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    public function listings(Request $request)
    {
        $pinned_campaigns = Campaign::with('user')->where('is_pinned', true)->latest()->take(5)->get();
        $latest_campaigns = Campaign::with('user')->latest()->take(2)->get();
        $sponsored = $pinned_campaigns->random();

        return view('campaigns', compact(
            'pinned_campaigns','latest_campaigns','sponsored'
        ));
    }

    public function create(Request $request)
    {

        return view('newcampaign');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'perks' => 'required',
            'people_target' => 'required|gt:1',
            'goal_amount' => 'required|numeric|min:100',
            'discount_amount' => 'sometimes|numeric',
            'unit_amount' => 'required|numeric|min:100',
            // 'ImageUpload'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:500000'
        ]);

        $charges = 0.00;

        $data = $request->all();

        $campaign = new Campaign;
        $campaign->user_id = auth()->user()->id;
        $campaign->title = $data['title'];
        $campaign->category = $data['category'];
        $campaign->description = $data['description'];
        $campaign->perks = $data['perks'];
        $campaign->people_target = $data['people_target'];
        $campaign->goal_amount = $data['goal_amount'];
        $campaign->charges = $charges;
        $campaign->discount_amount = $data['discount_amount'];
        $campaign->unit_amount = $data['unit_amount'];
        $campaign->status = "pending";
        $campaign->save();

        $campaign->slug = Str::slug($data['title'])."-".$campaign->id;
        $campaign->save();
        
        if ($request->hasFile('ImageUpload')) 
        {
            // resize the image so that the largest side fits within the limit; the smaller
            // side will be scaled to maintain the original aspect ratio
            $image = $request->file('ImageUpload');

            $filename = Str::slug($request->input('title')).'_'.time();
            $folder = 'uploads/';
            $filePath = $folder . $filename. '.' . $image->getClientOriginalExtension();

            Image::make($image)
                ->resize(270, 240, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($filePath);

            $campaign->logo = $filename . '.' . $image->getClientOriginalExtension();
            $campaign->save();
        }

        return redirect()->route('campaign.view', $campaign->id);
    }

    public function mycampaigns(Request $request)
    {
        $campaigns = Campaign::where('user_id', auth()->user()->id)->get();
    }

    public function getposts(Request $request) {

        $perpage = 2;

        $page = $request->input('page');

        $skipper = ($page * $perpage) - $perpage;

        $items = Campaign::with('user')->skip($skipper)->take($perpage)->get();

        return view('pages.posts',['items' => $items ]);
    }

    public function view(Request $request, $id) 
    {
        if(is_numeric($id)) {
            $campaign = Campaign::with('user','comments.user', 'backers.user','resources.user')->where('id', $id)->first();
        }else{
            $campaign = Campaign::with('user','comments.user','backers.user','resources.user','announcements.user')->where('slug', $id)->first();
        }

        if(empty($campaign)){ abort(404); }

        $announcements = Announcement::where('campaign_id', $campaign->id)->latest()->get();
        
        return view('campaign', ['campaign' => $campaign,'announcements' => $announcements]);
    }

    public function postComments(Request $request)
    {
        if(empty($request->input('comment'))){
            abort(500, "Invalid Parameter");
        }

        $user_comment = $request->input('comment');
        $campaign_id = $request->input('campaign_id');

        $comment = new Comment;

        $comment->campaign_id = $campaign_id;
        $comment->comment = $user_comment;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return view('pages.comment', ['comment'=> $comment]);
    }

    public function postresources(Request $request)
    {
        $request->validate([
            'resource_type' => 'required',
            'title' => 'required'
        ]);

        $restype = $request->input('resource_type');
        $details = $request->input('details');
        $filename = $request->input('filename');
        $link = $request->input('link');
        $campaign_id = $request->input('campaign_id');

        $res = new Resource();
        $res->type = $restype;
        $res->details = $details;
        $res->filename = $filename;
        $res->link = $link;
        $res->campaign_id = $campaign_id;
        $res->user_id = auth()->user()->id;
        $res->save();

        if($request->hasFile('filename'))
        {
           $uploadFile = $request->file('filename');

           $filename = Str::slug($uploadFile->getClientOriginalName()).'_'.time();
           $filePath = $filename. '.' . $uploadFile->getClientOriginalExtension();

           $path = $uploadFile->storeAs('uploads', $filePath);

           $res->filename = $filename;
           $res->save();
        }

        $request->session()->flash("susmsg","Resource Successfully Added");

        return redirect()->route('campaign.view', $campaign_id);
    }

    public function download(Request $request, $id)
    {
        $resource = Resource::find($id);

        return Storage::download('uploads/'.$resource->filename);
    }

    public function deleteResource($id)
    {
        $resource = Resource::find($id);

        if(empty($resource)){

            request()->session()->flash("errmsg", "Resource not found");

        }else if($resource->user_id == auth()->user()->id)
        {
            $resource->delete();

            request()->session()->flash("susmsg", "Resource successfully deleted");

        }else {

            request()->session()->flash("errmsg", "Sorry, You do not have sufficient access to delete this resource");
        }

        return redirect()->back();
    }

    public function postannouncement(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required'
        ]);

        $title = $request->input('title');
        $details = $request->input('details');
        $campaign_id = $request->input('campaign_id');

        $ann = new Announcement;
        $ann->title = $title;
        $ann->details = $details;
        $ann->campaign_id = $campaign_id;
        $ann->user_id = auth()->user()->id;
        $ann->save();

        $request->session()->flash("susmsg", "Announcement successfully posted");

        return redirect()->route('campaign.view', $campaign_id);
    }
}
