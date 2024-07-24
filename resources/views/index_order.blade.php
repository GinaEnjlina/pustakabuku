
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>
                    <div class="card-body m-auto">
                        @foreach ($orders as $order)
                        <div class="card mb-2 utama" style="width: 30rem;">
                            <div class="card-body">
                                <a href="{{ route('show_order', $order) }}" style="text-decoration: none;">
                                    <h5 class="card-title text-purple" >Order ID {{ $order->id}}</h5>
                                </a>
                                <h6 class="card-subtitle mb-2 text-muted">By {{$order->user->name }}</h6>
                                @if ($order->is_paid == true)
                                    <p class="card-text text-success"><i class="bi bi-info-circle"></i> Paid</p>
                                    <form action="{{ route('nota', $order) }}" method="get" style="position: absolute; top: 14px; right: 16px;">
                                            @csrf
                                            <button class="btn btn-primary text-light" type="submit"><i class="bi bi-printer"></i>
                                            Print receipt 
                                        </button>
                                        </form>
                                @else
                                    <p class="card-text text-danger"><i class="bi bi-info-circle"></i> Unpaid</p>
                                    <hr>
                                    @if ($order->payment_receipt)
                                        <div class="d-flex flew-row justify-content-start">
                                            <a href="{{ url('storage/' . $order->payment_receipt) }} " class="btn btn-orange text-light" style="margin-right: 0.5rem;"><i class="bi bi-receipt"></i>  Show payment receipt</a>
                                            @if(Auth::user()->is_admin)
                                            <form action="{{route('confirm_payment',$order)}}"method="post">
                                                @csrf
                                                <button class="btn btn-success" type="submit"><i class="bi bi-check2-circle"></i> Confirm</button>
                                            </form>
                                            @endif
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .utama:hover {
    box-shadow: 0 3px 7px rgba(1, 0, 0, 0.2); 
    transition: box-shadow 0.3s ease;
}
</style>

@endsection 
