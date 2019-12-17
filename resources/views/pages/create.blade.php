@extends('layouts.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Transactions
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
            <form method="post" action="{{ route('transactions.store') }}">
                <div class="form-group">
                    @csrf
                    <label >Amount:</label>
                    <input type="text" class="form-control" name="amount"/>
                </div>
                <div class="form-group">
                    <label >eSign :</label>
                    <input type="text" class="form-control" name="eSign"
                    />

                </div>
                <div class="form-group">
                    <label >M-pesa Receipt Number :</label>
                    <input type="text" class="form-control" name="mpesa_receipt_no"/>
                </div>
                <div class="form-group">
                    <label >Phone Number :</label>
                    <input type="text" class="form-control" name="phone_number"
                           pattern="[+][0-9]{12}"
                           title="Ensure its an M-Pesa phone number. ie +254 7--"
                    />
                </div>
                <div class="form-group">
                    <label >Username :</label>
                    <input type="text" class="form-control" name="username"
                           pattern="[0-9]{10}"
                           title="M-Pesa phone number used above. ie 07--"

                    />
                </div>
                <div class="form-group">
                    <label >Name :</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label >Email :</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <button type="submit" class="btn btn-primary">Create Transaction</button>
            </form>
        </div>
    </div>
@endsection
