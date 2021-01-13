<x-home-layout>

    <x-slot name="pagetitle">
    Create Campaigns
    </x-slot>

    <div class="page-title background-page">
        <div class="container">
            <h1>Create Campaigns</h1>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a><span>/</span></li>
                    <li>Campaigns</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div>
    </div><!-- .page-title -->

    @include('pages.createcampaignform')
</x-home-layout>