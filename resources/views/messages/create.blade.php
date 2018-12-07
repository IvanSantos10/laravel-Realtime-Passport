@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Message</div>

                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="user_id">Usuario</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" id="title" placeholder="Título" name="title">
                        </div>
                        <div class="form-group">
                            <label for="body">Mensagem</label>
                            <textarea class="form-control" id="body" rows="3" name="body" placeholder="Mensagem..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
