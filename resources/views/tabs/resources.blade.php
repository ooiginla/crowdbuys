<div id="resource" class="tabs">
    <h2>Member Resources</h2>
     <p>Find below a list of resources for all members to enjoy.</p>
            
        @if(auth()->user())
            <a href="#" class="btn-primary" id="add-resource-btn" onclick="event.preventDefault(); document.getElementById('resourceForm').style.display='block';">Add A Resource</a>
            <table class="table table-striped mt-10">
            <tr>
                <th>Resource Type</th>
                <th>By</th>
            </tr>
                @foreach($campaign->resources as $resource)
                <tr>
                    <td>
                        @switch($resource->type)

                            @case(1)
                                <i class="fa fa-lock"></i> 
                            @break

                            @case(2)
                                <i class="fa fa-edit"></i> 
                            @break

                            @case(3)
                                <i class="fa fa-image"></i> 
                            @break

                            @case(4)
                                <i class="fa fa-file"></i> 
                            @break

                            @case(5)
                                <i class="fa fa-volume-up"></i>
                            @break

                            @case(6)
                                <i class="fa fa-film"></i> 
                            @break

                            @case(7)
                                <i class="fa fa-whatsapp"></i>
                            @break

                            @case(8)
                                <i class="fa fa-telegram"></i> 
                            @break
                            
                        @endswitch

                        {{ ucwords($resource->title) }}

                        @if(!empty($resource->link))
                            <a href="{{ $resource->link }}" style="display: inline; margin-left: 20px;"><i class="fa fa-link"></i></a>
                        @endif

                        @if(in_array($resource->type,[3,4,5,6]))
                            <a href="{{ route('download.resource', $resource->id) }}" style="display: inline; margin-left: 10px;"><i class="fa fa-download"></i></a>
                        @endif
                        <a href="{{ route('delete.resource', $resource->id) }}" style="display: inline; margin-left: 10px;" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                    <td><span style="font-size: 10px; font-style: italic">{{ ($resource->user) ? $resource->user->fullname() : "" }}, {{ Helper::ago($resource->created_at) }}</span></td>
                </tr>
                @endforeach
            </table>

            
            <form action="{{ route('post.resources') }}" id="resourceForm" method="POST" enctype="multipart/form-data" style="display:none">
                @csrf
                <h2 class="text-primary mb-10">Add A Resource </h2>

                <input type="hidden" id="campaign-id" name="campaign_id" value="{{ $campaign->id }}" />
                <div class="field">
                    <label for="unit_amount">Resource Type </label>
                    <select id="resource_type" name="resource_type">
                        <option value="">Select Fee Type</option>
                            
                            @foreach(Helper::getresource() as $key => $value)
                                <option value="{{ $key }}"> {{ $value }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="field">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="">
                </div>
                <div class="field">
                    <label for="link">Link Url (optional)</label>
                    <input type="text" id="link" name="link" value="">
                </div>
                <div class="field">
                    <label for="filename">Upload File (optional)</label>
                    <input type="file" id="filename" name ="filename" value="">
                </div>

                <div class="reminder">
                    <input type="submit" name="submit" value="Add Resource" class="btn-primary">
                </div>
            </form>

        @else
            <table class="table"><tr><td colspan="3"><a href="" class="btn-primary">Members Only</a></td></tr></table>
        @endif
    
   
    
</div>