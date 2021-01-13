<x-home-layout>

    <x-slot name="pagetitle">
        Discover Campaigns
    </x-slot>

    <div class="page-title background-page">
        <div class="container">
            <h1>Discover Campaigns</h1>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a><span>/</span></li>
                    <li>Campaigns</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div>
    </div><!-- .page-title -->

    @include('pages.listcampaigns')

    @push('scripts')
        <script type="text/javascript">
            $(function() {
                $(".see-more").click(function(e) {
                    e.preventDefault();
                    $div = $($(this).data('div')); //div to append
                    $link = $(this).data('link'); //current URL

                    $page = $(this).data('page'); //get the next page #
                    $href = $link + $page; //complete URL
                    $.get($href, function(response) { //append data
                        $("#posts").append(response);
                    });

                    $(this).data('page', (parseInt($page) + 1)); //update page #
                });
            });
        </script>
    @endpush

    @push('styles')
        <style type="text/css">
            html {
                scroll-behavior: smooth;
            }
        </style>
    @endpush

</x-home-layout>