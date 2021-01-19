<x-home-layout>
    <x-slot name="pagetitle">
        Dashboard
    </x-slot>

    <div class="page-title background-page" style="margin-bottom: 0">
        <div class="container">
            <h1>Dashboad</h1>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a><span>/</span></li>
                    <li>Dashboard</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div>
    </div><!-- .page-title -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome, {{ auth()->user()->fullname() }}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>My Campaigns({{ $mycampaigns->count() }})</h2>
        <div class="row py-12" >
            @if($mycampaigns->count() > 0)
                @each('pages.dashboard_single_campaign', $mycampaigns,'campaign')
            @else
                <div>You have not created any campaign.</div>
            @endif
        </div>

        <h2>My Subscriptions({{ $mysubscriptions->count() }})</h2>
        <div class="row py-12" >
            @if($mycampaigns->count() > 0)
                @each('pages.dashboard_single_campaign', $mysubscriptions,'campaign')
            @else
                <div>You have not subscribed to any campaign.</div>
            @endif
        </div>

        <h2>My Clubs</h2>
        <div class="row">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Coming Soon!
                </div>
            </div>
        </div>
    </div>

</x-home-layout>
