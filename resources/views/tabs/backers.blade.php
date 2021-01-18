<div id="backer" class="tabs">
    <table>
        @if(auth()->user())
            <tr>
                <th>Name</th>
                <th>Amount Paid</th>
                <th>Date</th>
            </tr>
            @foreach($campaign->backers as $backer)
            <tr>
                <td>{{ $backer->user->fullname() }}</td>
                <td>{{ Helper::nf($backer->amount) }} </td>
                <td>{{ date("M j, Y H:i:s", strtotime($backer->created_at)) }}</td>
            </tr>
            @endforeach
        @else
            <tr><td colspan="3"><a href="" class="btn-primary">Members Area Only</a></td></tr>
        @endif
        
    </table>
</div>