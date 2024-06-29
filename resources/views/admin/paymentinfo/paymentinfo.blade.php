<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/paymentinfo.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-solid fa-money-bills"></i> Payment Info</h2>
    </div>
    <div class="actions">
        <a href="{{ route('admin.payment.create') }}" class="btn btn-light"><i class="fa-solid fa-cash-register"></i> New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Description</th>
                <th><i class="fa-solid fa-peso-sign"></i> Amount</th>
                <th><i class="fa-solid fa-peso-sign"></i> Balance</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentinfo as $payment)
                <tr>
                    <td>{{ $payment->patient }}</td>
                    <td>{{ $payment->description }}</td>
                    <td><i class="fa-solid fa-peso-sign"></i>{{ $payment->amount }}</td>
                    <td><i class="fa-solid fa-peso-sign"></i>{{ $payment->balance }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>
                        <a href="{{ route('admin.updatePayment', $payment->id) }}" class="btn btn-light" title="Update"><i class="fa-solid fa-pen"></i></a>
                        <form method="post" action="{{ route('admin.deletePayment', $payment->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light" title="Delete" onclick="return confirm('Are you sure you want to delete this payment?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- pagination here -->
    @if ($paymentinfo->lastPage() > 1)
        <ul class="pagination">
            <!-- Previous Page Link -->
            @if ($paymentinfo->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paymentinfo->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            <!-- Pagination Elements -->
            @for ($i = 1; $i <= $paymentinfo->lastPage(); $i++)
                @if ($i == $paymentinfo->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paymentinfo->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            <!-- Next Page Link -->
            @if ($paymentinfo->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paymentinfo->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    @endif
</body>
</html>
@endsection

@section('title')
    Payment Info
@endsection

</x-app-layout>