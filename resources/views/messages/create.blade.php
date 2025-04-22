@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">New Message {{ Auth::user()->name }} </h5>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>

                    <div class="table-responsive">
                        <form action="{{route('message.store')}}" method="POST">
                            @csrf
                        <table class="table table-striped table-hover table-borderless table-active-bg-factor">
                            <thead>
                                <tr>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="text" id="" required></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-2">
                            <a href="{{ route('message.index') }}" class="btn btn-lg btn-primary mx-1" title="Return"><i class="fa-solid fa-arrow-left"></i></a>
                            <button class="btn btn-primary btn-lg mx-1" type="submit" title="Submit">
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                            <button class="btn btn-danger btn-lg mx-1" type="reset" title="Reset">
                                <i class="fa-solid fa-eraser"></i>
                            </button>
                        </div>

                        </form>

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection


