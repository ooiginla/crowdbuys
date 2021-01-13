<x-home-layout>

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
        </script>
    @endpush

</x-home-layout>