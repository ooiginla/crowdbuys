<x-homeview-layout>

    <x-slot name="pagetitle">
        View Campaign
    </x-slot> 

    <div class="page-title background-page">
        <div class="container">
            <h1>View Campaign</h1>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a><span>/</span></li>
                    <li>View Campaign</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div>
    </div><!-- .page-title -->

    @include('pages.viewcampaign')

    @push('scripts')
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $("#submit-comment-btn").click(function(e) {
                    e.preventDefault();
                    $div = $($(this).data('div')); //div to append
                    $comment = $("#comment-box").val();
                    $campaign_id = $("#campaign-id").val();

                    $.post("{{ route('post.comments') }}", { comment: $comment, campaign_id: $campaign_id } )
                    .done(function( data ) {
                        $("#comments-list").append(data);
                        $("#comment-box").val("");
                        $("#total-comment").html(parseInt($("#total-comment").html()) + 1);
                    });
                });
            });

            const paymentForm = document.getElementById('paymentForm');
            
            paymentForm.addEventListener("submit", payWithPaystack, event);
            
            async function payWithPaystack(event) 
            {
                    event.preventDefault();
                    var myref = "";

                    let qty = document.getElementById("quantity").value;

                    await $.get( "{{ route('generate.ref', $campaign->id) }}?qty="+qty, function( data ) {
                        myref = data;
                    }).fail(function(err) {
                        let errResp = JSON.parse(err.responseText);
                        alert(errResp.message);
                    });

                    let handler = PaystackPop.setup({
                        key: 'pk_test_725d22de1e50de1c03203dba44bbc34d485222f2',
                        email: document.getElementById("email-address").value,
                        amount: (document.getElementById("amount").value * qty) * 100,
                        ref: myref, 

                        // label: "Optional string that replaces customer email"
                        onClose: function(){
                            alert('You closed this payment window.');
                        },
                        callback: function(response){
                            
                            window.location = "{{ route('campaign.view', $campaign->id) }}?reference=" + response.reference;
                        }
                    });

                    handler.openIframe();
            }
        </script>
    @endpush



</x-home-layout>