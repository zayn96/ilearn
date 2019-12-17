@extends('layouts.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div><a href="{{ route('transactions.create')}}" class="btn btn-primary">Create Transaction</a></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Amount</td>
                <td>eSign</td>
                <td>mpesa_receipt_no</td>
                <td>Phone Number</td>
                <td>Username</td>
                <td>Name</td>
                <td>Email</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>{{$transaction->eSign}}</td>
                    <td>{{$transaction->mpesa_receipt_no}}</td>
                    <td>{{$transaction->phone_number}}</td>
                    <td>{{$transaction->username}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->email}}</td>
                    <td><a href="{{ route('transactions.edit', $transaction->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
        </div>
    </div>
@endsection
