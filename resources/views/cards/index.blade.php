@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Main Panel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cards.create') }}" title="Create a Card"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Number</th>
            <th>Pin</th>
            <th>Activated at</th>
            <th>Valid until</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($cards as $card)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $card['number'] }}</td>
                <td>{{ $card['pin'] }}</td>
                <td>{{ $card['activated_at'] }}</td>
                <td>{{ $card['valid_until'] }}</td>
                <td>{{ $card['amount'] }}</td>
                <td>
                    <form action="{{ route('cards.destroy', $card->id) }}" method="POST">

                        <a href="{{ route('cards.show', $card->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('cards.edit', $card->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $cards->links() }}

@endsection

<style>
    .w-5{
        display:none;
    }
</style>