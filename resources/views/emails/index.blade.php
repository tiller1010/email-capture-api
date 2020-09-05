@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach($emails as $email)
                    <tr>
                        <td scope="row">
                            <a href="/email-submission-messages/{{ $email->id }}">{{ $email->email }}</a>
                        </td>
                        <td scope="row">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteEmail{{ $email->id }}Modal">
                              Delete
                            </button>
                            <div class="modal fade" id="deleteEmail{{ $email->id }}Modal" tabindex="-1" aria-labelledby="DeleteEmailModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="DeleteEmailModalLabel">Are you sure?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="/emails/{{ $email->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{ $emails->links() }}
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endauth
@endsection
