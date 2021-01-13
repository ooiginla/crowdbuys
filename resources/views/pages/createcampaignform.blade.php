<div class="main-content">
    <div class="container">
        <div class="design-process-section" id="process-tab">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="tab-content" style="margin: 100px;">
                <div role="tabpanel" class="tab-pane active" id="basics">
                    <div class="start-form">
                        <form action="{{ route('campaign.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="field">
                                <label for="uploadfile">Campaign Image</label>
                                <span class="label-desc">This is the first thing that people will see when they see your campaign. Choose an image that’s crisp and lovely.</span>
                                <div class="list-upload">
                                    <div class="file-upload">
                                        <div class="upload-bg">
                                            <div id="myfileupload">
                                                <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" accept="image/*" />	  
                                            </div>
                                            <div id="thumbbox">
                                                <img src="{{ asset('images/assets/logo.png') }}" height="695" width="460" alt="Thumb image" id="thumbimage" />
                                                <a class="removeimg" href="javascript:" ></a>
                                            </div>
                                            <div id="boxchoice">
                                                <a href="javascript:" class="choicefile"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Image</a>
                                                <p></p>
                                            </div>
                                            <label class="filename"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="title">Campaign Title</label>
                                <span class="label-desc">e.g Let us share An Secondhand Okrika Bundle, Netflix Subscription, A paid course e.t.c</span>
                                <input type="text" id="title" name ="title" value="{{ old('title') }}" maxlength="60">
                            </div>
                            <div class="field">
                                <label for="description">Short Description</label>
                                <span class="label-desc">Give a full explanation of the campaign, benefits, and how it will be enjoyed by all  </span>
                                <textarea id="editor" cols="30" rows="4" maxlength="135" name="description" value="{{ old('description') }}"></textarea>
                            </div>
                            <div class="field">
                                <label for="category">Category <span>*</span></label>
                                <span class="label-desc">Pick a category that best fits your campaign.</span>
                                <div class="field-select field-cat">
                                    <select id="category" name="category">
                                    <option value="">Select a category</option>
                                        @foreach(Helper::getCategories() as $key => $value)
                                            <option value="{{ $key }}" 
                                                @if( old("category") ==  $value) 
                                                    selected = 'selected' 
                                                @endif> {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label for="perks">Benefits / Perks</label>
                                <span class="label-desc">What does members stand to gain? movie recommendations, whatsapp group, pay cheaper</span>
                                <textarea id="perks" cols="30" rows="2" maxlength="135" name="perks">{{ old('perks') }}</textarea>
                            </div>
                            <div class="field">
                                <label for="tags">Tags</label>
                                <span class="label-desc">Add the necessary hashtags separate them by comma. e.g love, romance, juju</span>
                                <input type="text" id="tags" name="tags"  value="{{ old('tags') }}">
                            </div>
                            <div class="field">
                                <label for="people_target">How many Persons are needed?</label>
                                <span class="label-desc">e.g 4</span>
                                <input type="text" id="people_target" name="people_target" value="{{ old('people_target') }}">
                            </div>
                            <div class="field">
                                <label for="goal_amount">Overall Campaign Amount</label>
                                <span class="label-desc">How much does the overall campaign cost ? e.g N10,000</span>
                                <input type="text" id="goal_amount" name="goal_amount" value="{{ old('goal_amount') }}">
                            </div>
                            <div class="field">
                                <label for="discount_amount">Discount Amount</label>
                                <span class="label-desc">How much as discount will you be bearing?. N2,000</span>
                                <input type="text" id="discount_amount" name="discount_amount" value="{{ old('discount_amount') }}">
                            </div>
                            <div class="field">
                                <label for="unit_amount">Expected Amount Per Member</label>
                                <span class="label-desc">How much does each member gets to pay after your discount? e.g N2,000.</span>
                                <input type="text" id="unit_amount" name="unit_amount"  value="{{ old('unit_amount') }}">
                            </div>

                            <div class="field">
                                <label for="unit_amount">Fees Handling</label>
                                <span class="label-desc">Do you want the group to bear the fees or pass it to members?</span>
                                <select id="fee_type" name="fee_type">
                                    <option value="">Select Fee Type</option>
                                            <option value="absorb">Remove from Contribution</option>
                                            <option value="pass">Pass to Members</option>
                                    </select>
                            </div>
                            

                            <div class="reminder">
                                <input type="submit" name="submit" value="Create Campaign" class="btn-primary">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>