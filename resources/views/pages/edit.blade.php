
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Update Transaction
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form @extends('layouts.layout')
                  method="post" action="{{ route('transactions.update', $transaction->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Amount:</label>
                    <input type="text" class="form-control" name="amount" value="{{ $transaction->amount }}"/>
                </div>
                <div class="form-group">
                    <label for="eSign">eSign :</label>
                    <input type="text" class="form-control" name="eSign" value="{{ $transaction->eSign }}"/>
                </div>
                <div class="form-group">
                    <label for="receipt">Mpesa Receipt Number :</label>
                    <input type="text" class="form-control" name="mpesa_receipt_no" value="{{ $transaction->mpesa_receipt_no}}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Phone Number :</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ $transaction->phone_number}}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Username :</label>
                    <input type="text" class="form-control" name="username" value="{{ $transaction->username}}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{ $transaction->name}}"/>
                </div><div class="form-group">
                    <label for="quantity">Email :</label>
                    <input type="text" class="form-control" name="email" value="{{ $transaction->email}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Transaction</button>
            </form>
        </div>
    </div>
@endsection
